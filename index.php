<?php

$title = 'Blog system';
require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/DBConnection.php';

echo "
<div class='content container'>
    <div class='row'>";
DBConnection::connect();
$allPosts = DBConnection::get_all_posts();
foreach ($allPosts as $post){
    $pos=strpos($post->body, ' ', 50);
    echo "<div class='card-ma col-sm-6'>
            <div class='card'>
                <div class='card-body'>
                    <h5 class='card-title'>$post->title</h5>
                    <p class='card-text'>". substr($post->body,0,$pos ) . (strlen($post->body)>50?"...":"") ."</p>
                    <a href='show_post.php?id=$post->id' class='btn btn-primary'>More</a>
                </div>
            </div>
        </div>";
}
        echo "
    </div>
</div>
";
require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';
DBConnection::close_connection();
?>