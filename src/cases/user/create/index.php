<?php
require('controller.php');
require_once '../src/cases/user/create/create.php';
require_once '../src/providers/database/bd.php';
require_once '../src/repositories/implementations/userMysqlImplementation.php';
require_once '../src/utils/checkKeys.php';
require_once '../src/providers/jwt/jwt.php';


$database = new DatabaseProvider();
$jwt = new JWT();
$checkKeys = new CheckKeys();
$userImplementation = new UserMysql(null);
$create = new CreateUser($userImplementation);
$createUserController = new Controller($create, $checkKeys, $jwt);