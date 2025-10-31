<?php
if(isset($_POST['btn-regis'])){
    // Verify CSRF token
    if(!isset($_POST['csrf_token']) || !verifyCsrfToken($_POST['csrf_token'])){
        setFlashMessage('error', 'Yêu cầu không hợp lệ. Vui lòng thử lại.');
        safeRedirect('index.php?type=regis');
    }
    
    // Rate limiting
    if(!checkRateLimit('register', 3, 300)){
        setFlashMessage('error', 'Quá nhiều lần đăng ký. Vui lòng thử lại sau 5 phút.');
        safeRedirect('index.php?type=regis');
    }
    
    // Sanitize inputs
    $userName = sanitizeInput($_POST['userName']);
    $password = $_POST['password'];
    $fullName = sanitizeInput($_POST['fullName']);
    $role_id = filter_var($_POST['role_id'], FILTER_VALIDATE_INT);
    
    // Validate inputs
    if(empty($userName) || empty($password) || empty($fullName) || !$role_id){
        setFlashMessage('error', 'Vui lòng điền đầy đủ thông tin');
        safeRedirect('index.php?type=regis');
    }
    
    if(strlen($userName) < 3){
        setFlashMessage('error', 'Tên tài khoản phải có ít nhất 3 ký tự');
        safeRedirect('index.php?type=regis');
    }
    
    if(strlen($password) < 6){
        setFlashMessage('error', 'Mật khẩu phải có ít nhất 6 ký tự');
        safeRedirect('index.php?type=regis');
    }
    
    if($role_id == 1){
        setFlashMessage('error', 'Không thể đăng ký với vai trò này');
        safeRedirect('index.php?type=regis');
    }
    
    // Attempt registration
    $check = dangKy($userName, $password, $fullName, $role_id);
    
    if($check){
        setFlashMessage('success', 'Bạn đã đăng ký thành công! Hãy đợi sự phê duyệt của admin.');
        safeRedirect('index.php?type=login');
    }else{
        setFlashMessage('error', 'Tên đăng nhập đã tồn tại. Đăng ký thất bại!');
        safeRedirect('index.php?type=regis');
    }
}

$getAllRole = getAllRole();
include_once("app/views/user/regis.views.php");
