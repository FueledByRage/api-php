<?php

class PostInputDTO{
    function __construct(
        public $author,
        public $title,
        public $body,
        public $created_date,
        public $videoUrl
    ){}

        /**
         * Get the value of author
         */ 
        public function getAuthor()
        {
                return $this->author;
        }

        /**
         * Set the value of author
         *
         * @return  self
         */ 
        public function setAuthor($author)
        {
                $this->author = $author;

                return $this;
        }

        /**
         * Get the value of title
         */ 
        public function getTitle()
        {
                return $this->title;
        }

        /**
         * Set the value of title
         *
         * @return  self
         */ 
        public function setTitle($title)
        {
                $this->title = $title;

                return $this;
        }

        /**
         * Get the value of body
         */ 
        public function getBody()
        {
                return $this->body;
        }

        /**
         * Set the value of body
         *
         * @return  self
         */ 
        public function setBody($body)
        {
                $this->body = $body;

                return $this;
        }

        /**
         * Get the value of created_date
         */ 
        public function getCreated_date()
        {
                return $this->created_date;
        }

        /**
         * Set the value of created_date
         *
         * @return  self
         */ 
        public function setCreated_date($created_date)
        {
                $this->created_date = $created_date;

                return $this;
        }

        /**
         * Get the value of videoUrl
         */ 
        public function getVideoUrl()
        {
                return $this->videoUrl;
        }

        /**
         * Set the value of videoUrl
         *
         * @return  self
         */ 
        public function setVideoUrl($videoUrl)
        {
                $this->videoUrl = $videoUrl;

                return $this;
        }       
}