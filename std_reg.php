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
  //$Media_Name = $_FILES['mySlider']['name'];

  move_uploaded_file($_FILES['img']['tmp_name'], $path_to_file);
     

 $result = $userdata->execute("INSERT INTO student(std_id,sname,image,dob,sex,fname)VALUES('$std','$sname','$imageName','$dob','$sex','$fname')"); 



 if ($result) {
    $err="<font color='green'>Student added Successfully</font>";  
 }
 else{
     $err="<font color='red'>Fail to add Student</font>";  
 
 }
  // $result = $crud->execute("INSERT INTO student(std_id,sname,fname,lname,dob,sex,class,state,lga,addr,dept,pat,addr2,grp,image,code)VALUES('$std','$sname','$fname','$lname','$dob','$sex','$class','$state','$lga','$addr','$dept','$pat','$addr2','$grp','$imageName','$code')");

}

?>
  
 
    
 
  <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Student Registration</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active"><?php echo @$err;?></li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                 

<form method="post" enctype="multipart/form-data">

                             <div class="form-group" style="text-align:left">
            <label class="col-lg-3 col-md-5 control-label" style="color:#003300; font-size:15px">Student ID:</label>
            <div class="col-lg-7 col-md-6">
<?php 


$row = mysqli_fetch_array($userdata->find('SELECT count(std_id) FROM student'));
 $year= substr(date('Y'), 2); 
$cod= $year."001" + $row[0];
$std= "EDUNET_STD".$cod; 



?>
<input  name="std_id" class="form-control" style="font-weight:bold;" type="text" value='<?php echo $std;  ?>' readonly="true">
            </div>
        </div>
         <div class="form-group" style="text-align:left">
            <label class="col-lg-3 col-md-5 control-label" style="color:#003300; font-size:15px">Surname:</label>
            <div class="col-lg-7 col-md-6">
<input id="money2" name="sname" class="form-control" style="font-weight:bold;" type="text" required>
            </div>
        </div>
             <div class="form-group" style="text-align:left">
            <label class="col-lg-3 col-md-5 control-label" style="color:#003300; font-size:15px">FirstName:</label>
            <div class="col-lg-7 col-md-6">
<input id="money2" name="fname" class="form-control" style="font-weight:bold;" type="text" required>
            </div>
        </div>

        <div class="form-group" style="text-align:left">
      <label class="col-lg-3 col-md-5 control-label" style="color:#003300; font-size:15px" >Date of Birth:</label>
      <div class="col-lg-7 col-md-6">
        <input  name="dob" class="form-control"  style="font-weight:bold;" type="date" required>
      </div>
    </div>
    <div class="form-group" style="text-align:left">
      <label class="col-lg-3 col-md-5 control-label" style="color:#003300; font-size:15px">sex:</label>
      <div class="col-lg-7 col-md-6">
        <select name="sex" class="form-control" style="font-weight:bold; " required>
       
<option value="Male" selected="selected">Male</option>
<option value="Female">FEMALE</option> 
 

      </select>
      </div>
    </div>

    <div class="form-group" style="text-align:left">
            <label class="col-lg-3 col-md-5 control-label" style="color:#003300; font-size:15px">Image:</label>
            <div class="col-lg-7 col-md-6">
                <input name="img" class="form-control" style="font-weight:bold;" type="file" required>
            </div>
        </div><br><br>
<center>        
<button class="btn btn-primary  " style="text-align: center; " type="submit" name="submit"><b>Register</b></button></center>
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

           