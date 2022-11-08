<?php
require_once '../src/cases/post/create/create.php';
require_once '../src/entities/post.php';
require_once '../src/utils/checkKeys.php';
require_once '../src/providers/jwt/jwt.php';

class CreatePostController{

    function __construct(
        public CreatePost $create,
        public CheckKeys $checkKeys,
        public JWT $jwt
    ){}

    function execute($req, $res){
        try{
            $body = $req->body();

            $token = getallheaders()['token'];

            if(!$this->checkKeys->execute($body, ['body']) || !$token) throw new Exception('Missing credentials', 406);    

            $user = $this->jwt->decript($token)->{'username'};
            
            $file = $req->getFile('file');

            $videoUrl = $this->saveVideo($file);
            
            $post = new Post($user, $body['body'], date('Y-m-d H:i:s'), $videoUrl);
            
            if(!$this->create->save($post)) throw new Exception('Error saving post', 500);
            
            $res->status(201);
            $res->send(['post' => $post]);
        }catch(Exception $e){
            $res->status($e->getCode());
            $res->send(['message' => $e->getMessage()]);
        }
    
    }

    private function saveVideo($file) : string {
        if(!$file) throw new Exception('Vídeo not found.', 406);

        $upload = move_uploaded_file($file['tmp_name'], realpath('./uploads/videos').'/'.$file['name']);

        if(!$upload) throw new Exception('Error saving vídeo', 406);

        $videoName = $file['name'];
        $videoUrl = 'http://localhost:8000/uploads/videos/'.$videoName;

        return $videoUrl;
    }
}