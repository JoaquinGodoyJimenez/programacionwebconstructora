<?php
require_once('config.php');
$l = DBDRIVER.':host='.DBHOST.';dbname='.DBNAME.';port='.DBPORT;
//$dbconn3 = pg_connect('host='.DBHOST.'port='.DBPORT.'dbname='.DBNAME.'user='.DBUSER. 'password='.DBPASS);
$db = new PDO($l, DBUSER, DBPASS);
$prep2 = $db -> prepare("select * from departamento");
$prep2 -> execute();
$result = $prep2 -> fetchAll(); 
print_r($result);
?>