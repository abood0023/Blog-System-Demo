<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/models/Post.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/User.php';
class DBConnection
{
    private static $conn;

    public static function connect(){
        $servername = "localhost";
        $username = "root";
        $password = "1234";
        $db_name="blog_system";

        // Create connection
        self::$conn = mysqli_connect($servername, $username, $password, $db_name);
    }

    public static function close_connection(){
        mysqli_close(self::$conn);
    }

    public static function get_all_posts(){
        $query = "SELECT * FROM `post`";
        $result = mysqli_query(self::$conn, $query);
        $posts = array();
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                array_push($posts, new Post($row['Id'], $row['UID'], $row['Title'], $row['Body']));
            }
        }
        return $posts;
    }

    public static function get_post($id){
        $query = "SELECT * FROM `post` WHERE Id = $id";
        $result = mysqli_query(self::$conn, $query);
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                return new Post($row['Id'], $row['UID'], $row['Title'], $row['Body']);
            }
        }
    }


}



