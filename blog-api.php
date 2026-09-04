<?php
require_once __DIR__ . '/lib/blog.php';
header('Content-Type: application/json; charset=utf-8');

function blog_api_input() { return json_decode(file_get_contents('php://input'), true) ?: $_POST; }
function blog_array_input($value) { if (is_string($value)) { $value = json_decode($value, true); } return is_array($value) ? $value : []; }
function blog_api_out($data, $status = 200) { http_response_code($status); echo json_encode($data); exit; }

$method = $_SERVER['REQUEST_METHOD'];
$action = $_GET['action'] ?? '';

if ($action === 'login' && $method === 'POST') {
    $input = blog_api_input();
    $valid = BLOG_ADMIN_USER !== '' && BLOG_ADMIN_PASSWORD_HASH !== '' && hash_equals(BLOG_ADMIN_USER, trim($input['username'] ?? '')) && password_verify($input['password'] ?? '', BLOG_ADMIN_PASSWORD_HASH);
    if (!$valid) blog_api_out(['error' => 'Invalid credentials'], 401);
    session_regenerate_id(true);
    $_SESSION['blog_admin'] = ['user' => BLOG_ADMIN_USER, 'role' => 'admin'];
    blog_api_out(['success' => true, 'csrf' => blog_csrf()]);
}
if ($action === 'logout') { session_destroy(); blog_api_out(['success' => true]); }
blog_require_admin();

if ($action === 'list') {
    $db = blog_db(); if (!$db) blog_api_out(['error' => 'Database unavailable'], 503);
    $q = '%' . trim($_GET['q'] ?? '') . '%';
    $status = $_GET['status'] ?? '';
    $where = 'WHERE (b.title LIKE ? OR b.slug LIKE ? OR b.primary_keyword LIKE ?)'; $params = [$q, $q, $q];
    if (in_array($status, ['draft','pending','published','scheduled','archived'], true)) { $where .= ' AND b.status = ?'; $params[] = $status; }
    $stmt = $db->prepare("SELECT b.*, a.name AS author_name, GROUP_CONCAT(c.name SEPARATOR ', ') AS category_names FROM blogs b LEFT JOIN blog_authors a ON a.id=b.author_id LEFT JOIN blog_category_map m ON m.blog_id=b.id LEFT JOIN blog_categories c ON c.id=m.category_id $where GROUP BY b.id ORDER BY b.updated_at DESC LIMIT 100");
    $stmt->execute($params); blog_api_out(['blogs' => $stmt->fetchAll()]);
}
if ($action === 'get' && $method === 'GET') {
    $db = blog_db(); if (!$db) blog_api_out(['error' => 'Database unavailable'], 503);
    $id = filter_var($_GET['id'] ?? null, FILTER_VALIDATE_INT);
    if (!$id) blog_api_out(['error' => 'Invalid blog'], 422);
    $stmt = $db->prepare('SELECT * FROM blogs WHERE id=?'); $stmt->execute([$id]);
    $blog = $stmt->fetch(); if (!$blog) blog_api_out(['error' => 'Blog not found'], 404);
    $blog['tags'] = blog_json($blog['tags']); $blog['faq'] = blog_json($blog['faq']);
    blog_api_out(['blog' => $blog]);
}

$input = blog_api_input();
if ($method !== 'POST') blog_api_out(['error' => 'Method not allowed'], 405);
blog_require_csrf();
$db = blog_db(); if (!$db) blog_api_out(['error' => 'Database unavailable'], 503);
$id = filter_var($input['id'] ?? null, FILTER_VALIDATE_INT) ?: null;

