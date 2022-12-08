<?php
require_once '../src/repositories/IPostRepository.php';
require_once '../src/entities/post.php';
require_once '../src/DTOs/postDTO.php';



class PostMysql implements IPost{

    function __construct(
        private ?PDO $connection,
    ){}

    function save(Post $post, int $author_id){
        if(!$this->connection) return throw new Exception('Error connecting to database');
        $sql = 'INSERT INTO Post (author_id, author, title,  body, createdAt, videoUrl) VALUES (:author_id, :author, :title, :body, :date, :videoUrl);';
        $query = $this->connection->prepare($sql);
        $query->bindValue(":author_id", $author_id);
        $query->bindValue(":title", $post->getTitle());
        $query->bindValue(":author", $post->getAuthor());
        $query->bindValue(":body", $post->getBody());
        $query->bindValue(":date", $post->getCreated_date());
        $query->bindValue(":videoUrl", $post->getVideoUrl());
        $query->execute();
        
        if($query->rowCount() == 0) throw new Exception('Error saving post');
    }

    function get($author, $id){
        if(!$this->connection) return throw new Exception('Error connecting to database');
        $sql = 'SELECT * FROM POST WHERE author = :author AND _id == :id';
        $data = $this->connection->prepare($sql);
        $data->bindValue(":author", $author);
        $data->bindValue(":id", $id);
        $data->execute();
        if($data->rowCount() == 0){
            throw new Exception("Posts not found for this user.", 404);
        }
        return $data->fetchAll();
    }


    function getAll($author){
        if(!$this->connection) return throw new Exception('Error connecting to database');
        $sql = 'SELECT * FROM Post WHERE author = :author';
        $data = $this->connection->prepare($sql);
        $data->bindValue(":author", $author);
        $data->execute();
        /*if($data->rowCount() == 0){
            throw new Exception("Posts not found for this user.", 404);
        }*/
        return $data->fetchAll();
    }

    function delete($id, $username){
        if(!$this->connection) return throw new Exception('Error connecting to database');
        $sql = 'DELETE FROM Post Where id = :id AND author = :author';
        $executeDelete = $this->connection->prepare($sql);
        $executeDelete->bindValue(":id", $id);
        $executeDelete->bindValue(":author", $username);
        $stmn = $executeDelete->execute(); 
        if($executeDelete->rowCount() > 0){
            return true;
        }

        throw new Exception('Error deleting post', 500);
    }
}