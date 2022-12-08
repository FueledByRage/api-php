<?php
require_once '../src/cases/post/create/create.php';
require_once '../src/entities/post.php';
require_once '../src/utils/checkKeys.php';
require_once '../src/providers/jwt/jwt.php';
require_once '../src/DTOs/postDTO.php';


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

            if(!$this->checkKeys->execute($body, ['body', 'title']) || !$token) throw new Exception('Missing credentials', 406);    

            $user = $this->jwt->decript($token)->{'username'};
            
            $file = $req->getFile('file');

            $videoUrl = $this->saveVideo($file, $user);

            $postDTO = new PostInputDTO($user, $body['title'], $body['body'], date('Y-m-d H:i:s'), $videoUrl);

            $post = new Post($postDTO);
            
            $this->create->save($postDTO);

            //if(!$result) throw new Exception($result, 500);
            
            $res->status(201);
            $res->send(['url' => $post->getVideoUrl()]);
        }catch(Exception $e){
            $res->status($e->getCode());
            $res->send(['message' => $e->getMessage()]);
        }
    
    }

    private function saveVideo($file, $author) : string {
        if(!$file) throw new Exception('Vídeo not found.', 406);

        $currentDate = str_replace(' ' , '', date('H:i:s'));
        $newFileName = base64_encode($currentDate.'-'.$author).'.mp4';

        $upload = move_uploaded_file($file['tmp_name'], realpath('../public_html/uploads/videos').'/'.$newFileName);

        if(!$upload) throw new Exception('Error saving vídeo', 406);

        $videoUrl = 'http://localhost/clips/public_html/uploads/videos/'.$newFileName;

        return $videoUrl;
    }
}