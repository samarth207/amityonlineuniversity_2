<?php
require_once __DIR__ . '/lib/blog.php';
$db=blog_db(); if(!$db) exit(1);
$stmt=$db->prepare("UPDATE blogs SET status='published', published_at=COALESCE(published_at, NOW()) WHERE status='scheduled' AND scheduled_at IS NOT NULL AND scheduled_at<=NOW()");
$stmt->execute();
?>
