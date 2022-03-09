<?php
require_once 'database.php';

/**
 * add post
 */
function addPost($post)
{
    global $database;
    $title = $post['title'];
    $description = $post['description'];
    $query = $database->prepare("INSERT INTO posts(title, description, ...) VALUES(:title, :description, ...)");
    $query->execute([
        ':title' => $title,
        ':description' => $description,
    ]);
}

/**
 * get all post
 */
function getAllPost()
{
    global $database;
    
    $query = $database->prepare("SELECT * FROM posts ORDER BY id DESC");
    $query->execute();
    return $query->fetchAll();
}

/**
 * get single post
 */
function getPost($id)
{
    global $database;
    
    $query = $database->prepare("SELECT * FROM posts WHERE id = :id");
    $query->execute([
        ':id' => $id,
    ]);
    return $query->fetch();
}

/**
 * delete post
 */
function deletePost($id)
{
    global $database;
    
    $query = $database->prepare("DELETE FROM posts WHERE id = :id");
    $query->execute([
        ':id' => $id,
    ]);
}

/**
 * update post
 */
function updatePost($post)
{
    global $database;
    $id = $post['id'];
    $title = $post['title'];
    $description = $post['description'];
    $query = $database->prepare("UPDATE posts SET title = :title, description = :description, ... WHERE id = :id");
    $query->execute([
        ':id' => $id,
        ':title' => $title,
        ':description' => $description,
    ]);
}
