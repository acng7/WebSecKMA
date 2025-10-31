<?php
// Validate ID
if(!isset($_GET['id']) || !validateId($_GET['id'])){
    setFlashMessage('error', 'Bài viết không hợp lệ');
    safeRedirect('index.php');
}

$getPostById1 = getPostById1($_GET['id']);

if(!is_array($getPostById1)){
    setFlashMessage('error', 'Bài viết không tồn tại hoặc đã bị ẩn');
    safeRedirect('index.php');
}

include_once("app/views/user/postdetail.views.php");
