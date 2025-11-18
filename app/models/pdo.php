<?php

/**
 * SECURE PDO Database Layer
 * Fixed: SQL Injection vulnerabilities with proper prepared statements
 */

define('DBHOST', 'localhost:3306');
define('DBUSER', 'root');
define('DBPASS', '');
define('DBNAME', 'webantoan');

function pdo_get_connection()
{
    try {
        $conn = new PDO('mysql:host=' . DBHOST . ';dbname=' . DBNAME . ';charset=utf8mb4', DBUSER, DBPASS);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        return $conn;
    } catch (PDOException $e) {
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
function pdo_execute($sql, ...$args)
{
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($args);
        return true;
    } catch (PDOException $e) {
        $errorMsg = "Query error: " . $e->getMessage();
        error_log($errorMsg);

        // Ghi log vào file
        $logFile = __DIR__ . '/../../logs/pdo_error.log';
        $timestamp = date('Y-m-d H:i:s');
        $logEntry = "[$timestamp] SQL: $sql | Args: " . json_encode($args) . " | Error: " . $e->getMessage() . "\n";
        file_put_contents($logFile, $logEntry, FILE_APPEND);
        return false;
    } finally {
        unset($conn);
    }
}

function pdo_execute_insert($sql, ...$args)
{
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($args);

        // Sửa đổi: Trả về ID của bản ghi vừa được tạo
        return $conn->lastInsertId();
    } catch (PDOException $e) {
        $errorMsg = "Query error: " . $e->getMessage();
        error_log($errorMsg);

        // Ghi log vào file
        $logFile = __DIR__ . '/../../logs/pdo_error.log';
        $timestamp = date('Y-m-d H:i:s');
        $logEntry = "[$timestamp] SQL: $sql | Args: " . json_encode($args) . " | Error: " . $e->getMessage() . "\n";
        file_put_contents($logFile, $logEntry, FILE_APPEND);

        return 0; // Trả về 0 hoặc FALSE nếu thất bại
    } finally {
        unset($conn);
    }
}

/**
 * Query multiple rows
 * @param string $sql SQL query with placeholders
 * @param mixed ...$args Values for placeholders
 * @return array Array of records
 */
function pdo_query($sql, ...$args)
{
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($args);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    } catch (PDOException $e) {
        $errorMsg = "Query error: " . $e->getMessage();
        error_log($errorMsg);

        // Ghi log vào file
        $logFile = __DIR__ . '/../../logs/pdo_error.log';
        $timestamp = date('Y-m-d H:i:s');
        $logEntry = "[$timestamp] SQL: $sql | Args: " . json_encode($args) . " | Error: " . $e->getMessage() . "\n";
        file_put_contents($logFile, $logEntry, FILE_APPEND);
        return [];
    } finally {
        unset($conn);
    }
}

/**
 * Query single row
 * @param string $sql SQL query with placeholders
 * @param mixed ...$args Values for placeholders
 * @return array|false Single record or false
 */
function pdo_query_one($sql, ...$args)
{
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    } catch (PDOException $e) {
        error_log("Query error: " . $e->getMessage());
        return false;
    } finally {
        unset($conn);
    }
}

/**
 * Query single value
 * @param string $sql SQL query with placeholders
 * @param mixed ...$args Values for placeholders
 * @return mixed Single value
 */
function pdo_query_value($sql, ...$args)
{
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ? array_values($row)[0] : null;
    } catch (PDOException $e) {
        error_log("Query error: " . $e->getMessage());
        return null;
    } finally {
        unset($conn);
    }
}
