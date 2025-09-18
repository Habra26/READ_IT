<?php

namespace App\Controllers\UsersController;

use \PDO, \App\Models\UsersModel;

function logoutAction()
{
    // On tue la $_SESSION['user]
    // On redirige vers la connexion
    unset($_SESSION['user']);
    header('Location: ' . PUBLIC_BASE_URL . 'users/login-form');
}

function indexAction(PDO $conn)
{
    include_once '../app/models/usersModel.php';
    $users = UsersModel\findAll($conn);
    global $title, $content;
    $title = "Users List";
    ob_start();
    include '../app/views/users/index.php';
    $content = ob_get_clean();
}

function newAction()
{
    global $title, $content;
    $title = "Add a user";
    ob_start();
    include '../app/views/users/new.php';
    $content = ob_get_clean();
}

function createAction(PDO $conn, array $data)
{
    include_once '../app/models/usersModel.php';
    $reponse = UsersModel\create($conn, $data);
    header('Location: ' . ADMIN_BASE_URL . 'users');
}
