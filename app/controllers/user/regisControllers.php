<?php
if(isset($_POST['btn-regis'])){
    $check=dangKy($_POST['userName'],$_POST['password'],$_POST['fullName'],$_POST['role_id']);
    if($check){
        echo"<script>alert('Bạn đã đăng ký thành công hãy đợi sự phê duyệt của admin!')</script>";
    }else{
        echo"<script>alert('Tên đăng nhập đã tồn tại. Đăng ký thất bại!')</script>";
    }
}
$getAllRole=getAllRole();
include_once("app/views/user/regis.views.php");
