<?php
require_once '../src/cases/post/create/controller.php';
require_once '../src/cases/post/create/create.php';
require_once '../src/repositories/implementations/postMysqlImplementation.php';
require_once '../src/providers/database/bd.php';
require_once '../src/utils/checkKeys.php';
require_once '../src/repositories/implementations/userMysqlImplementation.php';
require_once '../src/providers/jwt/jwt.php';


$database = new DatabaseProvider();
$jwt = new JWT();
$checkKeys = new CheckKeys();
$postImplementation = new PostMysql($database->getConnection());
$userImplementation = new UserMysql($database->getConnection());
$create = new CreatePost($postImplementation, $userImplementation);
$createPostController = new CreatePostController($create, $checkKeys, $jwt);