<?php
function dangKy($userName,$password,$fullName,$role_id){
    $sql="SELECT * FROM users WHERE userName like '$userName'";
    $result=pdo_query($sql);
    if(count($result)==0){
        $sql="INSERT INTO users(userName,password,fullName,role_id) VALUES('$userName','$password','$fullName',$role_id)";
        return pdo_execute($sql);
    }else{
        return false;
    }
}
function dangNhap($userName,$password){
    $sql="SELECT * FROM users WHERE userName like '$userName' AND password like '$password' AND isActive = 0 ";
    return pdo_query_one($sql);
}

function getAllRole(){
    $sql="SELECT * FROM roles WHERE id_role!=1";
    return pdo_query($sql);
}

function getAllUser(){
    $sql="SELECT * FROM users INNER JOIN roles ON roles.id_role=users.role_id WHERE role_id!=1";
    return pdo_query($sql);
}
function activeUser($id){
    $sql="UPDATE users SET isActive=0 WHERE id_user=$id AND role_id!=1";
    return pdo_execute($sql);
}
function unActiveUser($id){
    $sql="UPDATE users SET isActive=1 WHERE id_user=$id AND role_id!=1";
    return pdo_execute($sql);
}