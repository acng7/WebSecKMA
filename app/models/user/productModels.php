<?php
/**
 * SECURE Product Models
 * Fixed: All SQL queries now use prepared statements
 */

// POST FUNCTIONS
function getAllPost(){
    $sql="SELECT * FROM posts 
          INNER JOIN post_categories ON posts.category_id = post_categories.id_post_category 
          INNER JOIN users ON posts.user_id = users.id_user 
          WHERE isAccepted = 0 AND post_categories.delCategory=0 AND users.isActive=0";
    return pdo_query($sql);
}

function getAllPost1(){
    $sql="SELECT * FROM posts 
          INNER JOIN post_categories ON posts.category_id = post_categories.id_post_category 
          INNER JOIN users ON posts.user_id = users.id_user";
    return pdo_query($sql);
}

function getAllPostBySearch($search){
    $sql="SELECT * FROM posts 
          INNER JOIN post_categories ON posts.category_id = post_categories.id_post_category 
          INNER JOIN users ON posts.user_id = users.id_user 
          WHERE isAccepted = 0 AND post_categories.delCategory=0 AND users.isActive=0 
          AND (postName LIKE ? OR users.fullName LIKE ?)";
    $searchTerm = '%' . $search . '%';
    return pdo_query($sql, $searchTerm, $searchTerm);
}

function getPostById($id_post){
    $sql="SELECT * FROM posts 
          INNER JOIN post_categories ON posts.category_id = post_categories.id_post_category  
          WHERE id_post=?";
    return pdo_query_one($sql, $id_post);
}

function getPostById1($id_post){
    $sql="SELECT * FROM posts 
          INNER JOIN post_categories ON posts.category_id = post_categories.id_post_category 
          INNER JOIN users ON posts.user_id = users.id_user  
          WHERE id_post=? AND post_categories.delCategory=0 AND users.isActive=0";
    return pdo_query_one($sql, $id_post);
}

function getPostByIdAndIdAuthor($id, $id_post){
    $sql="SELECT * FROM posts 
          INNER JOIN post_categories ON posts.category_id = post_categories.id_post_category 
          INNER JOIN users ON posts.user_id = users.id_user  
          WHERE (isAccepted = 0 OR isAccepted = 2) AND users.isActive=0 
          AND user_id=? AND id_post=?";
    return pdo_query_one($sql, $id, $id_post);
}

function getAllPostByIdAuthor($id){
    $sql="SELECT * FROM posts 
          INNER JOIN post_categories ON posts.category_id = post_categories.id_post_category 
          INNER JOIN users ON posts.user_id = users.id_user  
          WHERE users.isActive=0 AND user_id=?";
    return pdo_query($sql, $id);
}

function getAllPostByIdCate($id){
    $sql="SELECT * FROM posts 
          INNER JOIN post_categories ON posts.category_id = post_categories.id_post_category 
          INNER JOIN users ON posts.user_id = users.id_user 
          WHERE isAccepted = 0 AND post_categories.delCategory=0 AND users.isActive=0 
          AND category_id=?";
    return pdo_query($sql, $id);
}

function delPostRequest($id){
    $sql="UPDATE posts SET isAccepted=3 WHERE id_post=? AND isAccepted=0";
    return pdo_execute($sql, $id);
}

function delPostConfirm($id){
    $sql="DELETE FROM posts WHERE id_post=? AND isAccepted=3";
    return pdo_execute($sql, $id);
}

function acceptPost($id){
    $sql="UPDATE posts SET isAccepted=0 
          WHERE id_post=? AND category_id!=4 AND (isAccepted=1 OR isAccepted=2)";
    return pdo_execute($sql, $id);
}

function hidePost($id){
    $sql="UPDATE posts SET isAccepted=4 WHERE id_post=? AND isAccepted=0";
    return pdo_execute($sql, $id);
}

function unHidePost($id){
    $sql="UPDATE posts SET isAccepted=0 WHERE id_post=? AND isAccepted=4";
    return pdo_execute($sql, $id);
}

function restorePostRequest($id){
    $sql="UPDATE posts SET isAccepted=0 WHERE id_post=? AND isAccepted=3";
    return pdo_execute($sql, $id);
}

function updatePost($postName, $postImage, $postDescription, $postContent, $id_post, $id){
    $sql="UPDATE posts 
          SET postName=?, postImage=?, postDescription=?, postContent=?, isAccepted=2 
          WHERE id_post=? AND user_id=? AND (isAccepted=0 OR isAccepted=2)";
    return pdo_execute($sql, $postName, $postImage, $postDescription, $postContent, $id_post, $id);
}

function updatePost1($note, $category_id, $id_post){
    $sql="UPDATE posts SET note=?, category_id=? WHERE id_post=?";
    return pdo_execute($sql, $note, $category_id, $id_post);
}

function addPost($postName, $postImage, $postDescription, $postContent, $user_id){
    $sql="INSERT INTO posts(postName, postImage, postDescription, postContent, user_id) 
          VALUES (?, ?, ?, ?, ?)";
    return pdo_execute($sql, $postName, $postImage, $postDescription, $postContent, $user_id);
}

// CATEGORY FUNCTIONS
function getAllCategory(){
    $sql="SELECT * FROM post_categories WHERE delCategory=0 AND id_post_category!=4";
    return pdo_query($sql);
}

function getAllCategory1(){
    $sql="SELECT * FROM post_categories WHERE id_post_category!=4";
    return pdo_query($sql);
}

function addCate($nameCategory){
    $sql="INSERT INTO post_categories(nameCategory) VALUES(?)";
    return pdo_execute($sql, $nameCategory);
}

function getCategoryById($id){
    $sql="SELECT * FROM post_categories 
          WHERE delCategory=0 AND id_post_category=? AND id_post_category!=4";
    return pdo_query_one($sql, $id);
}

function getCategoryById1($id){
    $sql="SELECT * FROM post_categories 
          WHERE id_post_category=? AND id_post_category!=4";
    return pdo_query_one($sql, $id);
}

function updateCate($nameCategory, $id_post_category){
    $sql="UPDATE post_categories SET nameCategory=? 
          WHERE id_post_category=? AND id_post_category!=4";
    return pdo_execute($sql, $nameCategory, $id_post_category);
}

function hideCate($id_post_category){
    $sql="UPDATE post_categories SET delCategory=1 
          WHERE id_post_category=? AND id_post_category!=4";
    return pdo_execute($sql, $id_post_category);
}

function unHideCate($id_post_category){
    $sql="UPDATE post_categories SET delCategory=0 
          WHERE id_post_category=? AND id_post_category!=4";
    return pdo_execute($sql, $id_post_category);
}
