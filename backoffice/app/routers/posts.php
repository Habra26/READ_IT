<?php 

use \App\Controllers\postsController;

include_once '../app/controllers/postsController.php';

switch ($_GET['posts']):
    case 'show':
    PostsController\showAction($connexion, $_GET['id']);
        break;
    default:
        PostsController\indexAction($connexion);
        break;
endswitch;