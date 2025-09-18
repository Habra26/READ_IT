<?php

use \App\Controllers\UsersController;

include_once '../app/controllers/usersController.php';

switch ($_GET['users']):
    case 'logout':
        UsersController\logoutAction();
        break;
    case 'new':
        UsersController\newAction();
        break;
    case 'create':
        UsersController\createAction($conn, $_POST);
        break;
    default:
        UsersController\indexAction($conn);
        break;
endswitch;
