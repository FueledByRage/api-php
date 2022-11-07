<?php
require_once './src/cases/user/get/get.php';
require_once './src/entities/user.php';
require_once './src/utils/checkKeys.php';

class GetPostsController{

    function __construct(
        public GetPosts $getPosts,
    ){}

    function execute($req, $res){
        try{
            $author = array_key_exists('author', $req->params) ? $req->params['author'] : null;
            if($author == null){
                throw new Exception('Missing credentials', 406);
            }
            $data = $this->getPosts->get($author);
            $res->send($data);
        }catch(Exception $e){
            $res->status($e->getCode());
            $res->send(['message' => $e->getMessage()]);
        }
    }
}