<?php
/**
 * SECURE Index Router
 * Fixed: Added security layer and proper session handling
 */

// Start session with secure settings
ini_set('session.cookie_httponly', 1);
ini_set('session.use_only_cookies', 1);
ini_set('session.cookie_secure', 0); // Set to 1 if using HTTPS
session_start();

// Include core files
include("app/models/pdo.php");
include("app/models/user/productModels.php");
include("app/models/user/userModels.php");
include("app/helpers/security.php");

// Security headers
header("X-Frame-Options: SAMEORIGIN");
header("X-Content-Type-Options: nosniff");
header("X-XSS-Protection: 1; mode=block");

// Check if user is logged in
if(isset($_SESSION['user'])){
    $userRole = $_SESSION['user']['role_id'];
    
    // ADMIN ROUTES (role_id = 1)
    if($userRole == 1){
        include_once("app/controllers/admin/headerControllers.php");
        
        if(isset($_GET['type'])){
            switch ($_GET['type']) {
                case 'post':
                    include_once("app/controllers/admin/postControllers.php");
                    break;
                case 'cate':
                    include_once("app/controllers/admin/cateControllers.php");
                    break;
                case 'user':
                    include_once("app/controllers/admin/userControllers.php");
                    break;
                default:
                    include_once("app/controllers/admin/postControllers.php");
                    break;
            }
        }else{
            include_once("app/controllers/admin/postSelfControllers.php");
        }
    }
    // EDITOR ROUTES (role_id = 2)
    elseif($userRole == 2){
        include_once("app/controllers/admin/headerControllers.php");
        
        if(isset($_GET['type'])){
            switch ($_GET['type']) {
                case 'post':
                    include_once("app/controllers/admin/postControllers.php");
                    break;
                case 'cate':
                    include_once("app/controllers/admin/cateControllers.php");
                    break;
                default:
                    include_once("app/controllers/admin/postControllers.php");
                    break;
            }
        }else{
            include_once("app/controllers/admin/postSelfControllers.php");
        }
    }
    // AUTHOR ROUTES (role_id = 3)
    elseif($userRole == 3){
        include_once("app/controllers/admin/headerControllers.php");
        
        if(isset($_GET['type'])){
            switch ($_GET['type']) {
                case 'postself':
                    include_once("app/controllers/admin/postSelfControllers.php");
                    break;
                default:
                    include_once("app/controllers/admin/postSelfControllers.php");
                    break;
            }
        }else{
            include_once("app/controllers/admin/postSelfControllers.php");
        }
    }
    // PUBLIC USER ROUTES (logged in but regular user)
    else{
        include_once("app/controllers/user/headerControllers.php");
        
        if(isset($_GET['type'])){
            switch ($_GET['type']) {
                case 'home':
                    include_once("app/controllers/user/homeControllers.php");
                    break;
                case 'login':
                    safeRedirect('index.php?type=home'); // Already logged in
                    break;
                case 'regis':
                    safeRedirect('index.php?type=home'); // Already logged in
                    break; 
                case 'cate':
                    include_once("app/controllers/user/cateControllers.php");
                    break;
                case 'detail':
                    include_once("app/controllers/user/detailControllers.php");
                    break; 
                case 'search':
                    include_once("app/controllers/user/searchControllers.php");
                    break; 
                default:
                    include_once("app/controllers/user/homeControllers.php");
                    break;
            }
        }else{
            include_once("app/controllers/user/homeControllers.php");
        }
        
        include_once("app/controllers/user/footerControllers.php");
    }
}
// PUBLIC ROUTES (not logged in)
else{
    include_once("app/controllers/user/headerControllers.php");
    
    if(isset($_GET['type'])){
        switch ($_GET['type']) {
            case 'home':
                include_once("app/controllers/user/homeControllers.php");
                break;
            case 'login':
                include_once("app/controllers/user/loginControllers.php");
                break;
            case 'regis':
                include_once("app/controllers/user/regisControllers.php");
                break; 
            case 'cate':
                include_once("app/controllers/user/cateControllers.php");
                break;
            case 'detail':
                include_once("app/controllers/user/detailControllers.php");
                break; 
            case 'search':
                include_once("app/controllers/user/searchControllers.php");
                break; 
            default:
                include_once("app/controllers/user/homeControllers.php");
                break;
        }
    }else{
        include_once("app/controllers/user/homeControllers.php");
    }
    
    include_once("app/controllers/user/footerControllers.php");
}
