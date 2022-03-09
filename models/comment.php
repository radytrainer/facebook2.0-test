<?php
require_once 'database.php';

/**
 * add comment
 */
function addComment($comment)
{
    global $database;
    $comment = $comment['comment'];
    $date = $comment['date'];
    $query = $database->prepare("INSERT INTO comments(comment, date, ...) VALUES(:comment, :date, ...)");
    $query->execute([
        ':comment' => $comment,
        ':date' => $date,
    ]);
}

/**
 * get all comment
 */
function getAllComment()
{
    global $database;
    
    $query = $database->prepare("SELECT * FROM comments ORDER BY id DESC");
    $query->execute();
    return $query->fetchAll();
}

/**
 * get single comment
 */
function getComment($id)
{
    global $database;
    
    $query = $database->prepare("SELECT * FROM comments WHERE id = :id");
    $query->execute([
        ':id' => $id,
    ]);
    return $query->fetch();
}

/**
 * delete comment
 */
function deleteComment($id)
{
    global $database;
    
    $query = $database->prepare("DELETE FROM comments WHERE id = :id");
    $query->execute([
        ':id' => $id,
    ]);
}

/**
 * update comment
 */
function updateComment($comment)
{
    global $database;
    $id = $comment['id'];
    $comment = $comment['comment'];
    $date = $comment['date'];
    $query = $database->prepare("UPDATE comments SET comment = :comment, date = :date, ... WHERE id = :id");
    $query->execute([
        ':id' => $id,
        ':comment' => $comment,
        ':date' => $date,
    ]);
}
