<?php
require_once '../src/cases/user/get/controller.php';
require_once '../src/cases/user/get/get.php';
require_once '../src/repositories/implementations/userMysqlImplementation.php';
require_once '../src/providers/database/bd.php';

$database = new DatabaseProvider();
$userImplementation = new UserMysql($database->getConnection());
$get = new GetUser($userImplementation);
$getController = new GetController($get);