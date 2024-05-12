<?php

$dns="mysql:host=localhost; dbname=my first sql";
$username="root";
$pass="";

try{
$connect = new PDO ($dns,$username,$pass);
}
catch(PDOException $s){
echo "failed to connect" . $s->getMessage();
}


?>