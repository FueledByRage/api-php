<?php
require_once '../src/entities/post.php';
require_once '../src/DTOs/postDTO.php';


interface IPost{
    function save(Post $post, int $author_id);
    function getAll($author);
    function get($author, $id);
    function delete($id, $username);
}