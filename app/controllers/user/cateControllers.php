<?php
// Validate ID
if(!isset($_GET['id']) || !validateId($_GET['id'])){
    setFlashMessage('error', 'Danh mục không hợp lệ');
    safeRedirect('index.php');
}

$getCategoryById = getCategoryById($_GET['id']);

if(!is_array($getCategoryById)){
    setFlashMessage('error', 'Danh mục không tồn tại');
    safeRedirect('index.php');
}

$getAllPostByIdCate = getAllPostByIdCate($_GET['id']);
include_once("app/views/user/category.views.php");
