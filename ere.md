# IMPLEMENTATION TASK: COMPLETE SEO-OPTIMIZED BLOG CMS + PUBLIC BLOG SYSTEM

I want you to implement a complete Blog CMS for the existing website.

IMPORTANT: Before changing anything, inspect the entire existing project and understand:

1. Current frontend framework
2. Current backend/framework
3. Existing database architecture
4. Existing authentication/login system
5. Existing admin panel/dashboard
6. Existing table/database containing course data, names, numbers, and related fields
7. Existing website routing structure
8. Existing header/footer/navigation structure
9. Existing SEO implementation
10. Existing image/file upload mechanism
11. Existing API architecture
12. Existing environment variables/configuration
13. Existing hosting/deployment structure

DO NOT unnecessarily replace the current architecture.

Use the technology/database that best fits the existing project. Prefer reusing the existing backend/database if it already exists.

Do not break any existing functionality.

The final implementation should feel like a native part of the existing website rather than a separate application.

==================================================

1. BLOG CMS ADMIN PANEL
   ==================================================

Create a secure admin-only Blog Management section.

The admin must be able to:

* Login using the existing admin authentication system
* View all blogs
* Search blogs
* Filter blogs
* Create blog
* Edit blog
* Duplicate blog
* Save draft
* Submit for review
* Publish blog
* Schedule blog
* Unpublish blog
* Archive blog
* Delete blog
* Preview blog before publishing
* View publication status
* View created date
* View last updated date
* View scheduled date/time
* View author
* View category
* View SEO status

Use role-based authorization.

Only authenticated users with the required admin/editor permission should be able to access CMS functionality.

Never rely only on hiding UI buttons. Enforce authorization on backend/API routes as well.

==================================================
2. BLOG DASHBOARD
=================

Create a professional dashboard with:

* Total Blogs
* Drafts
* Pending Review
* Published
* Scheduled
* Archived

Add filters:

* Status
* Category
* Author
* Date range
* SEO completion status

Add search by:

* Blog title
* Slug
* Focus keyword
* Author

Add sorting:

* Newest
* Oldest
* Recently updated
* Scheduled date
* Published date

Blog table columns:

* Thumbnail
* Title
* Status
* Category
* Author
* Focus Keyword
* Published Date
* Updated Date
* SEO Score/Status
* Actions

Actions:

* Edit
* Preview
* Duplicate
* Publish
* Unpublish
* Delete

==================================================
3. BLOG CREATION / EDITOR
=========================

Create a complete blog editor.

The editor should be modern, responsive and easy for non-technical admins to use.

It should contain the following sections.

---

## A. BASIC BLOG INFORMATION

Blog Title / H1

* Required
* Maximum 70 characters
* This must automatically appear as the H1 on the public blog page
* Show live character counter

Short Description / Excerpt

* Required
* Maximum 250 characters
* Show character counter
* Used on blog listing pages
* Can also be used as fallback social description where appropriate

Category

* Required
* Multi-select
* Categories must be manageable from CMS

Tags

* Optional
* Multiple input
* Allow adding/removing tags
* Prevent duplicate tags

Author

* Select from existing authors/users
* Store author relationship with blog

---

## B. SEO META DATA

Meta Title

* Required
* Editable
* Recommended maximum approximately 60 characters
* Live character counter
* Warning if excessively long
* Allow manual override
* Do not automatically truncate saved user content

Meta Description

* Required
* Target approximately 200–250 characters based on the client's specification
* Live character counter
* Warning if too short/long
* Provide "Generate Suggestion" functionality if AI functionality already exists in the project
* Admin must be able to edit the generated suggestion manually

Focus Keyword

* Required
* Single primary target keyword

Primary Keyword

* Required
* Use this as the canonical primary SEO keyword field
* If Focus Keyword and Primary Keyword are technically redundant, consolidate internally into one canonical database field while preserving the requested CMS label/UX

URL Slug

* Automatically generated from blog title
* Lowercase
* Hyphen-separated
* Remove unnecessary special characters
* Editable manually
* Must be unique
* Example:

amity-online-mba-fees-2026

IMPORTANT:

When an already-published blog slug is changed:

