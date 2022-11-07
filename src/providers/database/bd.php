<?php

class DatabaseProvider{

    function getConnection(){
        try{
            return new PDO('mysql:host=localhost;dbname=PHPCLIPS', 'root', 'clipsproject');
        }catch(Exception $e){
            return null;
        }
    }
}
