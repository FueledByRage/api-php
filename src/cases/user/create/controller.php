<?php
require_once '../src/cases/user/create/create.php';
require_once '../src/entities/user.php';
require_once '../src/utils/checkKeys.php';
require_once '../src/providers/jwt/jwt.php';
require_once '../src/DTOs/userDTO.php';

class Controller{

    function __construct(
        public CreateUser $create,
        public CheckKeys $checkKeys,
        public JWT $jwt,
    ){}

    function execute($req, $res){
        try{
            $body = $req->body();
            if(!$this->checkKeys->execute($body, ['username', 'email', 'password', 'about'])){
                throw new Exception('Missing credentials', 406);
            }

            //gotta save the profile url and create it's url

            $file = $req->getFile('profile');
            $profileUrl = '';
            if($file) $profileUrl = $this->saveProfileUrl($file, $body['username']);
            
            $userDTO = new UserInputDTO($body['username'], $body['email'], $body['password'], $body['about'], $profileUrl);
            
            $save = $this->create->save($userDTO);
            
            if(!$save) throw new Exception('Error saving user', 500);

            $token = $this->jwt->provider(['typ' => 'JWT', 'alg' => 'HS256'],['username' => $userDTO->username]);
            $res->send(['token' => $token, 'user' => $userDTO->username]);
        }catch(Exception $e){
            $res->status($e->getCode());
            $res->send(['message' => $e->getMessage()]);
        }
    }

    private function saveProfileUrl($file, $username) : string{

        $dateTime = new DateTime();
        $date = $dateTime->format('d-m-y h:i:s');
        $fileName = $username;

        $upload = move_uploaded_file($file['tmp_name'], realpath('./uploads/videos').'/'.$fileName.$date);

        if(!$upload) throw new Exception('Error saving vídeo', 406);

        $profilePic = $file['name'];
        $profile = 'http://localhost:8000/uploads/videos/'.$profilePic;

        return $profile;
    }
}