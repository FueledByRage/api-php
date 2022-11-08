<?php


require_once '../src/entities/post.php';


interface IPost{
    function save(Post $post, $author_id);
    function getAll($author);
    function get($author, $id);
    function delete($id, $username);
}