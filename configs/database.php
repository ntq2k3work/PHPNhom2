<?php
class database{
    public $host = "localhost";
    public $user = "root";
    public $password = "";
    public $db = "clockweb";
    public function setDatabase($host="",$user="",$password="",$db=""){
        $this -> host = $host;
        $this -> user = $user;
        $this -> $password = $password;
        $this -> db = $db;
    }   
}