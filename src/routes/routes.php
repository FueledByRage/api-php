<?php
require '../src/providers/jwt/jwt.php';
require '../src/cases/user/create/index.php';
require '../src/cases/user/login/index.php';
require '../src/cases/user/get/index.php';
require '../src/cases/post/create/index.php';
require '../src/cases/post/get/index.php';
require '../src/cases/post/delete/index.php';
require '../src/routes/urlHandler.php';
require '../src/routes/router.php';


$router = new Router(new URLHandler);

$router->GET('/user/?username', $getController);

$router->GET('/post/?author', $getPostsController);

$router->POST('/user/register', $createUserController);

$router->POST('/post/register', $createPostController);
$router->DELETE('/post/?id', $deletePostController);

$router->POST('/login', $loginController);