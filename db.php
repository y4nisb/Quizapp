<?php
$db_server = "localhost";
$db_user = "root"; 
$db_password = "";
$db_name = "Quiz";
$db_conn = "";    

try{
 $db_conn = mysqli_connect($db_server, $db_user, $db_password, $db_name);
}catch(mysqli_sql_exception){
 echo "Verbindung fehlgeschlagen" . "<br>";
 
}


/*
if($db_conn){
   echo "Verbindung erfolgreich" . "<br>";
}
*/
?>