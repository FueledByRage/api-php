<?php
    require_once './src/entities/user.php';

interface iUser{
    public function save(User $user);
    public function get(string $username);
    public function getByEmail(string $email);
}