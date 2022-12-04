<?php

interface IDataStream{
    public function producer( array $message, string $queueName);
}