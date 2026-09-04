<?php
require_once __DIR__ . '/lib/blog.php';
header('Content-Type: text/plain; charset=utf-8');
echo "User-agent: *\nAllow: /\nDisallow: /blog-admin.php\nDisallow: /blog-api.php\nDisallow: /cron-publish.php\nSitemap: " . SITE_URL . "/sitemap.xml\n";
?>
