<?php

include 'header.php';
include "connection_functions.php"; 


$userdata=new db_con(); 

$LoadAllSubject = $userdata->find('SELECT * FROM subject order by subject_name');



   


?>
  
 
    
 
  <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Course Module</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active"><?php echo @$err;?></li>
                        </ol>
                        <div class="card mb-4">

                            <div class="card-body">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                           List of All Courses
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                 <a class="btn btn-primary" href="course_add.php">Add Course</a>
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                             <th>S/N</th>
                                          <th>Subjects</th>
                                               
                                                
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                 <th>S/N</th>
                                                <th>Subjects</th>
                                               
                                                 
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php   
                                            $k = 1;
                                            while ($row = mysqli_fetch_array($LoadAllSubject)) {

                                                echo '

                                                     <tr>
                                             <td>'.$k.'</td>
                                                <td>'.$row['subject_name'].'</td>
                                               
                                                <td><a href="course_add.php?course_id='.$row['id'].' "><i class="glyphicon glyphicon-align-left" aria-hidden="true">Update</i></td>
                                                 <td><a href="course_delete.php?sub_id='.$row['id'].' "><i class="glyphicon glyphicon-align-left" aria-hidden="true">Delete</i></td>
                                            </tr>

                                                '  ;
                                        ?>
                                           
                                            <?php   
                                                $k++;
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

           