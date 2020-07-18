<?php

include 'header.php';
include "connection_functions.php"; 


$userdata=new db_con(); 

$LoadAllSubject = $userdata->find('SELECT * FROM subject order by subject_name');



   


?>
  
 
    
 
  <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Register Student for a Course</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active"><?php echo @$err;?></li>
                        </ol>
                        <div class="card mb-4">

                            <div class="card-body">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                             Student Course Registeration
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                <form method="post">
                                <input type="text" name="std" placeholder="enter student id">
                                 <button class="btn btn-primary" type="submit" name="search">Register Student</button></form>
                                <?php
                                if (isset($_POST['search'])) {
     
    $std_id = $_POST['std'];
$std = mysqli_fetch_array($userdata->find("SELECT * FROM student where std_id = '$std_id' "));
  if ($std) {
     
  ?>
  <form method="POST">

    <div  style="margin-left:15px;">
<span><div class="lwidth">Student ID</div></span><label class="form-control" style="width:400px"><?php echo $std['std_id']; ?></label></div>

<input type="hidden" name="std" value="<?php echo $std['std_id'];  ?>">

<div   style="margin-left:15px;"><span  ><div class="lwidth">Name</div></span><label class="form-control" style="width:400px"><?php echo $std['sname'].", ".$std['fname']; ?></label></div>

 

<table class="table table-responsive table-striped table-condensed"><thead>
        <tr><th>Sn</th>
         
        <th>Subjects</th>
        
    </tr></thead><tbody>
                                
      <?php
       $LoadStudent = $userdata->find('SELECT * FROM subject ');
        $k = 1;
while ($AllSubject = mysqli_fetch_array($LoadStudent)) {
     
$register_check=mysqli_fetch_array($userdata->find("SELECT * FROM reg_sub where sub_id ='$AllSubject[subject_name]' AND std_id ='$std[std_id]'  "));

    echo " 
                    <tr>
                    <td>$k</td>
                    <td>$AllSubject[subject_name]</td>";
                    if ($register_check['sub_id'] == $AllSubject['subject_name']) {
                        echo "
                    <td><input name='update_course[]' value='$AllSubject[subject_name]' class='checkbox-inline' 
                    type='checkbox' checked ></td>
                    
                    ";

                    }
                    else{
                        echo "
                    <td><input name='update_course[]' value='$AllSubject[subject_name]' class='checkbox-inline' 
                    type='checkbox'></td>
                    
                    ";
                    }
                    
                    echo "
        <input name='sub[]' value='$AllSubject[subject_name]' type='hidden'>
                </tr>";

    //echo "<center>".$sec['product_name']."<br>";
    $k++;

}
?>
</tbody></table><hr style="border:2px solid black">
 
    <button  class="btn btn-primary pull-right" type="submit" name="Add"><b>Add Subject</b></button></form>

<?php

}
}
if(isset($_POST['Add']))
 {
   
$std =$_POST['std']; 
$remove_course = "";

if (empty($_POST['update_course'])) {
 
}
else
{
  $remove_course=array_diff($_POST['sub'],$_POST['update_course']);
  
   // check if course registerd
for($i=0; $i < count($_POST['update_course']); $i++){
$update_course= $_POST['update_course'][$i];

$checkexist=mysqli_fetch_array($userdata->find("SELECT * FROM reg_sub where sub_id ='$update_course' AND std_id ='$std' ")); 
if ($checkexist) {
}
else{
     
     $result = $userdata->execute("INSERT INTO reg_sub(std_id,sub_id) VALUES('$std','$update_course')");
}
}  
}


if (empty($_POST['update_course'])) {

 for($i=0; $i < count($_POST['sub']); $i++){
$course_remove= $_POST['sub'][$i];
 $result = $userdata->execute(" DELETE from reg_sub where sub_id = '$course_remove' AND std_id ='$std'   ");


}
}
else if (!empty($remove_course) ) {

//for($i=0; $i < count($remove_course); $i++){
//$course_remove= $remove_course[$i];
 //$result = $userdata->execute(" DELETE from reg_sub where sub_id = '$course_remove' AND std_id ='$std'   ");


//}
}




}
     ?>
<!--
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                          <th>Subjects</th>
                                                <th>Update</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Subjects</th>
                                                <th>Update</th>
                                                <th>Delete</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php   

                                            while ($row = mysqli_fetch_array($LoadAllSubject)) {

                                                echo '

                                                     <tr>
                                                <td>'.$row['subject_name'].'</td>
                                               
                                                <td><a href="course_add.php?course_id='.$row['id'].' "><i class="glyphicon glyphicon-align-left" aria-hidden="true">Update</i></td>
                                                 <td><a href="course_delete.php?sub_id='.$row['id'].' "><i class="glyphicon glyphicon-align-left" aria-hidden="true">Delete</i></td>
                                            </tr>

                                                '  ;
                                        ?>
                                           
                                            <?php   

                                          }

                                                
                                        ?>
                                        </tbody>
                                    </table>  -->
                                </div>
                            </div>
                        </div>
                            </div>
                        </div>
                        <div style="height: 100vh;"></div>
                        <div class="card mb-4"><div class="card-body">When scrolling, the navigation stays at the top of the page. This is the end of the static navigation demo.</div></div>
                    </div>
                </main>

             <?php 
             include 'footer.php';
             ?>

           