<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/DBConnection.php';
DBConnection::connect();
$current_post = DBConnection::get_post($_GET['id']);
//$current_post = DBConnection::get_post(8);
$title = $current_post->title;
require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';

function calculate_word_number($post){
    //calculate number of each word in post
    $temp = str_replace(".","",$post->body);
    $temp = str_replace(",","",$temp);
    $temp = str_replace(":","",$temp);
    $words = explode(" ", $temp);
    $words_number = array();
    foreach ($words as $word){
        if (array_key_exists($word, $words_number)){
            $words_number[$word] += 1;
        } else {
            $words_number[$word] = 1;
        }
    }
//    uasort($words_number, function($a,$b){
//        return $a <= $b;
//    });
//    echo "From cal <br>";
//    foreach ($words_number as $key => $word){
//        echo $key . " => " . $word . "<br>";
//    }
    return $words_number;
}

function calculate_phrases_number($post){
    //calculate number of each phase in post
    $phases = explode(".", $post->body);
    $phases_number = array();
    foreach ($phases as $phase){
        if (array_key_exists($phase, $phases_number)){
            $phases_number[$phase] += 1;
        } else {
            $phases_number[$phase] = 1;
        }
    }
    return $phases_number;
}
function get_sugustion_post($current_post){
    $posts = DBConnection::get_all_posts();
    $sugustion_posts = array();
    $current_post_words = calculate_word_number($current_post);
    $current_post_phases = calculate_phrases_number($current_post);
    foreach ($posts as $post){
        if($post->id != $current_post->id){
            $temp = calculate_word_number($post);
            foreach ($temp as $word => $value){
                if(array_key_exists($word, $current_post_words)){
                    if(array_key_exists( $post->id, $sugustion_posts)){
                        $sugustion_posts[$post->id] += 1;
                    }else{
                        $sugustion_posts[$post->id] = 1;
                    }
                }
            }
            $temp = calculate_phrases_number($post);
            foreach ($temp as $phase => $value){
                if(array_key_exists($phase, $current_post_phases)){
                    if(array_key_exists( $post->id, $sugustion_posts)){
                        $sugustion_posts[$post->id] += 1;
                    }else{
                        $sugustion_posts[$post->id] = 1;
                    }
                }
            }
        }
    }
    uasort($sugustion_posts, function($a,$b){
        return $a <= $b;
    });
    return $sugustion_posts;
}
echo "
    <div class='content container'>
        <h1>$current_post->title</h1>
        <div>
            <p>$current_post->body</p>
        </div>
        
        <div>
            <h3 class='sugustion'>Sugustion psot</h3>
        ";

        $temp = get_sugustion_post($current_post);
        echo "<div class='sugustion-posts'>";
        foreach ($temp as $post_id => $value){
            $post = DBConnection::get_post($post_id);
            $pos=strpos($post->body, ' ', 50);

            echo "
                <div class=''>
                    <div class='card-custem card'>
                        <div class='card-body'>
                            <h5 class='card-title'>$post->title</h5>
                            <p class='card-text'>". substr($post->body,0,$pos ) . (strlen($post->body)>50?"...":"") . "</p>
                            <a href='show_post.php?id=$post->id' class='btn btn-primary'>More</a>
                        </div>
                    </div>
                </div>
            ";
        }
        echo "</div>";

    echo "</div>
    </div>
";

require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';
DBConnection::close_connection();
?>
