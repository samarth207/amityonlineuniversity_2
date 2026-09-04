<?php
// Set timezone to Indian Standard Time
date_default_timezone_set('Asia/Kolkata');

// Load a server-only .env file when present; hosting environment variables win.
$envFile = __DIR__ . '/.env';
if (is_readable($envFile)) {
    foreach (file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $envLine) {
        $envLine = trim($envLine);
        if ($envLine === '' || $envLine[0] === '#') continue;
        [$envKey, $envValue] = array_pad(explode('=', $envLine, 2), 2, '');
        $envKey = trim($envKey);
        if ($envKey !== '' && getenv($envKey) === false) putenv($envKey . '=' . trim($envValue, " \t\"") );
    }
}

// Keep credentials in Hostinger environment variables or a server-only config.
define('DB_HOST', getenv('DB_HOST') ?: 'localhost');
define('DB_NAME', getenv('DB_NAME') ?: '');
define('DB_USER', getenv('DB_USER') ?: '');
define('DB_PASS', getenv('DB_PASS') ?: '');

// Fast2SMS API Configuration
define('FAST2SMS_API_KEY', getenv('FAST2SMS_API_KEY') ?: '');
define('FAST2SMS_SENDER_ID', getenv('FAST2SMS_SENDER_ID') ?: 'TXTIND');
define('FAST2SMS_NOTIFICATION_NUMBER', getenv('FAST2SMS_NOTIFICATION_NUMBER') ?: '');
define('SITE_URL', rtrim(getenv('SITE_URL') ?: 'https://amityonlines.in', '/'));
define('BLOG_ADMIN_USER', getenv('BLOG_ADMIN_USER') ?: '');
define('BLOG_ADMIN_PASSWORD_HASH', getenv('BLOG_ADMIN_PASSWORD_HASH') ?: '');

// Create database connection
function getDBConnection() {
    try {
        $conn = new PDO(
            "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4",
            DB_USER,
            DB_PASS,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ]
        );
        // Set MySQL session timezone to IST
        $conn->exec("SET time_zone = '+05:30'");
        return $conn;
    } catch(PDOException $e) {
        error_log("Connection failed: " . $e->getMessage());
        return null;
    }
}

// Function to send SMS via Fast2SMS
function sendSMS($phone, $message) {
    $apiKey = FAST2SMS_API_KEY;
    
    // Fast2SMS API endpoint
    $url = 'https://www.fast2sms.com/dev/bulkV2';
    
    // Prepare data for API request
    $data = [
        'authorization' => $apiKey,
        'route' => 'q', // 'q' for quick transactional, 'dlt' for DLT
        'message' => $message,
        'language' => 'english',
        'flash' => 0,
        'numbers' => $phone
    ];
    
    // Initialize cURL
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/x-www-form-urlencoded'
    ]);
    
    // Execute request
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    // Log the response for debugging
    error_log("Fast2SMS Response: " . $response);
    
    // Return success status
    return $httpCode === 200;
}

// Function to send lead notification SMS
function sendLeadNotification($name, $phone, $email, $course, $formType) {
    $notificationNumber = FAST2SMS_NOTIFICATION_NUMBER;
    
    // Format message
    $message = "New Lead Alert!\n";
    $message .= "Name: $name\n";
    $message .= "Phone: $phone\n";
    $message .= "Email: $email\n";
    $message .= "Course: $course\n";
    $message .= "Type: $formType\n";
    $message .= "Time: " . date('d-M-Y H:i:s');
    
    // Send SMS
    return sendSMS($notificationNumber, $message);
}
?>