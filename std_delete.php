<?php 
include "connection_functions.php"; 


$userdata=new db_con(); 



$id=$_GET['user_id'];
 
 $result = $userdata->execute("DELETE from student where user_id = '$id'  "); 

 

header('location:std_manage.php');

?>