1. Preserve the old slug
2. Create a 301 redirect from old URL to new URL
3. Do not silently break existing backlinks
4. Update canonical URL
5. Update internal links where applicable
6. Update sitemap
7. Prevent duplicate URLs

Never create duplicate slugs.

---

## C. FEATURE IMAGE

Feature Image Upload

Requirements:

* Required
* JPG / JPEG / WebP
* Recommended dimensions: 1200x628
* Validate file type
* Validate reasonable file size
* Generate optimized version where supported
* Preserve an appropriate high-quality original
* Use optimized image on frontend

Image Alt Text

* Required
* Do not allow the blog to be published without alt text

Image Title

* Optional

Also support:

* Image preview
* Replace image
* Remove image
* Image crop where practical
* Image optimization
* Responsive image delivery

Do NOT keyword-stuff alt text.

Alt text should describe the meaningful content/purpose of the image.

==================================================
4. RICH BLOG CONTENT EDITOR
===========================

Implement a proper rich text/block editor supporting at minimum:

* Paragraph
* H2
* H3
* H4
* Bold
* Italic
* Underline if supported
* Strikethrough if useful
* Bullet List
* Numbered List
* Blockquote
* Links
* Internal Links
* External Links
* Images
* Tables
* FAQ block
* Horizontal separator
* Code block if relevant
* Undo
* Redo

Do not allow arbitrary unsafe HTML/script injection.

Sanitize editor output on the backend before storing/rendering.

==================================================
5. HEADINGS / CONTENT STRUCTURE
===============================

The public article must have:

* Exactly one H1 containing the blog title
* Logical H2 sections
* H3 subsections beneath relevant H2 sections
* H4 where needed

Do not allow the editor to create random heading hierarchy if avoidable.

The CMS should visually indicate heading hierarchy.

Add an SEO/content structure validation system that warns the admin about:

* Missing H1
* Multiple H1s
* Missing H2 structure
* Very long sections without headings
* Empty headings

Do not block publication for non-critical warnings unless explicitly necessary.

==================================================
6. TABLE BLOCK
==============

Provide an advanced table editor.

Requirements:

* Insert table
* Add row
* Delete row
* Add column
* Delete column
* Merge cells
* Split cells if technically feasible
* Cell editing
* Bold
* Italic
* Text alignment
* Vertical alignment
* Cell background color
* Row background color
* Column styling where feasible
* Border controls
* Responsive rendering
* Horizontal scrolling on mobile where required

Ensure generated HTML is semantic and accessible.

Use:

<table>
<thead>
<tbody>
<th>
<td>

where appropriate.

==================================================
7. INTERNAL LINKING SYSTEM
==========================

Create a proper internal linking experience.

When selecting "Internal Link":

Allow admin to search existing website pages/blogs/courses and select one.

Store the actual URL.

The admin should be able to search by:

* Page title
* Blog title
* Course name
* URL

Prevent accidentally creating broken internal links.

Where technically possible, provide suggestions for relevant internal links based on the current article content.

Use descriptive anchor text.

Do NOT generate keyword-stuffed internal links.

==================================================
8. EXTERNAL LINKING
===================

External links should have:

* URL
* Anchor text
* Open in new tab checkbox
* Optional nofollow
* Optional sponsored/UGC rel options when applicable

When "open in new tab" is enabled, safely use appropriate rel attributes.

Do not allow unsafe javascript: links.

==================================================
9. IMAGE BLOCK INSIDE CONTENT
=============================

Every content image block must contain:

* Image upload
* Alt Text — REQUIRED
* Caption — Optional
* Image Title — Optional

Do not allow publishing if an inserted image is missing required alt text.

Images must:

* Use appropriate src URLs
* Have descriptive alt attributes
* Be responsive
* Use lazy loading for non-critical below-the-fold images where appropriate
* Avoid layout shifts by preserving width/height or aspect ratio
* Use modern formats where available

Do not lazy-load the main above-the-fold feature/LCP image if that would negatively affect loading performance.

==================================================
10. CONTENT TABLE OF CONTENTS / INDEX
=====================================

Every long-form blog should automatically generate a "Table of Contents" / "In This Article" section.

Generate it dynamically from:

* H2
* H3
* H4

Rules:

