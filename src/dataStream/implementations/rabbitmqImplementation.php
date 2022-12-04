<?php
use PhpAmqpLib\Message\AMQPMessage;
require_once "../src/dataStream/IDataStream.php";
require_once '../src/providers/jobQueue/rabbitMQ.php';

class RabbitMQImplementation implements IDataStream{

    function __construct(
        private RabbitMQProvider $rabbitHole
    ){}

    function producer( array $message, string $queueName){
        $channel = $this->rabbitHole->getDataStreamProvider();
        $msg = new AMQPMessage(
            json_encode(
                $message,
                JSON_UNESCAPED_SLASHES
            ),
            ['delivery_mode' =>2]
        );
        $channel->basic_publish($msg, '', $queueName);
        $this->rabbitHole->closeRabbitHole();
    }
}