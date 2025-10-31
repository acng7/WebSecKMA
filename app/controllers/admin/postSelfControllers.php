<?php

if(isset($_GET['type1'])){
    if($_GET['type1']=='fixpost'){
        if(isset($_POST['btn-save-post'])){
            updatePost($_POST['postName'],$_POST['postImage'],$_POST['postDescription'],$_POST['postContent'],$_GET['id'],$_SESSION['user']['id_user']);
        }
        $getPostByIdAndIdAuthor=getPostByIdAndIdAuthor($_SESSION['user']['id_user'],$_GET['id']);
        include_once("app/views/admin/fixpost.views.php");
    }else if($_GET['type1']=='addpost'){
        if(isset($_POST['btn-add-post'])){
            addPost($_POST['postName'], $_POST['postImage'], $_POST['postDescription'], $_POST['postContent'], $_SESSION['user']['id_user']);
        }
        include_once("app/views/admin/addpost.views.php");
    }
    
}else{
    if(isset($_GET['del'])){
        delPostRequest($_GET['del']);
    }
    if(isset($_GET['restore'])){
        restorePostRequest($_GET['restore']);
    }
    $getAllPostByIdAuthor=getAllPostByIdAuthor($_SESSION['user']['id_user']);
    include_once("app/views/admin/postself.views.php");
}