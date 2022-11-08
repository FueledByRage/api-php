<?php
require_once '../src/cases/user/login/controller.php';
require_once '../src/cases/user/login/login.php';
require_once '../src/repositories/implementations/userMysqlImplementation.php';
require_once '../src/providers/database/bd.php';
require_once '../src/utils/checkKeys.php';
require_once '../src/providers/jwt/jwt.php';


$database = new DatabaseProvider();
$jwt = new JWT();
$userImplementation = new UserMysql($database->getConnection());
$login = new Login($userImplementation);
$checkKeys = new CheckKeys();
$loginController = new loginController($login, $checkKeys, $jwt);