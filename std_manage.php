<?php

include 'header.php';
include "connection_functions.php"; 


$userdata=new db_con(); 

$LoadAllStudent = $userdata->find('SELECT * FROM student');



   


?>
  
 
    
 
  <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Student Management</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active"><?php echo @$err;?></li>
                        </ol>
                        <div class="card mb-4">

                            <div class="card-body">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Student List
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                   <a class="btn btn-primary" href="std_reg.php">Register New</a>
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                            <th>Student ID</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Sex</th>
                                                <th>Date of Birth</th>
                                                 <th>Image</th>
                                                 
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Student ID</th>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Office</th>
                                                <th>Age</th>
                                                <th>Image</th>
                                                
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php   

                                            while ($row = mysqli_fetch_array($LoadAllStudent)) {

                                                echo '

                                                     <tr>
                                                <td><a href="index.php?qid='.$row['std_id'].' ">'.$row['std_id'].'</td>
                                                <td>'.$row['sname'].'</td>
                                                <td>'.$row['fname'].'</td>
                                                <td>'.$row['sex'].'</td>
                                               <td>'.$row['dob'].'</td>
                                               ';

                                               ?>
                                    <td><img   src="student_image/<?php echo $row['image'];?>" width="150" height="80" alt="not found"/> </td>
                                               <?php
                                               echo '
                                                 <td>61</td>
                                                <td><a href="std_edit.php?std_id='.$row['std_id'].' "><i class="glyphicon glyphicon-align-left" aria-hidden="true">Update</i></td>
                                                 <td><a href="std_delete.php?user_id='.$row['user_id'].' "><i class="glyphicon glyphicon-align-left" aria-hidden="true">Delete</i></td>
                                            </tr>

                                                '  ;
                                        ?>
                                           
                                            <?php   

                                          }

                                                
                                        ?>
                                        </tbody>
                                    </table>
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

           