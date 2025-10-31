<?php

function getAllPost(){
    $sql="SELECT * FROM posts INNER JOIN post_categories ON posts.category_id = post_categories.id_post_category INNER JOIN users ON posts.user_id = users.id_user WHERE isAccepted = 0 AND post_categories.delCategory=0 AND users.isActive=0  ";
    return pdo_query($sql);
}
function getAllPost1(){
    $sql="SELECT * FROM posts INNER JOIN post_categories ON posts.category_id = post_categories.id_post_category INNER JOIN users ON posts.user_id = users.id_user";
    return pdo_query($sql);
}
function getAllPostBySearch($seacrh){
    $sql="SELECT * FROM posts INNER JOIN post_categories ON posts.category_id = post_categories.id_post_category INNER JOIN users ON posts.user_id = users.id_user WHERE isAccepted = 0 AND post_categories.delCategory=0 AND users.isActive=0  AND (postName like '%$seacrh%' OR users.fullName like '%$seacrh%')";
    return pdo_query($sql);
}
function getPostById($id_post){
    $sql="SELECT * FROM posts INNER JOIN post_categories ON posts.category_id = post_categories.id_post_category  WHERE id_post=$id_post ";
    return pdo_query_one($sql);
}
function getPostById1($id_post){
    $sql="SELECT * FROM posts INNER JOIN post_categories ON posts.category_id = post_categories.id_post_category INNER JOIN users ON posts.user_id = users.id_user  WHERE id_post=$id_post AND post_categories.delCategory=0 AND users.isActive=0 ";
    return pdo_query_one($sql);
}
function getPostByIdAndIdAuthor($id,$id_post){
    $sql="SELECT * FROM posts INNER JOIN post_categories ON posts.category_id = post_categories.id_post_category INNER JOIN users ON posts.user_id = users.id_user  WHERE (isAccepted = 0 OR isAccepted = 2) AND users.isActive=0 AND user_id=$id AND id_post=$id_post ";
    return pdo_query_one($sql);
}
function getAllPostByIdAuthor($id){
    $sql="SELECT * FROM posts INNER JOIN post_categories ON posts.category_id = post_categories.id_post_category INNER JOIN users ON posts.user_id = users.id_user  WHERE  users.isActive=0 AND user_id=$id  ";
    return pdo_query($sql);
}
function getAllPostByIdCate($id){
    $sql="SELECT * FROM posts INNER JOIN post_categories ON posts.category_id = post_categories.id_post_category INNER JOIN users ON posts.user_id = users.id_user WHERE isAccepted = 0 AND post_categories.delCategory=0 AND users.isActive=0 AND category_id=$id  ";
    return pdo_query($sql);
}
function delPostRequest($id){
    $sql="UPDATE posts SET isAccepted=3 WHERE id_post=$id AND isAccepted=0 ";
    return pdo_execute($sql);
}

function delPostConfirm($id){
    $sql="DELETE posts FROM posts WHERE id_post=$id AND isAccepted=3 ";
    return pdo_execute($sql);
}
function acceptPost($id){
    $sql="UPDATE posts SET isAccepted=0 WHERE id_post=$id AND category_id!=4 AND (isAccepted=1 OR isAccepted=2)";
    return pdo_execute($sql);
}
function hidePost($id){
    $sql="UPDATE posts SET isAccepted=4 WHERE id_post=$id  AND isAccepted=0";
    return pdo_execute($sql);
}
function unHidePost($id){
    $sql="UPDATE posts SET isAccepted=0 WHERE id_post=$id AND isAccepted=4";
    return pdo_execute($sql);
}
function restorePostRequest($id){
    $sql="UPDATE posts SET isAccepted=0 WHERE id_post=$id AND isAccepted=3";
    return pdo_execute($sql);
}
function updatePost($postName,$postImage,$postDescription,$postContent,$id_post,$id){
    $sql="UPDATE posts SET postName='$postName',postImage='$postImage',postDescription='$postDescription',postContent='$postContent',isAccepted=2 WHERE id_post=$id_post AND user_id=$id AND (isAccepted=0 OR isAccepted=2)";
    return pdo_execute($sql);
}
function updatePost1($note,$category_id,$id_post){
    $sql="UPDATE posts SET note='$note',category_id=$category_id WHERE id_post=$id_post";
    return pdo_execute($sql);
}
function addPost($postName, $postImage, $postDescription, $postContent, $user_id){
    $sql="INSERT INTO posts( postName, postImage, postDescription, postContent, user_id) VALUES ( '$postName', '$postImage', '$postDescription', '$postContent', $user_id)";
    return pdo_execute($sql);
}

function getAllCategory(){
    $sql="SELECT * FROM post_categories WHERE delCategory=0 AND id_post_category!=4";
    return pdo_query($sql);
}
function getAllCategory1(){
    $sql="SELECT * FROM post_categories WHERE id_post_category!=4";
    return pdo_query($sql);
}
function addCate($nameCategory){
    $sql="INSERT INTO post_categories(nameCategory) VALUES('$nameCategory')";
    return pdo_execute($sql);
}
function getCategoryById($id){
    $sql="SELECT * FROM post_categories WHERE delCategory=0 AND id_post_category=$id AND id_post_category!=4";
    return pdo_query_one($sql);
}
function getCategoryById1($id){
    $sql="SELECT * FROM post_categories WHERE  id_post_category=$id AND id_post_category!=4";
    return pdo_query_one($sql);
}
function updateCate($nameCategory,$id_post_category){
    $sql="UPDATE post_categories SET nameCategory='$nameCategory' WHERE id_post_category=$id_post_category AND id_post_category!=4";
    return pdo_execute($sql);
}

function hideCate($id_post_category){
    $sql="UPDATE post_categories SET delCategory=1 WHERE id_post_category=$id_post_category AND id_post_category!=4";
    return pdo_execute($sql);
}
function unHideCate($id_post_category){
    $sql="UPDATE post_categories SET delCategory=0 WHERE id_post_category=$id_post_category AND id_post_category!=4";
    return pdo_execute($sql);
}


