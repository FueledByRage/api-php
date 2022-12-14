<?php
require_once '../src/repositories/IUserRepository.php';
require_once '../src/entities/user.php';


class UserMYSQL implements iUser{

    function __construct(
        private ?PDO $connection
    ){}

    function save(User $user){
        $sql = 'INSERT INTO User (username, email, pass, about, profileURL) VALUES (:username, :email, :pass, :about, :profileURL);';
        $query = $this->connection->prepare($sql);

        $query->bindValue(":username", $user->getUsername());
        $query->bindValue(":email", $user->getEmail());
        $query->bindValue(":pass", $user->getPassword());
        $query->bindValue(":about", $user->getAbout());
        $query->bindValue(":profileURL", $user->getProfileURL());

        //if($query->rowCount == 0 ) throw new Exception('Error saving user');

        return $query->execute();
    }
    function get(string $username) {
        if(!$this->connection) return throw new Exception('Error connecting to database');
        $sql = 'SELECT * FROM User WHERE username = :username';
        $data = $this->connection->prepare($sql);
        $data->bindValue(":username", $username);
        $data->execute();
        //if($data->rowCount() == 0) throw new Exception('Error getting user');
        return $data->fetch();
    }
    function getByEmail(string $email) {
        if(!$this->connection) return throw new Exception('Error connecting to database');
        $sql = 'SELECT * FROM User WHERE email = :email';
        $data = $this->connection->prepare($sql);
        $data->bindValue(":email", $email);
        $data->execute();
        //if($data->rowCount() == 0) throw new Exception('Error getting user');
        return $data->fetch();
    }
}