<?php
/**
 * SECURE PDO Database Layer
 * Fixed: SQL Injection vulnerabilities with proper prepared statements
 */

define('DBHOST', 'localhost:3307');
define('DBUSER', 'uyen');
define('DBPASS', 'uyen');
define('DBNAME', 'webantoan');

function pdo_get_connection(){
    try {
        $conn = new PDO('mysql:host='.DBHOST.';dbname='.DBNAME.';charset=utf8mb4', DBUSER, DBPASS);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        return $conn;
    } catch(PDOException $e) {
        error_log("Database connection error: " . $e->getMessage());
        die("Lỗi kết nối cơ sở dữ liệu. Vui lòng thử lại sau.");
    }
}

/**
 * Execute SQL (INSERT, UPDATE, DELETE) with prepared statements
 * @param string $sql SQL query with placeholders
 * @param mixed ...$args Values for placeholders
 * @return bool Success status
 */
function pdo_execute($sql, ...$args){
    try{
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($args);
        return true;
    }
    catch(PDOException $e){
        error_log("Query error: " . $e->getMessage());
        return false;
    }
    finally{
        unset($conn);
    }
}

/**
 * Query multiple rows
 * @param string $sql SQL query with placeholders
 * @param mixed ...$args Values for placeholders
 * @return array Array of records
 */
function pdo_query($sql, ...$args){
    try{
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($args);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }
    catch(PDOException $e){
        error_log("Query error: " . $e->getMessage());
        return [];
    }
    finally{
        unset($conn);
    }
}

/**
 * Query single row
 * @param string $sql SQL query with placeholders
 * @param mixed ...$args Values for placeholders
 * @return array|false Single record or false
 */
function pdo_query_one($sql, ...$args){
    try{
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    catch(PDOException $e){
        error_log("Query error: " . $e->getMessage());
        return false;
    }
    finally{
        unset($conn);
    }
}

/**
 * Query single value
 * @param string $sql SQL query with placeholders
 * @param mixed ...$args Values for placeholders
 * @return mixed Single value
 */
function pdo_query_value($sql, ...$args){
    try{
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ? array_values($row)[0] : null;
    }
    catch(PDOException $e){
        error_log("Query error: " . $e->getMessage());
        return null;
    }
    finally{
        unset($conn);
    }
}
