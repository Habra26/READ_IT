<?php

namespace App\Controllers\UsersController;

use \PDO;
use \App\Models\UsersModel;

function loginFormAction()
{
    global $content, $title;
    $title = "User Connection";
    ob_start();
    include '../app/views/users/loginForm.php';
    $content = ob_get_clean();
}

function loginAction(PDO $conn, array $data)
{
    include_once '../app/models/usersModel.php';
    // Récupérer le user correspondant dans $user
    $user = UsersModel\findOneByEmailAndPassword($conn, $data);

    // Si on a un user on redirige vers le backoffice
    if ($user):
        // On lui met un badge et on le fait entrer
        $_SESSION['user'] = $user;
        header('Location: ' . ADMIN_BASE_URL . 'dashboard');
    // Sinon on redirige vers le formulaire de connexion
    else:
        header('Location: ' . PUBLIC_BASE_URL . 'users/login-form');
    endif;
}
