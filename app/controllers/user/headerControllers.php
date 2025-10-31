<?php
if(isset($_POST['btn-login'])){
    $_SESSION['user']=dangNhap($_POST['userName'],$_POST['password']);
    if(is_array($_SESSION['user'])){
        header("Location: index.php?type=home");
    }else{
        unset($_SESSION['user']);
        echo"<script>alert('Sai thong tin')</script>";
    }
}
if(isset($_GET['logout'])){
    echo'<script>
    if (confirm("Bạn có chắc chắn muốn đăng xuất không?")) {
        window.location.href = "index.php?type=home&logout=2"; 
    } 
    </script>';
    if($_GET['logout']==2){
        session_destroy();
        header("Location: index.php?type=home");
    }
    
}

$getAllCategory=getAllCategory();
include_once("app/views/user/header.views.php");
