<?php
$getCategoryById=getCategoryById($_GET['id']);
if(!is_array($getCategoryById)){
    header("Location: index.php");
}
$getAllPostByIdCate=getAllPostByIdCate($_GET['id']);
include_once("app/views/user/category.views.php");
