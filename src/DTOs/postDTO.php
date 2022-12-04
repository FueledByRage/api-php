<?php

class PostInputDTO{
    function __construct(
        public $author,
        public $title,
        public $body,
        public $created_date,
        public $videoUrl
    ){}
}