1. Generate stable unique anchor IDs for headings
2. Heading text becomes the TOC label
3. Preserve hierarchy
4. Clicking TOC item scrolls to the appropriate section
5. Support sticky TOC on desktop where compatible with current design
6. Provide responsive mobile layout
7. Do not duplicate heading IDs
8. Do not expose ugly random IDs to users
9. Ensure accessibility with semantic navigation
10. Allow admin to enable/disable TOC per blog

Example:

In This Article

1. Online MBA Fees
   1.1 Semester Fees
   1.2 Other Charges
2. Eligibility
3. Admission Process
4. Frequently Asked Questions

The TOC should update automatically whenever heading structure changes.

==================================================
11. FAQ SECTION BLOCK
=====================

Create a dedicated FAQ block.

Admin can add:

Question
Answer

Allow:

* Add FAQ
* Delete FAQ
* Reorder FAQ
* Edit FAQ

Render FAQs in an accessible accordion on the website.

IMPORTANT SEO REQUIREMENT:

Do not assume FAQ structured data is automatically appropriate for every blog.

Only output FAQPage structured data when the page and content genuinely meet Google's current eligibility/guidance.

Do not add fake, hidden, duplicate or keyword-stuffed FAQ content.

==================================================
12. LEAD / COURSE ENQUIRY FORM
==============================

Every blog should be able to contain a small lead-generation form block.

The form must support:

* Custom headline
* Custom button text

Fixed fields:

* Name
* Phone Number
* Course

Use the EXISTING COURSE / WEBSITE TABLE and existing course data source.

Do NOT create a duplicate hardcoded course list if the existing application already stores course information in the database.

The course dropdown should automatically pull current course data.

Use existing website phone/lead validation rules if they already exist.

Integrate with the website's existing lead submission mechanism/API if available.

Do not break existing enquiry forms.

Add spam protection/rate limiting where appropriate.

==================================================
13. AUTHOR SECTION
==================

Support:

Author Name
Author Bio
Author Image
Author Page URL

The public blog should display the author section.

Where possible, link author name to the author page.

Create author-related metadata suitable for Article structured data.

Author profiles should not be duplicated unnecessarily across individual blogs.

==================================================
14. CATEGORIES
==============

Create category management.

Each category should have:

* Category Name
* Slug
* Description
* Meta Title
* Meta Description
* Image if useful
* Status

Category URL should be clean.

Example:

/blog/
/blog/category/online-mba/

Prevent duplicate category slugs.

==================================================
15. TAGS
========

Support tags.

Each tag should:

* Have a unique slug
* Be reusable across blogs
* Be searchable from CMS

Avoid automatically indexing thin/low-value tag pages.

Implement index/noindex strategy intelligently for tag archives based on whether they contain useful standalone content.

==================================================
16. PUBLISHING STATUS
=====================

Supported statuses:

* Draft
* Pending
* Published
* Scheduled
* Archived

Publish Date
Publish Time
Last Updated Date

Last Updated Date must update automatically whenever meaningful blog content is edited.

Published Date must represent the original publication date unless intentionally republished.

Never overwrite original publication date simply because content was edited.

==================================================
17. BLOG SCHEDULING
===================

Support scheduled publishing.

Admin can set:

* Date
* Time

The system should automatically publish the blog at the scheduled time.

Requirements:

* Timezone must be explicit
* Use server/database-safe timestamps
* Avoid duplicate publishing
* Handle server restarts
* Scheduled jobs must be idempotent
* A scheduled article must not become indexable prematurely
* Sitemap should include a URL only when the blog is actually public/indexable
* Preview URLs must not be indexable

If the current hosting environment does not support background workers/cron directly, implement scheduling using the most reliable mechanism supported by the existing hosting environment.

Document the required cron configuration if Hostinger cron is needed.

==================================================
18. BLOG PUBLIC URL
===================

Use clean URLs.

Preferred format:

/blog/{slug}

Example:

/blog/amity-online-mba-fees-2026

Do NOT use unnecessary query parameters for public canonical blog URLs.

Each published blog must have one preferred canonical URL.

Handle trailing slash consistently based on the existing site's routing convention.

==================================================
19. SEO META TAGS
=================

For every public blog dynamically generate:

<title>
<meta name="description">
<link rel="canonical">

Also support social metadata:

Open Graph:

