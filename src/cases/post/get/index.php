<?php
require_once '../src/cases/post/get/controller.php';
require_once '../src/cases/post/get/get.php';
require_once '../src/repositories/implementations/postMysqlImplementation.php';
require_once '../src/providers/database/bd.php';

$database = new DatabaseProvider();
$postImplementation = new PostMysql($database->getConnection());
$get = new GetPosts($postImplementation);
$getPostsController = new GetPostsController($get);