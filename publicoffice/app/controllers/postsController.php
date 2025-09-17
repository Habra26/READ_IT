<?php

namespace App\Controllers\PostsController;

use \PDO;
use \App\Models\PostsModel;

function indexAction(PDO $conn): void
{
    include_once '../app/models/postsModel.php';
    $posts = PostsModel\findAll($conn, 8);

    global $content, $title;
    $title = "Latest posts";
    ob_start();
    include '../app/views/posts/index.php';
    $content = ob_get_clean();
}
function showAction(PDO $conn, int $id): void
{
    include_once '../app/models/postsModel.php';
    $post = PostsModel\findOneById($conn, $id);

    global $content, $title;
    $title = $post['title'];
    ob_start();
    include '../app/views/posts/show.php';
    $content = ob_get_clean();
}