og:type = article
og:title
og:description
og:url
og:image
og:site_name
article:published_time
article:modified_time
article:author
article:section
article:tag

Twitter/X metadata:

twitter:card
twitter:title
twitter:description
twitter:image

Use the feature image as the preferred social image where appropriate.

Make sure title/description are rendered server-side where the current architecture supports SSR/SSG.

==================================================
20. STRUCTURED DATA / JSON-LD
=============================

Implement valid JSON-LD for published blogs.

At minimum evaluate/use:

Article or BlogPosting

Include appropriate properties such as:

@context
@type
headline
description
image
datePublished
dateModified
author
publisher
mainEntityOfPage

Use the organization's actual website/logo information from the existing site configuration.

Do not invent organization information.

Where applicable include:

* breadcrumb structured data
* author information
* article section
* image
* keywords only where genuinely appropriate

FAQ structured data must only be generated when appropriate under Google's current guidelines.

Do not output invalid or misleading schema.

Do not use fake reviews, ratings, organization claims, or other structured data that does not represent visible page content.

==================================================
21. BREADCRUMBS
===============

Create SEO-friendly breadcrumbs.

Example:

Home
→ Blog
→ Category
→ Blog Title

Use semantic markup.

Where appropriate add BreadcrumbList JSON-LD.

Ensure breadcrumbs reflect the actual canonical page structure.

==================================================
22. XML SITEMAP
===============

Integrate published blogs into the site's XML sitemap.

Only include:

* Published
* Public
* Indexable blogs

Do NOT include:

* Drafts
* Pending
* Scheduled
* Archived
* Preview URLs

Use the blog's last meaningful modification date for sitemap lastmod where appropriate.

Update sitemap when:

* Blog published
* Blog updated
* Blog unpublished
* Blog deleted
* Blog slug changed

If the website already has sitemap functionality, extend it instead of creating a second competing sitemap.

==================================================
23. ROBOTS / INDEXING
=====================

Ensure:

Published blog:
index, follow

Draft:
noindex, nofollow or inaccessible publicly where appropriate

Scheduled:
must not be publicly indexable before publication

Preview:
noindex and protected where possible

Archived:
normally noindex or redirect depending on business requirements

Do not accidentally block all blog pages using robots.txt.

Ensure robots.txt references the correct sitemap URL.

Do not use robots.txt as a substitute for proper page-level noindex controls.

==================================================
24. CANONICALIZATION
====================

Each published blog must have a self-referencing canonical URL unless a legitimate canonical strategy explicitly requires otherwise.

Avoid duplicate URLs caused by:

* HTTP/HTTPS
* trailing slash variations
* query parameters
* duplicate slug routes
* duplicate category paths
* preview URLs
* alternate rendering routes

Canonical URL should always use the site's preferred HTTPS hostname.

Do not hardcode the domain if the project already has a site URL configuration/environment variable.

==================================================
25. 301 REDIRECT SYSTEM
=======================

When a published blog slug changes:

Old:

/blog/old-slug

New:

/blog/new-slug

Automatically create a persistent 301 redirect.

Store:

old_slug
new_slug
blog_id
created_at

Prevent redirect chains where possible.

For example:

A → B → C

should eventually become:

A → C
B → C

Avoid redirect loops.

==================================================
26. SEO VALIDATION PANEL INSIDE CMS
===================================

Create an SEO checklist/sidebar.

Display:

SEO Title
Meta Description
Focus Keyword
Slug
H1
Content Length
Images with Alt Text
Internal Links
External Links
TOC
Canonical
Author
Categories
FAQ
Structured Data readiness
Indexability
Social image

Create statuses:

GOOD
WARNING
ERROR

Potential warnings:

* Meta title too long
* Meta title missing
* Meta description missing
* Meta description too short
* Focus keyword missing
* Slug missing
* Feature image missing
* Feature image alt missing
* H1 missing
* Multiple H1s
* No H2 headings
* No internal links
* Broken internal links
* Image without alt text
* Very low content length
* Missing author
* Missing category
* Duplicate slug
* Missing canonical
* Scheduled article nearing publish date
* Missing social image

Important:

This SEO score is an editorial guidance system, NOT a fake guarantee of Google rankings.

Do not display claims such as "This blog will rank on Google".

==================================================
27. CONTENT QUALITY / SEO GUIDANCE
==================================

