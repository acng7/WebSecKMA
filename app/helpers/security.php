<?php
/**
 * Security Helper Functions
 * Place this file in: app/helpers/security.php
 */

/**
 * Generate CSRF token
 */
function generateCsrfToken(){
    if(!isset($_SESSION['csrf_token'])){
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

/**
 * Verify CSRF token
 */
function verifyCsrfToken($token){
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

/**
 * Sanitize output to prevent XSS
 */
function e($string){
    return htmlspecialchars($string ?? '', ENT_QUOTES, 'UTF-8');
}

/**
 * Validate input
 */
function sanitizeInput($input){
    return trim(htmlspecialchars($input, ENT_QUOTES, 'UTF-8'));
}

/**
 * Check if user is logged in
 */
function isLoggedIn(){
    return isset($_SESSION['user']) && is_array($_SESSION['user']);
}

/**
 * Check if user has specific role
 */
function hasRole($roleId){
    return isLoggedIn() && $_SESSION['user']['role_id'] == $roleId;
}

/**
 * Check if user has any of the specified roles
 */
function hasAnyRole($roleIds){
    if(!isLoggedIn()) return false;
    return in_array($_SESSION['user']['role_id'], $roleIds);
}

/**
 * Redirect if not authorized
 */
function requireAuth($allowedRoles = []){
    if(!isLoggedIn()){
        header("Location: index.php?type=login");
        exit();
    }
    
    if(!empty($allowedRoles) && !hasAnyRole($allowedRoles)){
        header("Location: index.php?type=home");
        exit();
    }
}

/**
 * Safe redirect
 */
function safeRedirect($url){
    header("Location: " . $url);
    exit();
}

/**
 * Validate file upload
 */
function validateImageUrl($url){
    // Basic URL validation
    if(!filter_var($url, FILTER_VALIDATE_URL)){
        return false;
    }
    return true;
}

/**
 * Validate integer input
 */
function validateId($id){
    return filter_var($id, FILTER_VALIDATE_INT) !== false && $id > 0;
}

/**
 * Set flash message
 */
function setFlashMessage($type, $message){
    $_SESSION['flash'][$type] = $message;
}

/**
 * Get and clear flash message
 */
function getFlashMessage($type){
    if(isset($_SESSION['flash'][$type])){
        $message = $_SESSION['flash'][$type];
        unset($_SESSION['flash'][$type]);
        return $message;
    }
    return null;
}

/**
 * Rate limiting helper
 */
function checkRateLimit($action, $maxAttempts = 5, $timeWindow = 300){
    $key = 'rate_limit_' . $action . '_' . ($_SERVER['REMOTE_ADDR'] ?? 'unknown');
    
    if(!isset($_SESSION[$key])){
        $_SESSION[$key] = ['count' => 0, 'start_time' => time()];
    }
    
    $rateLimit = $_SESSION[$key];
    
    // Reset if time window expired
    if(time() - $rateLimit['start_time'] > $timeWindow){
        $_SESSION[$key] = ['count' => 1, 'start_time' => time()];
        return true;
    }
    
    // Check if limit exceeded
    if($rateLimit['count'] >= $maxAttempts){
        return false;
    }
    
    // Increment counter
    $_SESSION[$key]['count']++;
    return true;
}
