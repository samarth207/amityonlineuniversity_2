<?php
require_once __DIR__ . '/lib/blog.php';
header('Content-Type: application/xml; charset=utf-8');
$db=blog_db(); echo '<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
if($db){$s=$db->query("SELECT slug,last_updated_at FROM blogs WHERE status='published' AND published_at<=NOW() ORDER BY published_at DESC");foreach($s as $row){echo '<url><loc>'.blog_e(blog_public_url($row['slug'])).'</loc><lastmod>'.blog_e(date('c',strtotime($row['last_updated_at']))).'</lastmod></url>';}}
echo '</urlset>';
?>
