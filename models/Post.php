<?php

class Post{
    public $id;
    public $uid;
    public $title;
    public $body;

    public function __construct(){
        $argv = func_get_args();
        switch( func_num_args() ) {
            case 0:
                self::__construct1();
                break;
            case 4:
                self::__construct2($argv[0], $argv[1], $argv[2], $argv[3]);
        }
    }

    public function __construct1(){
        $this->id = '';
        $this->uid = '';
        $this->title = '';
        $this->body = '';
    }

    public function __construct2($id, $uid, $title, $body){
        $this->id = $id;
        $this->uid = $uid;
        $this->title = $title;
        $this->body = $body;
    }
}
?>