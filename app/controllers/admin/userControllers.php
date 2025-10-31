<?php
// Authorization check - only Admin can access
requireAuth([1]);

if(isset($_GET['active'])){
    if(!validateId($_GET['active'])){
        setFlashMessage('error', 'ID không hợp lệ');
    }else{
        if(activeUser($_GET['active'])){
            setFlashMessage('success', 'Kích hoạt tài khoản thành công');
        }else{
            setFlashMessage('error', 'Kích hoạt tài khoản thất bại');
        }
    }
    safeRedirect('index.php?type=user');
}

if(isset($_GET['unactive'])){
    if(!validateId($_GET['unactive'])){
        setFlashMessage('error', 'ID không hợp lệ');
    }else{
        if(unActiveUser($_GET['unactive'])){
            setFlashMessage('success', 'Vô hiệu hóa tài khoản thành công');
        }else{
            setFlashMessage('error', 'Vô hiệu hóa tài khoản thất bại');
        }
    }
    safeRedirect('index.php?type=user');
}

$getAllUser = getAllUser();
include_once("app/views/admin/user.views.php");
