# Database Setup Instructions for Hostinger

## Step 1: Create MySQL Database on Hostinger

1. Login to your Hostinger control panel (hPanel)
2. Go to **Databases** → **MySQL Databases**
3. Click **Create New Database**
4. Enter a database name (e.g., `u123456789_amity`)
5. Create a database user with a strong password
6. Click **Create**

## Step 2: Import Database Table

1. In hPanel, go to **phpMyAdmin**
2. Select your newly created database from the left sidebar
3. Click on the **SQL** tab
4. Open the `database.sql` file from your website folder
5. Copy and paste the SQL content into the SQL query box
6. Click **Go** to execute the query
7. The `form_submissions` table will be created

## Step 3: Configure Database Connection

1. Open the `config.php` file in a text editor
2. Update the following values with your Hostinger database credentials:

```php
define('DB_HOST', 'localhost');              // Usually 'localhost'
define('DB_NAME', 'u123456789_amity');       // Your database name
define('DB_USER', 'u123456789_amityuser');   // Your database username
define('DB_PASS', 'your_strong_password');   // Your database password
```

3. Save the file

## Step 4: Upload Files to Hostinger

Upload the following files to your website's root directory:
- `config.php`
- `submit-form.php`
- `index.html`
- `mca.html`
- `bba.html`
- `mba.html`
- All other website files

## Step 5: Set Correct File Permissions

In Hostinger File Manager:
1. Right-click on `config.php` → **Permissions** → Set to `644`
2. Right-click on `submit-form.php` → **Permissions** → Set to `644`

## Step 6: Test the Forms

1. Visit your website
2. Click on "Apply Now", "Enquire Now", or "Download Brochure"
3. Fill in the form and submit
4. Check phpMyAdmin to verify the data was saved

## Database Structure

The `form_submissions` table has the following columns:

| Column | Type | Description |
|--------|------|-------------|
| id | INT | Auto-incrementing primary key |
| form_type | ENUM | Type of form: 'apply', 'enquire', or 'brochure' |
| course | VARCHAR(50) | Course name: 'MBA', 'MCA', 'BBA', or 'General' |
| phone | VARCHAR(20) | User's phone number |
| name | VARCHAR(100) | User's full name |
| email | VARCHAR(100) | User's email address |
| submitted_at | DATETIME | Timestamp when form was submitted |
| ip_address | VARCHAR(45) | (Optional) User's IP address |
| user_agent | TEXT | (Optional) User's browser information |

## Course Tracking

Forms automatically track which page they were submitted from:
- **index.html** → Course: "General"
- **mba.html** → Course: "MBA"
- **mca.html** → Course: "MCA"
- **bba.html** → Course: "BBA"

## Viewing Submissions

### Option 1: phpMyAdmin
1. Go to phpMyAdmin in hPanel
2. Select your database
3. Click on `form_submissions` table
4. Click **Browse** to view all submissions

### Option 2: Using SQL Queries
```sql
-- View all submissions
SELECT * FROM form_submissions ORDER BY submitted_at DESC;

-- View submissions by course
SELECT * FROM form_submissions WHERE course = 'MBA' ORDER BY submitted_at DESC;

-- View submissions by form type
SELECT * FROM form_submissions WHERE form_type = 'apply' ORDER BY submitted_at DESC;

-- Count submissions by course
SELECT course, COUNT(*) as total FROM form_submissions GROUP BY course;

-- View today's submissions
SELECT * FROM form_submissions WHERE DATE(submitted_at) = CURDATE();
```

## Export Data to Excel

1. In phpMyAdmin, select the `form_submissions` table
2. Click **Export** at the top
3. Choose format: **CSV for MS Excel** or **Microsoft Excel 2007**
4. Click **Go** to download

## Security Notes

1. **Never commit config.php with real credentials to Git**
2. Use strong database passwords
3. Keep PHP and database software updated
4. Regularly backup your database
5. Monitor for suspicious form submissions

## Troubleshooting

### Form submission fails
- Check `config.php` has correct database credentials
- Verify database table exists in phpMyAdmin
- Check browser console for JavaScript errors
- Verify `submit-form.php` has correct permissions (644)

### Data not appearing in database
- Check database connection in phpMyAdmin
- Verify table structure matches `database.sql`
- Check PHP error logs in hPanel

### CORS errors
- Ensure all files are in the same domain
- Check `.htaccess` file doesn't block PHP execution

## Support

For Hostinger-specific issues:
- Visit: https://support.hostinger.com
- Contact Hostinger support via live chat
