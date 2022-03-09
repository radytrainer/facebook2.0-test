<?php
require_once 'database.php';

/**
 * add User
 */
function addUser($user)
{
    global $database;
    $name = $user['name'];
    $email = $user['email'];
    $query = $database->prepare("INSERT INTO users(name, email, ...) VALUES(:name, :email, ...)");
    $query->execute([
        ':name' => $name,
        ':email' => $email,
    ]);
}

/**
 * get all user
 */
function getAllUser()
{
    global $database;
    
    $query = $database->prepare("SELECT * FROM users ORDER BY id DESC");
    $query->execute();
    return $query->fetchAll();
}

/**
 * get single user
 */
function getUser($id)
{
    global $database;
    
    $query = $database->prepare("SELECT * FROM users WHERE id = :id");
    $query->execute([
        ':id' => $id,
    ]);
    return $query->fetch();
}

/**
 * delete user
 */
function deleteUser($id)
{
    global $database;
    
    $query = $database->prepare("DELETE FROM users WHERE id = :id");
    $query->execute([
        ':id' => $id,
    ]);
}

/**
 * update user
 */
function updateUser($user)
{
    global $database;
    $id = $user['id'];
    $name = $user['name'];
    $email = $user['email'];
    $query = $database->prepare("UPDATE users SET name = :name, email = :email, ... WHERE id = :id");
    $query->execute([
        ':id' => $id,
        ':name' => $name,
        ':email' => $email,
    ]);
}
