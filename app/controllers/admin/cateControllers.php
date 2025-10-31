<?php

if(isset($_GET['type1'])){
    if($_GET['type1']=='fixcate'){
        if(isset($_POST['btn-save-cate'])){
            updateCate($_POST['nameCategory'],$_GET['id']);
        }
        $getCategoryById1=getCategoryById1($_GET['id']);
        include_once("app/views/admin/fixcate.views.php");
    }else if($_GET['type1']=='addcate'){
        if(isset($_POST['btn-add-cate'])){
            addCate($_POST['nameCategory']);
        }
        include_once("app/views/admin/addcate.views.php");
    }
    
}else{
    if(isset($_GET['hide'])){
        hideCate($_GET['hide']);
    }
    if(isset($_GET['unhide'])){
        unHideCate($_GET['unhide']);
    }
    $getAllCategory1=getAllCategory1();
    include_once("app/views/admin/cate.views.php");
}