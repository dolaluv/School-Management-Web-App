<?php

include 'header.php';
include "connection_functions.php"; 


$userdata=new db_con(); 

if(isset($_POST['submit']))  
{
    $std = $_POST['std_id'];  
     $sname = $_POST['sname'];
    $fname = $_POST['fname'];
    $dob = $_POST['dob'];  
   $sex = $_POST['sex'];

    $imageName=$std.$_FILES['img']['name'];

 $path_to_file = "student_image/".$std.$_FILES['img']['name'];
  
    $MyImageName = $_POST['MyImageName']; // delete this picture
//if (file_exists($_FILES['img']['name'])) {
if ($_FILES['img']['size'] == 0 || $_FILES['img']['name'] == "" )
{
    // cover_image is empty (and not an error)
 $result = $userdata->execute("UPDATE student set sname ='$sname',fname ='$fname',dob ='$dob',sex ='$sex' where std_id = '$std'  "); 
     
  }
  else
  {

     unlink("student_image/".$MyImageName);

  move_uploaded_file($_FILES['img']['tmp_name'], $path_to_file);
   $result = $userdata->execute("UPDATE student set sname ='$sname', image = '$imageName',fname ='$fname',dob ='$dob',sex ='$sex'  where std_id = '$std'  "); 
    
  }



 if ($result) {
    $err="<font color='green'>Record Updated </font>";  
 }
 else{
     $err="<font color='red'>Fail to Update Student Record</font>";  
 
 }
  // $result = $crud->execute("INSERT INTO student(std_id,sname,fname,lname,dob,sex,class,state,lga,addr,dept,pat,addr2,grp,image,code)VALUES('$std','$sname','$fname','$lname','$dob','$sex','$class','$state','$lga','$addr','$dept','$pat','$addr2','$grp','$imageName','$code')");

}

if (isset($_GET['std_id'])) {

 
$std = $_GET['std_id'];

$LoadStudentDetails = mysqli_fetch_array($userdata->find("SELECT * FROM student where std_id = '$std' "));


  }

?>
  
 
    
 
  <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Edit Details</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active"><?php echo @$err;?></li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                 

<form method="post" enctype="multipart/form-data">

                             <div class="form-group" style="text-align:left">
            <label class="col-lg-3 col-md-5 control-label" style="color:#003300; font-size:15px">Student ID:</label>
  
<input  name="std_id" class="form-control" style="font-weight:bold;" type="text" value='<?php echo  $LoadStudentDetails['std_id'];  ?>' readonly="true">
            </div>
        </div>
         <div class="form-group" style="text-align:left">
            <label class="col-lg-3 col-md-5 control-label" style="color:#003300; font-size:15px">Surname:</label>
            <div class="col-lg-7 col-md-6">
<input  value='<?php echo  $LoadStudentDetails['sname'];  ?>' name="sname" class="form-control" style="font-weight:bold;" type="text" required>
            </div>
        </div>
          <div class="form-group" style="text-align:left">
            <label class="col-lg-3 col-md-5 control-label" style="color:#003300; font-size:15px">FirstName:</label>
            <div class="col-lg-7 col-md-6">
<input value='<?php echo  $LoadStudentDetails['fname'];  ?>'   name="fname" class="form-control" style="font-weight:bold;" type="text" required>
            </div>
        </div>

        <div class="form-group" style="text-align:left">
      <label class="col-lg-3 col-md-5 control-label" style="color:#003300; font-size:15px" >Date of Birth:</label>
      <div class="col-lg-7 col-md-6">
        <input value='<?php echo  $LoadStudentDetails['dob'];  ?>'  name="dob" class="form-control"  style="font-weight:bold;" type="date" required>
      </div>
    </div>
    <div class="form-group" style="text-align:left">
      <label class="col-lg-3 col-md-5 control-label" style="color:#003300; font-size:15px">sex:</label>
      <div class="col-lg-7 col-md-6">
        <select name="sex" class="form-control" style="font-weight:bold; " required>
      <?php 
      if ($LoadStudentDetails['sex'] == "Male") {
          echo '<option value="Male" selected="selected">Male</option>
          <option value="Female" >FEMALE</option>
          ';
        } 
        else{
          echo ' <option value="Female" selected="selected">Female</option> 
             <option value="Male" >Male</option>
          ';
        }  


       ?>
   
     
 

      </select>
      </div>
    </div>
    <div class="form-group" style="text-align:left">
            <label class="col-lg-3 col-md-5 control-label" style="color:#003300; font-size:15px">Image:</label>
             <img   src="student_image/<?php echo $LoadStudentDetails['image'];?>" width="150" height="80" alt="not found"/> 
             <input type="hidden" name="MyImageName" value="<?php echo $LoadStudentDetails['image'];?>">
            <div class="col-lg-7 col-md-6">
                <input name="img" class="form-control" style="font-weight:bold;" type="file">
            </div>
        </div><br><br>
<center>        
<button class="btn btn-primary  " style="text-align: center; " type="submit" name="submit"><b>Update</b></button></center>
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

           