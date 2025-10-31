<?php
if(isset($_POST['search']) && isset($_POST['btn-search'])){
    // Verify CSRF token
    if(!isset($_POST['csrf_token']) || !verifyCsrfToken($_POST['csrf_token'])){
        $getAllPostBySearch = [];
        $search = '';
    }else{
        $search = sanitizeInput($_POST['search']);
        
        if(empty($search)){
            $getAllPostBySearch = [];
        }elseif(strlen($search) > 255){
            $search = substr($search, 0, 255);
            $getAllPostBySearch = getAllPostBySearch($search);
        }else{
            $getAllPostBySearch = getAllPostBySearch($search);
        }
    }
}else{
    $getAllPostBySearch = [];
    $search = '';
}

include_once("app/views/user/search.views.php");
