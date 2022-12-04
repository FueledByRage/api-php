<?php
use PhpAmqpLib\Exception\AMQPRuntimeException;
use \PhpAmqpLib\Connection\AMQPStreamConnection;

class RabbitMQProvider{

    private $connection = null;

    function getDataStreamProvider(){
        $connection = $this->getConnection();
        $channel = $connection->channel();

        $channel->exchange_declare('clips_exchange', 'direct', false, false, false);
        $channel->queue_declare('email_queue', false, false, false, false);
        //$channel->queue_bind('email_queue', 'clips_exchange', 'test_key');

        
        return $channel;
    }

    function getConnection(){
        $connection = new AMQPStreamConnection('localhost', 5671, 'admin', 'admin');
        $this->connection = $connection;
        return $connection;
    }

    function closeRabbitHole(){
        $this->connection->close();
    }

}