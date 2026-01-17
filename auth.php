<?php
/**
 * Authentication Helper Functions
 * Handles user authentication, session management, and login tracking
 */

session_start();
require_once 'config.php';

/**
 * Check if user is logged in
 */
function isLoggedIn() {
    return isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);
}

/**
 * Get current logged in user data
 */
function getCurrentUser() {
    global $conn;
    
    if (!isLoggedIn()) {
        return null;
    }
    
    $user_id = $_SESSION['user_id'];
    $stmt = $conn->prepare("SELECT id, username, email, full_name, created_at FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    return $result->fetch_assoc();
}

/**
 * Track user login
 */
function trackLogin($user_id, $ip_address = null, $user_agent = null) {
    global $conn;
    
    if (!$ip_address) {
        $ip_address = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
    }
    
    if (!$user_agent) {
        $user_agent = $_SERVER['HTTP_USER_AGENT'] ?? 'unknown';
    }
    
    $stmt = $conn->prepare("INSERT INTO user_logins (user_id, login_date, ip_address, user_agent) VALUES (?, NOW(), ?, ?)");
    $stmt->bind_param("iss", $user_id, $ip_address, $user_agent);
    $stmt->execute();
}

/**
 * Get user login history
 */
function getUserLoginHistory($user_id, $limit = 10) {
    global $conn;
    
    $stmt = $conn->prepare("SELECT login_date, ip_address FROM user_logins WHERE user_id = ? ORDER BY login_date DESC LIMIT ?");
    $stmt->bind_param("ii", $user_id, $limit);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $logins = [];
    while ($row = $result->fetch_assoc()) {
        $logins[] = $row;
    }
    
    return $logins;
}

/**
 * Require login - redirect if not logged in
 */
function requireLogin() {
    if (!isLoggedIn()) {
        header('Location: login.php');
        exit();
    }
}

/**
 * Redirect if already logged in
 */
function redirectIfLoggedIn($redirect_to = 'index.php') {
    if (isLoggedIn()) {
        header("Location: $redirect_to");
        exit();
    }
}
?>
