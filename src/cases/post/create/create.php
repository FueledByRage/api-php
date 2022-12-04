<?php
require_once '../src/repositories/IPostRepository.php';
require_once '../src/repositories/IUserRepository.php';
require_once '../src/entities/post.php';

class CreatePost{

    function __construct(
        public iPost $postImplementation,
        public IUser $userImplementation 
    ){}
    
    function save(Post $post){
        
        $user = $this->userImplementation->get($post->getAuthor());

        if(!$user) throw new Exception('User not found', 404);

        $this->postImplementation->save($post, $user['id']);
    }
}