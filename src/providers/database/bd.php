<?php

class DatabaseProvider{

    function getConnection(){
        try{            
            return new PDO('mysql:host=localhost;dbname=PHPCLIPS', 'root', 'clipsproject');
        }catch(Exception $e){
            http_response_code(500);
            echo json_encode(['error' => 'An internal error has occurried']);
            die();
        }
    }
}
