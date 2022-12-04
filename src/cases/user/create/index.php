<?php
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Connection\AMQPSSLConnection;
use PhpAmqpLib\Message\AMQPMessage;

require('controller.php');
require_once '../src/cases/user/create/create.php';
require_once '../src/providers/database/bd.php';
require_once '../src/providers/jobQueue/rabbitMQ.php';
require_once '../src/repositories/implementations/userMysqlImplementation.php';
require_once '../src/dataStream/implementations/rabbitmqImplementation.php';
require_once '../src/utils/checkKeys.php';
require_once '../src/providers/jwt/jwt.php';
require_once '../src/providers/jobQueue/rabbitMQ.php';

$database = new DatabaseProvider();
$jwt = new JWT();
$checkKeys = new CheckKeys();
$rabbitHole = new RabbitMQProvider();
$userImplementation = new UserMysql($database->getConnection());
$rabbitMq = new RabbitMQImplementation($rabbitHole);
$create = new CreateUser($userImplementation);
$createUserController = new Controller($create, $checkKeys, $jwt, $rabbitMq);