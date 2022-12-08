<?php
require_once '../src/repositories/IPostRepository.php';
require_once '../src/repositories/IUserRepository.php';
require_once '../src/entities/post.php';
require_once '../src/DTOs/postDTO.php';

class CreatePost{

    function __construct(
        public iPost $postImplementation,
        public IUser $userImplementation 
    ){}
    
    function save(PostInputDTO $postDTO){
        
        $user = $this->userImplementation->get($postDTO->getAuthor());

        if(!$user) throw new Exception('User not found', 404);

        $post = new Post($postDTO);

        $this->postImplementation->save($post, $user['id']);
    }
}