<?php
require_once './src/repositories/IPostRepository.php';
require_once './src/repositories/IUserRepository.php';
require_once './src/entities/post.php';

class DeletePost{

    function __construct(
        public iPost $postImplementation,
    ){}

    function execute(string $id, string $username){

        return $this->postImplementation->delete($id, $username);
    }
}