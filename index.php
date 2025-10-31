<?php
session_start();

include("app/models/pdo.php");
include("app/models/user/productModels.php");
include("app/models/user/userModels.php");
if(isset($_SESSION['user'])){
    if($_SESSION['user']['role_id']==1){
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
    }else if($_SESSION['user']['role_id']==2){
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
    }else if($_SESSION['user']['role_id']==3){
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
    }else{
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
                include_once("app/controllers/user/indexControllers.php");
                break;
        }
    }else{
        include_once("app/controllers/user/indexControllers.php");
    }
include_once("app/controllers/user/footerControllers.php");
    }
}else{
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

    
