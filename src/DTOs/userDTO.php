<?php

class UserInputDTO{

    function __construct(
        public string $username,
        public string $email,
        public string $password,
        public string $about,
        public string $profileURL = ''
    ){} 
}