<?php
if(isset($_POST['search']) && isset($_POST['btn-search'])){
    $search=$_POST['search'];
    $getAllPostBySearch=getAllPostBySearch($search);
}else{
    $getAllPostBySearch=[];
    $search='';
}
include_once("app/views/user/search.views.php");
