<?php
require_once './src/repositories/IPostRepository.php';
require_once './src/repositories/IUserRepository.php';
require_once './src/entities/post.php';

class CreatePost{

    function __construct(
        public iPost $postImplementation,
        public IUser $userImplementation 
    ){}
    
    function save(Post $post){
        
        $user = $this->userImplementation->get($post->author);

        if(!$user) throw new Exception('User not found', 404);

        $saved = $this->postImplementation->save($post, $user['id']);
        
        if(!$saved) throw new Exception('Error saving post.', 500);
        return $saved;
    }
}