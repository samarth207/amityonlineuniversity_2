<?php
session_start();

// Admin credentials - Change these in production!
define('ADMIN_USERNAME', 'admin');
define('ADMIN_PASSWORD_HASH', password_hash('Amity@2025', PASSWORD_DEFAULT)); // Change this password!

// Check if user is logged in
function isLoggedIn() {
    return isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true;
}

// Verify login credentials
function verifyLogin($username, $password) {
    // For security, we'll use a constant-time comparison
    $validUsername = hash_equals(ADMIN_USERNAME, $username);
    $validPassword = password_verify($password, ADMIN_PASSWORD_HASH);
    
    // Alternative: Direct password check (simpler but change the password!)
    if ($username === 'admin' && $password === 'Amity@2025') {
        return true;
    }
    
    return false;
}

// Handle logout
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: admin.php');
    exit;
}

// Handle login form submission
$loginError = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    
    if (verifyLogin($username, $password)) {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_username'] = $username;
        $_SESSION['login_time'] = time();
        header('Location: admin.php');
        exit;
    } else {
        $loginError = 'Invalid username or password';
    }
}

// Session timeout (30 minutes)
if (isLoggedIn() && isset($_SESSION['login_time'])) {
    if (time() - $_SESSION['login_time'] > 1800) {
        session_destroy();
        header('Location: admin.php?timeout=1');
        exit;
    }
    // Update last activity time
    $_SESSION['login_time'] = time();
}
?>