if ($action === 'delete' && $id) {
    $stmt = $db->prepare('DELETE FROM blogs WHERE id=?'); $stmt->execute([$id]); blog_audit($db, $id, 'deleted'); blog_api_out(['success' => true]);
}
if ($action === 'duplicate' && $id) {
    $stmt = $db->prepare('INSERT INTO blogs (title,slug,excerpt,content,meta_title,meta_description,primary_keyword,feature_image,feature_image_alt,feature_image_title,author_id,tags,faq,toc_enabled,lead_form_enabled,status) SELECT CONCAT(title, " (Copy)"), CONCAT(slug, "-copy-", UNIX_TIMESTAMP()), excerpt,content,meta_title,meta_description,primary_keyword,feature_image,feature_image_alt,feature_image_title,author_id,tags,faq,toc_enabled,lead_form_enabled,"draft" FROM blogs WHERE id=?');
    $stmt->execute([$id]); $newId = $db->lastInsertId(); blog_audit($db, $newId, 'duplicated'); blog_api_out(['success' => true, 'id' => $newId]);
}
if ($action === 'status' && $id) {
    $newStatus = $input['status'] ?? '';
    if (!in_array($newStatus, ['draft','pending','published','scheduled','archived'], true)) blog_api_out(['error' => 'Invalid status'], 422);
    $publishedAt = $newStatus === 'published' ? date('Y-m-d H:i:s') : null;
    $stmt = $db->prepare('UPDATE blogs SET status=?, published_at=COALESCE(published_at, ?), scheduled_at=? WHERE id=?');
    $stmt->execute([$newStatus, $publishedAt, $input['scheduled_at'] ?? null, $id]); blog_audit($db, $id, $newStatus); blog_api_out(['success' => true]);
}
if ($action === 'save') {
    $title = trim($input['title'] ?? ''); $excerpt = trim($input['excerpt'] ?? ''); $slug = blog_slug($input['slug'] ?? $title);
    $keyword = trim($input['primary_keyword'] ?? $input['focus_keyword'] ?? '');
    $required = (!$title || mb_strlen($title) > 70 || !$excerpt || mb_strlen($excerpt) > 250 || !$keyword || !$input['meta_title'] || !$input['meta_description'] || !$input['content']);
    if ($required) blog_api_out(['error' => 'Title, excerpt, SEO fields, keyword, and content are required'], 422);
    $content = blog_safe_content($input['content']); $status = in_array($input['status'] ?? 'draft', ['draft','pending','published','scheduled','archived'], true) ? $input['status'] : 'draft';
    try {
        if ($id) {
            $old = $db->prepare('SELECT slug, status, published_at FROM blogs WHERE id=?'); $old->execute([$id]); $previous = $old->fetch();
            $stmt = $db->prepare('UPDATE blogs SET title=?,slug=?,excerpt=?,content=?,meta_title=?,meta_description=?,primary_keyword=?,feature_image=?,feature_image_alt=?,feature_image_title=?,author_id=?,tags=?,faq=?,toc_enabled=?,lead_form_enabled=?,lead_form_headline=?,lead_form_button=?,status=?,scheduled_at=?,published_at=COALESCE(published_at, ?) WHERE id=?');
            $stmt->execute([$title,$slug,$excerpt,$content,trim($input['meta_title']),trim($input['meta_description']),$keyword,trim($input['feature_image'] ?? ''),trim($input['feature_image_alt'] ?? ''),trim($input['feature_image_title'] ?? ''),$input['author_id'] ?: null,json_encode(blog_array_input($input['tags'] ?? [])),json_encode(blog_array_input($input['faq'] ?? [])),!empty($input['toc_enabled']),!empty($input['lead_form_enabled']),trim($input['lead_form_headline'] ?? 'Talk to an admissions advisor'),trim($input['lead_form_button'] ?? 'Request information'),$status,$input['scheduled_at'] ?: null,$status === 'published' ? date('Y-m-d H:i:s') : null,$id]);
            if ($previous && $previous['slug'] !== $slug && $previous['status'] === 'published') { $redirect = $db->prepare('INSERT IGNORE INTO blog_redirects (old_slug,new_slug,blog_id) VALUES (?,?,?)'); $redirect->execute([$previous['slug'],$slug,$id]); }
            blog_audit($db, $id, 'edited');
        } else {
            $stmt = $db->prepare('INSERT INTO blogs (title,slug,excerpt,content,meta_title,meta_description,primary_keyword,feature_image,feature_image_alt,feature_image_title,author_id,tags,faq,toc_enabled,lead_form_enabled,lead_form_headline,lead_form_button,status,scheduled_at,published_at) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
            $stmt->execute([$title,$slug,$excerpt,$content,trim($input['meta_title']),trim($input['meta_description']),$keyword,trim($input['feature_image'] ?? ''),trim($input['feature_image_alt'] ?? ''),trim($input['feature_image_title'] ?? ''),$input['author_id'] ?: null,json_encode(blog_array_input($input['tags'] ?? [])),json_encode(blog_array_input($input['faq'] ?? [])),!empty($input['toc_enabled']),!empty($input['lead_form_enabled']),trim($input['lead_form_headline'] ?? 'Talk to an admissions advisor'),trim($input['lead_form_button'] ?? 'Request information'),$status,$input['scheduled_at'] ?: null,$status === 'published' ? date('Y-m-d H:i:s') : null]);
            $id = $db->lastInsertId(); blog_audit($db, $id, 'created');
        }
        blog_api_out(['success' => true, 'id' => $id, 'slug' => $slug]);
    } catch (PDOException $e) { blog_api_out(['error' => str_contains($e->getMessage(), 'uq_blog_slug') ? 'Slug already exists' : 'Unable to save blog'], 422); }
}
blog_api_out(['error' => 'Unknown action'], 404);
?>
