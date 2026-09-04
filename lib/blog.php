<?php
require_once __DIR__ . '/../config.php';

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start(['cookie_httponly' => true, 'cookie_samesite' => 'Lax']);
}

function blog_db() {
    return getDBConnection();
}

function blog_csrf() {
    if (empty($_SESSION['blog_csrf'])) $_SESSION['blog_csrf'] = bin2hex(random_bytes(24));
    return $_SESSION['blog_csrf'];
}

function blog_require_csrf() {
    if (!hash_equals($_SESSION['blog_csrf'] ?? '', $_POST['csrf'] ?? $_SERVER['HTTP_X_CSRF_TOKEN'] ?? '')) {
        http_response_code(419); exit('Invalid security token');
    }
}

function blog_is_admin() {
    return !empty($_SESSION['blog_admin']) && in_array($_SESSION['blog_admin']['role'] ?? '', ['admin', 'editor'], true);
}

function blog_require_admin() {
    if (!blog_is_admin()) { http_response_code(403); exit('Forbidden'); }
}

function blog_e($value) { return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8'); }

function blog_slug($value) {
    $value = strtolower(trim((string)$value));
    $value = preg_replace('/[^a-z0-9]+/', '-', $value);
    return trim($value, '-') ?: 'article';
}

function blog_safe_content($html) {
    $html = strip_tags((string)$html, '<p><br><h2><h3><h4><strong><b><em><i><u><s><ul><ol><li><blockquote><a><img><table><thead><tbody><tr><th><td><hr><pre><code>');
    $headingIndex = 0;
    $html = preg_replace_callback('/<h([2-4])([^>]*)>(.*?)<\/h\1>/is', function ($match) use (&$headingIndex) {
        $id = blog_slug(strip_tags($match[3])) . '-' . $headingIndex++;
        return '<h' . $match[1] . $match[2] . ' id="' . blog_e($id) . '">' . $match[3] . '</h' . $match[1] . '>';
    }, $html);
    $html = preg_replace('/\s(?:on[a-z]+|style)\s*=\s*("[^"]*"|\'[^\']*\')/i', '', $html);
    $html = preg_replace_callback('/\s(?:href|src)\s*=\s*(["\'])(.*?)\1/i', function ($m) {
        $url = trim($m[2]);
        if (preg_match('/^(javascript|data|vbscript):/i', $url)) return '';
        return ' ' . (stripos($m[0], 'src=') !== false ? 'src' : 'href') . '=' . $m[1] . blog_e($url) . $m[1];
    }, $html);
    return $html;
}

function blog_json($value) {
    $decoded = json_decode($value ?: '[]', true);
    return is_array($decoded) ? $decoded : [];
}

function blog_audit($db, $blogId, $action) {
    $stmt = $db->prepare('INSERT INTO blog_audit_log (blog_id, admin_user, action) VALUES (?, ?, ?)');
    $stmt->execute([$blogId ?: null, $_SESSION['blog_admin']['user'] ?? 'system', $action]);
}

function blog_public_url($slug) { return SITE_URL . '/blog/' . rawurlencode($slug); }

function blog_customize_output($output) {
    $blog = $GLOBALS['current_blog'] ?? null;
    if (!$blog) return $output;
    $headline = blog_e($blog['lead_form_headline'] ?: 'Talk to an admissions advisor');
    $button = blog_e($blog['lead_form_button'] ?: 'Request information');
    $faqHtml = '';
    foreach (blog_json($blog['faq'] ?? '[]') as $faq) {
        if (!empty($faq['question']) && !empty($faq['answer'])) $faqHtml .= '<details><summary>' . blog_e($faq['question']) . '</summary><p>' . nl2br(blog_e($faq['answer'])) . '</p></details>';
    }
    if ($faqHtml !== '') $output = str_replace('<section class="lead-box">', '<section class="faq-section"><h2>Frequently asked questions</h2>' . $faqHtml . '</section><section class="lead-box">', $output);
    return str_replace(['>Talk to an admissions advisor<', '>Request information<'], ['>' . $headline . '<', '>' . $button . '<'], $output);
}
?>
