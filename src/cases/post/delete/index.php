<?php
require_once '../src/cases/post/delete/controller.php';
require_once '../src/cases/post/delete/delete.php';
require_once '../src/repositories/implementations/postMysqlImplementation.php';
require_once '../src/providers/database/bd.php';
require_once '../src/utils/checkKeys.php';
require_once '../src/providers/jwt/jwt.php';


$database = new DatabaseProvider();

$jwt = new JWT();
$checkKeys = new CheckKeys();
$postImplementation = new PostMysql($database->getConnection());
$delete = new DeletePost($postImplementation);
$deletePostController = new DeleteController($delete, $jwt, $checkKeys);