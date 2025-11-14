<?php
/**
 * SECURE User Models
 */

function dangKy($userName, $password, $fullName, $role_id){
    // Check if username exists
    $sql="SELECT * FROM users WHERE userName=?";
    $result=pdo_query($sql, $userName);
    
    if(count($result)==0){
        $sql="INSERT INTO users(userName, password, fullName, role_id) 
              VALUES(?, ?, ?, ?)";
        return pdo_execute($sql, $userName, $password, $fullName, $role_id);
    }else{
        return false;
    }
}

function dangNhap($userName, $password){
    $sql="SELECT * FROM users WHERE userName=? AND isActive = 0";
    $user = pdo_query_one($sql, $userName);
    
    if($user && $password === $user['password']){
        // Remove password from session data
        unset($user['password']);
        return $user;
    }
    return false;
}

function getAllRole(){
    $sql="SELECT * FROM roles WHERE id_role!=1";
    return pdo_query($sql);
}

function getAllUser(){
    $sql="SELECT * FROM users 
          INNER JOIN roles ON roles.id_role=users.role_id 
          WHERE role_id!=1";
    return pdo_query($sql);
}

function activeUser($id){
    $sql="UPDATE users SET isActive=0 WHERE id_user=? AND role_id!=1";
    return pdo_execute($sql, $id);
}

function unActiveUser($id){
    $sql="UPDATE users SET isActive=1 WHERE id_user=? AND role_id!=1";
    return pdo_execute($sql, $id);
}

// Optional: Function to update user password
function updatePassword($userId, $newPassword){
    $sql="UPDATE users SET password=? WHERE id_user=?";
    return pdo_execute($sql, $newPassword, $userId);
}