The editor should provide useful writing guidance.

Possible warnings:

* Focus keyword appears unnaturally too many times
* Keyword stuffing
* Extremely long paragraphs
* Missing descriptive headings
* Excessive passive content where detectable
* Missing contextual internal links
* External links missing when authoritative references are useful
* Repeated anchor text
* Duplicate title
* Duplicate meta description
* Duplicate content risk

Do NOT force an arbitrary keyword density percentage.

SEO recommendations should prioritize useful, people-first content rather than mechanical keyword repetition.

==================================================
28. DUPLICATE CONTENT PROTECTION
================================

Before publishing:

Check for potential duplicates based on:

* Exact title
* Slug
* Similar content where practical
* Duplicate meta title
* Duplicate meta description

Warn admin if another article appears highly similar.

Do not automatically delete or block content unless the problem is a true database/routing conflict.

==================================================
29. SEARCH / FILTERING
======================

Admin blog listing should support:

Search:

* title
* slug
* keyword
* author
* category
* tags

Filters:

* status
* author
* category
* date
* SEO health

Pagination should be implemented server-side for large datasets.

==================================================
30. BLOG PREVIEW
================

Add "Preview Blog".

Preview must:

* Display the actual final blog layout
* Use the same typography/design as live blog
* Show TOC
* Show feature image
* Show author
* Show categories/tags
* Show FAQs
* Show lead form
* Show SEO/social metadata preview where practical

Preview pages must NOT be indexable.

Protect unpublished previews so random visitors cannot access them.

Use secure temporary preview tokens if necessary.

==================================================
31. SEO PREVIEW
===============

Inside CMS, add a Google-style search preview:

Example:

Meta Title
Meta Description
URL

Also add social previews:

Facebook/Open Graph preview
Twitter/X preview

Show live updates as admin modifies the fields.

==================================================
32. BLOG LISTING PAGE
=====================

Update/create public blog listing page.

It should show:

* Feature image
* Category
* Title
* Excerpt
* Author
* Published date
* Updated date where relevant
* Read more CTA

Use clean SEO-friendly links.

Implement pagination or another scalable listing mechanism.

Add:

* Category filtering
* Search if suitable for current website

Do not generate indexable low-value parameter combinations unnecessarily.

==================================================
33. SINGLE BLOG PAGE DESIGN
===========================

The public blog page should contain:

1. Breadcrumb
2. Category
3. H1
4. Short description/excerpt
5. Author
6. Published date
7. Updated date
8. Feature image
9. Table of Contents
10. Main content
11. Internal links
12. FAQs if present
13. Lead/course enquiry form
14. Related blogs
15. Author section
16. Social sharing if already consistent with website design

Ensure excellent mobile responsiveness.

==================================================
34. RELATED BLOGS
=================

At the end of each blog show related blogs.

Prioritize using:

1. Same category
2. Shared tags
3. Similar focus topic
4. Recent relevant posts

Do not create random unrelated links.

Related blog links must point to actual existing published pages.

==================================================
35. IMAGE SEO / PERFORMANCE
===========================

Implement image best practices:

* Descriptive filenames where practical
* Alt text
* Title where useful
* Width/height
* Responsive image sizing
* WebP/modern format where supported
* Lazy loading below the fold
* Avoid layout shift
* Appropriate compression
* Proper cache headers where supported

Do not use alt text solely for keyword insertion.

==================================================
36. PERFORMANCE / CORE WEB VITALS
=================================

The blog implementation must not unnecessarily hurt performance.

Pay attention to:

* LCP
* CLS
* INP
* Image optimization
* JavaScript bundle size
* CSS size
* Server-side rendering where appropriate
* Lazy loading
* Responsive images
* Efficient database queries
* Caching where compatible

Do not load unnecessary CMS/admin JavaScript on public blog pages.

==================================================
37. DATABASE DESIGN
===================

Use MongoDB OR MySQL/phpMyAdmin based on what best fits the existing application.

IMPORTANT:

Do not blindly create a new database system if the project already has one.

Inspect the existing code first.

If MongoDB is the better fit, create a proper Blog collection/schema/model.

Suggested conceptual structure:

Blog:

