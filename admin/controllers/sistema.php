<?php
require_once('config.php');
class Sistema{
    var $db = null;
    public function db(){
        $l = DBDRIVER.':host='.DBHOST.';dbname='.DBNAME.';port='.DBPORT;
        $this ->db = new PDO($l, DBUSER, DBPASS);
    }
}
?>