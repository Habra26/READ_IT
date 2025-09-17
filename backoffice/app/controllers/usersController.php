<?php

namespace App\Controllers\UsersController;

use \PDO;

function logoutAction()
{
    // On tue la $_SESSION['user]
    // On redirige vers la connexion
    unset($_SESSION['user']);
    header('Location: ' . PUBLIC_BASE_URL . 'users/login-form');
}