id
title
slug
excerpt
content
contentBlocks
metaTitle
metaDescription
focusKeyword
primaryKeyword
featureImage
featureImageAlt
featureImageTitle
authorId
categories
tags
tocEnabled
faq
leadForm
status
publishedAt
scheduledAt
createdAt
updatedAt
lastUpdatedAt
canonicalUrl
seoSettings
socialSettings
redirectHistory
indexability
createdBy
updatedBy

Do not store redundant fields unnecessarily.

Use timestamps.

Add indexes for:

* slug
* status
* publishedAt
* scheduledAt
* category
* author
* focusKeyword where useful

If MySQL is used, normalize relational entities appropriately.

==================================================
38. DATABASE SECURITY
=====================

NEVER hardcode database credentials.

Use environment variables, for example:

MONGODB_URI=
DATABASE_URL=

Do not put credentials in:

* Source code
* Git repository
* Frontend JavaScript
* Public config files
* README
* API responses

The MongoDB URI provided separately by the project owner must be treated as a secret.

Use server-side database access only.

Never expose the database connection string to the browser.

Use least-privilege database permissions where possible.

==================================================
39. ADMIN SECURITY
==================

Protect all CMS routes.

Implement/check:

* Authentication
* Authorization
* Session security
* CSRF protection where applicable
* Input validation
* Output sanitization
* XSS protection
* Rate limiting
* Secure file uploads
* MIME validation
* File size validation
* Path traversal protection
* SQL/NoSQL injection protection
* Audit logging

Do not trust client-side validation.

Validate on server.

==================================================
40. FILE UPLOAD SECURITY
========================

For uploaded images:

* Validate MIME type
* Validate extension
* Verify actual file contents where possible
* Limit file size
* Generate safe filenames
* Never use user-provided filenames directly as filesystem paths
* Prevent executable uploads
* Store outside executable directories where possible
* Strip dangerous metadata if supported
* Generate unique file names

==================================================
41. AUDIT LOG
=============

Track important CMS actions:

* Blog created
* Blog edited
* Blog published
* Blog unpublished
* Blog scheduled
* Blog deleted
* Blog slug changed
* Author changed
* SEO metadata changed

Store:

* user/admin
* action
* blog
* timestamp

Do not log passwords or sensitive credentials.

==================================================
42. DRAFT AUTOSAVE
==================

Implement autosave.

The editor should periodically save draft changes.

Also protect against accidental browser refresh/navigation.

Show:

Saving...
Saved
Unsaved changes

Avoid creating hundreds of duplicate revisions unnecessarily.

==================================================
43. OPTIONAL REVISION HISTORY
=============================

Implement revision/version history if practical.

Admin should be able to see:

* Revision date
* Editor
* Changes

Where feasible:

* Restore previous version

Do not delete the current live version accidentally while restoring a draft.

==================================================
44. BLOG API
============

Create clean backend endpoints/services for:

GET blogs
GET published blog by slug
GET blog by ID
CREATE blog
UPDATE blog
DELETE blog
PUBLISH blog
UNPUBLISH blog
SCHEDULE blog
PREVIEW blog
GET categories
CREATE category
UPDATE category
DELETE category
GET authors
GET related blogs

All admin endpoints must require authentication/authorization.

Public API must expose only fields that are safe to expose.

Never expose internal database IDs unnecessarily if the current architecture allows better public identifiers.

==================================================
45. SEO-FRIENDLY RENDERING
==========================

Make sure the actual public HTML contains the article content in crawlable form.

Do not rely on client-side API calls alone if that would prevent important metadata/content from being available appropriately.

Respect the current frontend framework architecture.

Where the application supports SSR/SSG/server components, use them appropriately for public blog pages.

==================================================
46. INDEXABILITY RULES
======================

Implement clear rules:

Published + public + indexable:
index, follow

Draft:
noindex

Pending:
noindex

Scheduled:
noindex until publication

Preview:
noindex

Archived:
noindex or redirect according to defined archive behavior

Deleted:
404 or 410 where appropriate

Do not expose unpublished content through sitemap, related posts, category pages or public API responses.

==================================================
47. 404 / 410 HANDLING
======================

When a blog no longer exists:

If a valid replacement exists:
301 redirect

If permanently removed without replacement:
return an appropriate 404/410 according to project strategy

Do not return HTTP 200 for missing blog URLs.

