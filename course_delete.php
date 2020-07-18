<?php 
include "connection_functions.php"; 


$userdata=new db_con(); 



$id=$_GET['sub_id'];
 
 $result = $userdata->execute("DELETE from subject where id = '$id'  "); 

 

header('location:course.php');

?>