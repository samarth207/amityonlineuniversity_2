CREATE TABLE IF NOT EXISTS blog_authors (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  name VARCHAR(120) NOT NULL,
  bio TEXT NULL,
  image_url VARCHAR(500) NULL,
  page_url VARCHAR(500) NULL,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS blog_categories (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  name VARCHAR(120) NOT NULL,
  slug VARCHAR(140) NOT NULL,
  description TEXT NULL,
  meta_title VARCHAR(160) NULL,
  meta_description VARCHAR(320) NULL,
  status ENUM('active','inactive') NOT NULL DEFAULT 'active',
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id), UNIQUE KEY uq_blog_category_slug (slug)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS blogs (
  id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  title VARCHAR(70) NOT NULL,
  slug VARCHAR(180) NOT NULL,
  excerpt VARCHAR(250) NOT NULL,
  content MEDIUMTEXT NOT NULL,
  meta_title VARCHAR(160) NOT NULL,
  meta_description VARCHAR(320) NOT NULL,
  primary_keyword VARCHAR(160) NOT NULL,
  feature_image VARCHAR(500) NULL,
  feature_image_alt VARCHAR(255) NULL,
  feature_image_title VARCHAR(255) NULL,
  author_id INT UNSIGNED NULL,
  tags JSON NULL,
  faq JSON NULL,
  toc_enabled TINYINT(1) NOT NULL DEFAULT 1,
  lead_form_enabled TINYINT(1) NOT NULL DEFAULT 1,
  lead_form_headline VARCHAR(160) NOT NULL DEFAULT 'Talk to an admissions advisor',
  lead_form_button VARCHAR(80) NOT NULL DEFAULT 'Request information',
  status ENUM('draft','pending','published','scheduled','archived') NOT NULL DEFAULT 'draft',
  scheduled_at DATETIME NULL,
  published_at DATETIME NULL,
  last_updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id), UNIQUE KEY uq_blog_slug (slug),
  KEY idx_blog_status_published (status, published_at), KEY idx_blog_scheduled (status, scheduled_at),
  CONSTRAINT fk_blog_author FOREIGN KEY (author_id) REFERENCES blog_authors(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE blogs ADD COLUMN IF NOT EXISTS lead_form_headline VARCHAR(160) NOT NULL DEFAULT 'Talk to an admissions advisor' AFTER lead_form_enabled;
ALTER TABLE blogs ADD COLUMN IF NOT EXISTS lead_form_button VARCHAR(80) NOT NULL DEFAULT 'Request information' AFTER lead_form_headline;

CREATE TABLE IF NOT EXISTS blog_category_map (
  blog_id BIGINT UNSIGNED NOT NULL,
  category_id INT UNSIGNED NOT NULL,
  PRIMARY KEY (blog_id, category_id),
  CONSTRAINT fk_blog_map_blog FOREIGN KEY (blog_id) REFERENCES blogs(id) ON DELETE CASCADE,
  CONSTRAINT fk_blog_map_category FOREIGN KEY (category_id) REFERENCES blog_categories(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS blog_redirects (
  id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  old_slug VARCHAR(180) NOT NULL,
  new_slug VARCHAR(180) NOT NULL,
  blog_id BIGINT UNSIGNED NOT NULL,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id), UNIQUE KEY uq_blog_old_slug (old_slug), KEY idx_blog_redirect_blog (blog_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS blog_audit_log (
  id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  blog_id BIGINT UNSIGNED NULL,
  admin_user VARCHAR(120) NOT NULL,
  action VARCHAR(80) NOT NULL,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id), KEY idx_blog_audit_blog (blog_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
