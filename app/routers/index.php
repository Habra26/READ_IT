<?php 

// Route des posts

if (isset($_GET['posts'])):
    include_once '../app/routers/posts.php';

// Route par défaut
else:
    include_once '../app/controllers/postsController.php';
endif;

\App\Controllers\PostsController\indexAction($connexion);