Avoid soft 404 pages.

==================================================
48. INTERNAL SEO LINK HEALTH
============================

Create a background/manual SEO utility for admins that can identify:

* Broken blog links
* Broken internal links
* Duplicate slugs
* Missing canonical
* Missing meta title
* Missing meta description
* Missing alt text
* Orphan blogs with no internal links pointing to them where detectable

==================================================
49. BLOG STRUCTURED DATA VALIDATION
===================================

Before publishing, validate generated JSON-LD.

Avoid:

* Invalid JSON
* Incorrect date formats
* Missing required applicable properties
* Fake authors
* Fake reviews
* Fake ratings
* Unsupported claims

Keep structured data aligned with visible content.

==================================================
50. SEO URL CHANGE MANAGEMENT
=============================

Maintain redirect history for every changed slug.

Never lose the old URL.

When a slug changes:

1. Old URL becomes 301
2. New URL becomes canonical
3. New URL becomes sitemap URL
4. Internal links should eventually use the new URL
5. Redirect chain should be minimized

==================================================
51. ADMIN UX
============

Make the CMS easy for a non-developer.

Use clear sections/tabs:

General
Content
SEO
Images
Author
Categories & Tags
FAQ
Lead Form
Publishing
Preview

Show validation errors near the relevant field.

Use confirmation dialogs for:

* Delete
* Unpublish
* Archive

Warn before leaving a page with unsaved changes.

==================================================
52. PUBLIC BLOG SEO
===================

For every published blog ensure:

* One H1
* Meaningful title
* Meaningful meta description
* Canonical
* Crawlable URL
* Correct Open Graph data
* Correct Twitter metadata
* Article JSON-LD
* Breadcrumbs
* Author information
* Published date
* Modified date
* Feature image
* Image alt text
* TOC where appropriate
* Internal links
* Related articles
* Proper heading hierarchy

Do not engage in black-hat SEO.

Avoid:

* Hidden keywords
* Invisible text
* Cloaking
* Keyword stuffing
* Manipulative links
* Fake structured data
* Doorway pages
* Automatically generated spam content

The content should be useful to actual users first.

==================================================
53. SEO CONTENT CHECKLIST
=========================

Create a CMS checklist such as:

TECHNICAL SEO

✓ URL slug
✓ Canonical URL
✓ Sitemap inclusion
✓ Indexability
✓ Structured data
✓ Breadcrumb
✓ Mobile-friendly page

ON-PAGE SEO

✓ H1
✓ H2/H3 structure
✓ Meta title
✓ Meta description
✓ Primary keyword
✓ Internal links
✓ External references where useful
✓ Image alt text
✓ TOC

CONTENT

✓ Useful introduction
✓ Clear sections
✓ Readable paragraphs
✓ Tables where useful
✓ FAQ where useful
✓ Related blogs
✓ Author information

==================================================
54. GOOGLE SEARCH / SEO COMPATIBILITY
=====================================

Implement according to current Google Search Central guidance.

Do not hard-code outdated SEO assumptions.

Important principles:

* Use descriptive titles and meta descriptions
* Use logical heading structure
* Use crawlable links
* Use canonicalization correctly
* Use valid structured data only where appropriate
* Use descriptive image alt text
* Keep important content accessible to crawlers
* Avoid spam/manipulation
* Maintain clean URL architecture
* Maintain working redirects when URLs change
* Keep XML sitemap accurate

==================================================
55. DATABASE CHOICE
===================

First inspect the current application.

Decision rule:

If the application already uses MongoDB:
use MongoDB.

If it already uses MySQL:
use MySQL.

If the application already has a working backend database:
extend that system.

Do not introduce MongoDB simply because a MongoDB URI was provided.

Do not introduce MySQL simply because phpMyAdmin is available.

Choose the system that minimizes complexity and integrates best with the current architecture.

==================================================
56. EXISTING COURSE TABLE INTEGRATION
=====================================

The lead form's Course field MUST use the existing website course data.

Inspect current database tables/models/APIs to identify:

* Course ID
* Course Name
* Course status
* Course display name

Use the existing source.

Do not hardcode:

BBA
MBA
BCA
MCA
etc.

unless those are already defined dynamically in the project's database.

