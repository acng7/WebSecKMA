<?php
/**
 * SECURE User Header Controller
 * Fixed: CSRF protection, rate limiting, XSS prevention
 */

if(isset($_POST['btn-login'])){
    // Verify CSRF token
    if(!isset($_POST['csrf_token']) || !verifyCsrfToken($_POST['csrf_token'])){
        setFlashMessage('error', 'Yêu cầu không hợp lệ. Vui lòng thử lại.');
        safeRedirect('index.php?type=login');
    }
    
    // Rate limiting for login attempts
    if(!checkRateLimit('login', 5, 300)){
        setFlashMessage('error', 'Quá nhiều lần đăng nhập thất bại. Vui lòng thử lại sau 5 phút.');
        safeRedirect('index.php?type=login');
    }
    
    // Sanitize inputs
    $userName = sanitizeInput($_POST['userName']);
    $password = $_POST['password']; // Don't sanitize password as it may contain special chars
    
    // Validate inputs
    if(empty($userName) || empty($password)){
        setFlashMessage('error', 'Vui lòng nhập đầy đủ thông tin');
        safeRedirect('index.php?type=login');
    }
    
    // Attempt login
    $user = dangNhap($userName, $password);
    
    if(is_array($user)){
        // Regenerate session ID to prevent session fixation
        session_regenerate_id(true);
        
        $_SESSION['user'] = $user;
        
        // Reset rate limit on successful login
        unset($_SESSION['rate_limit_login_' . ($_SERVER['REMOTE_ADDR'] ?? 'unknown')]);
        
        setFlashMessage('success', 'Đăng nhập thành công');
        safeRedirect('index.php?type=home');
    }else{
        setFlashMessage('error', 'Tên đăng nhập hoặc mật khẩu không đúng');
        safeRedirect('index.php?type=login');
    }
}

if(isset($_GET['logout'])){
    if($_GET['logout']==1){
        echo '<script>
        if (confirm("Bạn có chắc chắn muốn đăng xuất không?")) {
            window.location.href = "index.php?type=home&logout=2"; 
        } else {
            window.location.href = "index.php?type=home";
        }
        </script>';
    }
    
    if($_GET['logout']==2){
        // Clear all session data
        $_SESSION = array();
        
        // Destroy the session cookie
        if (isset($_COOKIE[session_name()])) {
            setcookie(session_name(), '', time()-3600, '/');
        }
        
        session_destroy();
        safeRedirect('index.php?type=home');
    }
}

$getAllCategory = getAllCategory();
include_once("app/views/user/header.views.php");
