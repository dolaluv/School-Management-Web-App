<?php

include 'header.php';
include "connection_functions.php"; 


$userdata=new db_con(); 

$LoadCourse = "";
$SujectName  = "";

if(isset($_POST['submit']))  
{
    $course_name = $_POST['course_name'];  
      
if (isset($_GET['course_id'])) {

$course_update_id = $_GET['course_id'];
$result = $userdata->execute(" UPDATE subject set subject_name = '$course_name' where id= '$course_update_id'  "); 

 $err="<font color='green'>Course Updated Sucessfully</font>";  
}
else{



 $result = $userdata->execute("INSERT INTO subject(subject_name)VALUES('$course_name')"); 

 if ($result) {
    $err="<font color='green'>Subject added Successfully</font>";  
 }
 else{
     $err="<font color='red'>Fail to add Subject</font>";  
 
 }
 
}
}
if (isset($_GET['course_id'])) {

 
$id = $_GET['course_id'];

$LoadCourse = mysqli_fetch_array($userdata->find("SELECT * FROM subject where id = '$id' "));


 $SujectName = $LoadCourse['subject_name'];
 

  }



?>
  
 
    
 
  <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard | Add Course</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active"><?php echo @$err;?></li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                 

<form method="post" >

              
         <div class="form-group" style="text-align:left">
            <label class="col-lg-3 col-md-5 control-label" style="color:#003300; font-size:15px">Course Name</label>
            <div class="col-lg-7 col-md-6">
<input  value="<?php echo  $SujectName ?>" name="course_name" class="form-control" style="font-weight:bold;" type="text" required>
            </div>
        </div><br><br>
     
<center>        
<button class="btn btn-primary  " style="text-align: center; " type="submit" name="submit"><b>Submit</b></button></center>
</form>
                            </div>
                        </div>
                        <div style="height: 100vh;"></div>
                        <div class="card mb-4"><div class="card-body">When scrolling, the navigation stays at the top of the page. This is the end of the static navigation demo.</div></div>
                    </div>
                </main>

             <?php 
             include 'footer.php';
             ?>

           