==================================================
57. MIGRATION / BACKWARD COMPATIBILITY
======================================

Do not break existing blog pages if any already exist.

Before changing routes/database:

* inspect existing blog implementation
* identify existing URLs
* preserve existing content
* migrate old blogs if applicable
* preserve URLs where possible
* create redirects when required

If old blog data exists, create a migration/import strategy.

==================================================
58. TESTING
===========

Before declaring completion test:

ADMIN

* Login
* Unauthorized access
* Create blog
* Edit blog
* Draft
* Pending
* Publish
* Unpublish
* Schedule
* Delete
* Duplicate
* Preview
* Autosave

SEO

* Meta title
* Meta description
* Slug
* Canonical
* Sitemap
* Robots
* JSON-LD
* Open Graph
* Twitter cards
* Breadcrumb
* TOC
* Image alt text
* Internal links
* Redirects

CONTENT

* H1
* H2
* H3
* H4
* Tables
* FAQs
* Images
* Links
* Lead form

RESPONSIVE

* Desktop
* Tablet
* Mobile

SECURITY

* Unauthorized admin API access
* XSS
* malformed input
* dangerous URLs
* image upload validation
* database injection protection

PERFORMANCE

* public blog loading
* image optimization
* database query performance
* unnecessary JS
* CLS/LCP related image behavior

==================================================
59. IMPORTANT IMPLEMENTATION RULES
==================================

DO NOT:

* Rewrite the entire existing application unnecessarily
* Replace existing authentication unnecessarily
* Create duplicate course tables
* Create duplicate SEO systems
* Hardcode database credentials
* expose database credentials to frontend
* introduce arbitrary packages without checking current dependencies
* break current routing
* duplicate existing functionality

DO:

* Reuse current architecture
* Reuse current design system
* Reuse existing authentication
* Reuse existing database models
* Reuse current course data
* Reuse current image handling if secure
* Keep code modular
* Keep APIs documented
* Add comments around non-obvious logic
* Add validation
* Add error handling
* Add indexes
* Keep public URLs SEO-friendly

==================================================
60. ENVIRONMENT / SECRETS
=========================

Use environment variables.

Example:

DATABASE_URL=
MONGODB_URI=
SITE_URL=
PUBLIC_SITE_URL=
STORAGE_BUCKET=
STORAGE_BASE_URL=

Never commit secrets.

Do not print the database URI in logs.

Do not return secrets through API responses.

==================================================
61. FINAL DELIVERABLE
=====================

After implementation, provide a concise development report containing:

1. Existing architecture discovered
2. Database chosen and why
3. New database tables/collections
4. New API routes
5. New admin routes/pages
6. New public blog routes
7. SEO features implemented
8. Sitemap behavior
9. Canonical/redirect behavior
10. Structured data implemented
11. Image handling
12. Scheduling implementation
13. Security protections
14. Files created
15. Files modified
16. Environment variables required
17. Migration steps
18. Deployment steps
19. Cron configuration if required
20. Test results
21. Any remaining limitations

IMPORTANT:

Before implementation, inspect the existing application and make architectural decisions based on what is actually present.

Do not guess the framework, database, authentication system or course table.

Build the feature into the existing website cleanly.

The end result must be production-ready, secure, responsive, maintainable and SEO-friendly.

==================================================
PRIMARY OBJECTIVE
=================

The final workflow should be:

Admin Login
→ Blog Dashboard
→ Create/Edit Blog
→ Enter SEO metadata
→ Upload feature image + mandatory alt text
→ Write content using rich editor
→ Add TOC automatically
→ Add internal/external links
→ Add images with mandatory alt text
→ Add tables
→ Add FAQs
→ Add course enquiry form
→ Select author/category/tags
→ Run SEO validation
→ Preview
→ Save Draft / Schedule / Publish

After publishing:

Blog appears automatically on:

/blog/

and:

/blog/{slug}

The blog automatically receives:

* SEO meta tags
* canonical URL
* Open Graph
* Twitter metadata
* Article structured data
* Breadcrumb structured data
* Sitemap entry
* indexable page status
* TOC
* author information
* related blogs
* optimized images

And if the slug is later changed:

Old URL
→ 301 Redirect
→ New URL

Implement this as a complete end-to-end feature, not just a frontend mockup.
