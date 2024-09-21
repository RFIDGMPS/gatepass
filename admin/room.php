

<!DOCTYPE html>

<?php
include 'auth.php'; // Include session validation
?>


<html lang="en">
<?php

include 'header.php';
   ?>

<body>
    <div class="container-fluid position-relative bg-white d-flex p-0">
        <!-- Spinner Start 
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
      Spinner End -->
        <!-- Sidebar Start -->
        <?php
		include 'sidebar.php';
		?>
        <!-- Sidebar End -->

        <!-- Content Start -->
        <div class="content">
        <?php
		include 'navbar.php';
		?>


            <div class="container-fluid pt-4 px-4">
                <div class="col-sm-12 col-xl-12">

                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-light rounded h-100 p-4">
                            <div class="row">
                                <div class="col-9">
                                    <h6 class="mb-4">Manage Rooms</h6>
                                </div>
                                <div class="col-3">
                                    <button type="button" class="btn btn-outline-warning m-2" data-bs-toggle="modal" data-bs-target="#roomModal">Add Room</button>
                                </div>
                            </div>
                            <hr></hr>
                            <div class="table-responsive">
                                <table class="table table-border" id="myDataTable">
                                    <thead>
                                        <tr>
                                            <th scope="col" >Department</th>
                                            <th scope="col">Room</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Password</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php include '../connection.php';  
 
                                            ?>





                                 <?php $results = mysqli_query($db, "SELECT * FROM rooms"); ?>
                                 <?php while ($row = mysqli_fetch_array($results)) { ?>
                                    <tr  class="table-<?php echo $row['id'];?>">
                                    <td class="department"><?php echo $row['department']; ?></td>
                                            <td><?php echo $row['room']; ?></td>
                                            <td><?php echo $row['description']; ?></td>
                                            <td><?php echo $row['password']; ?></td>
                                            <td width="14%">
                                            <center>
                                          <button descr="<?php echo $row['description'];?>" pass="<?php echo $row['password'];?>" room="<?php echo $row['room'];?>" department="<?php echo $row['department'];?>" data-id="<?php echo $row['id'];?>" class="btn btn-outline-primary btn-sm btn-edit e_room_id" >
                                          <i class="bi bi-plus-edit"></i> Edit </button>
                                          <button descr="<?php echo $row['description'];?>" pass="<?php echo $row['password'];?>" room="<?php echo $row['room'];?>" department="<?php echo $row['department'];?>"  data-id="<?php echo $row['id']; ?>" class="btn btn-outline-danger btn-sm btn-del d_room_id">
                                          <i class="bi bi-plus-trash"></i> Delete </button>
                                       </center> </td>
                                        </tr>
                                       
                                   
                                 <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="roomModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-plus-circle"></i> New Room</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST" action="transac.php?action=add_room">
                            <div class="modal-body">
                                <div class="col-lg-12 mt-1" id="mgs-dept"></div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="inputTime"><b>Department: </b></label>
                                        <select  class="form-control" name="department" id="department" autocomplete="off">
              
				
<?php
										  $sql = "SELECT * FROM department";
$result = $db->query($sql);

// Initialize an array to store department options
$department_options = [];

// Fetch and store department options
while ($row = $result->fetch_assoc()) {
    $department_id = $row['department_id'];
    $department_name = $row['department_name'];
    $department_options[] = "<option value='$department_name'>$department_name</option>";
}?>
                          <?php
    // Output department options
    foreach ($department_options as $option) {
        echo $option;
       
    }
    ?>            
               </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-1">
                                    <div class="form-group">
                                        <label for="inputTime"><b>Room:</b></label>
                                        <input name="room" type="text" id="room" class="form-control" autocomplete="off">
                                        <span class="deptname-error"></span>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-1">
                                    <div class="form-group">
                                        <label for="inputTime"><b>Description:</b></label>
                                        <input name="descr" type="text" id="desc" class="form-control" autocomplete="off">
                                        <span class="deptname-error"></span>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-1">
                                    <div class="form-group">
                                        <label for="inputTime"><b>Password:</b></label>
                                        <input name="password" type="text" id="password" class="form-control" autocomplete="off">
                                        <span class="deptname-error"></span>
                                    </div>
                                </div>
                                

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-outline-warning" id="btn-department">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
         $(document).ready(function() {
         	$("#myDataTable").DataTable();
			 $('.d_room_id').click(function(){
                $('#deldepartment-modal').modal('show');
						
               		$id = $(this).attr('data-id');
                       $dptname =  $(this).attr('room');
       
       $('.d-dpt').val($dptname);
               		$('.remove_id').click(function(){
               			window.location = 'del.php?type=room&id=' + $id;
						 
               		});
               	});
               	$('.e_room_id').click(function(){
               		$id = $(this).attr('data-id');
                       $('#editdepartment-modal').modal('show');
               		// $('#editModal').load('edit.php?id=' + $id);
                      
                       $dptname =  $(this).attr('room');
                       $dptdesc =  $(this).attr('department');
                       $password =  $(this).attr('password');
                       $desc =  $(this).attr('descr');

					$('.edit-name').val($dptname);
					$('.edit-desc').val($dptdesc);
                    $('.edit-pass').val($password);
                    $('.edit-desc').val($desc);
					$('.edit-form').attr('action','edit1.php?id='+$id+'&edit=room');
                 
					
               	});
         });
		 
		 </script>


            <div class="modal fade" id="editdepartment-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"><i class="bi bi-pencil"></i> Edit Room</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST"  class="edit-form" role="form" action="">
                            <div class="modal-body">
                                <div class="col-lg-12 mt-1" id="mgs-editdept"></div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="inputTime"><b>Department: </b></label>
                                        <select  class="form-control edit-desc" name="department" id="department" autocomplete="off">
                  
				
<?php
										  $sql = "SELECT * FROM department";
$result = $db->query($sql);

// Initialize an array to store department options
$department_options = [];

// Fetch and store department options
while ($row = $result->fetch_assoc()) {
    $department_id = $row['department_id'];
    $department_name = $row['department_name'];
    $department_options[] = "<option value='$department_name'>$department_name</option>";
}?>
                          <?php
    // Output department options
    foreach ($department_options as $option) {
        echo $option;
       
    }
    ?>            
               </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-1">
                                    <div class="form-group">
                                        <label for="inputTime"><b>Room:</b></label>
                                        <input name="room" type="text" id="edit_departmentname" class="form-control edit-name" autocomplete="off">
                                        <span class="deptname-error"></span>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-1">
                                    <div class="form-group">
                                        <label for="inputTime"><b>Description:</b></label>
                                        <input name="descr" type="text" id="edit_departmentname" class="form-control edit-desc" autocomplete="off">
                                        <span class="deptname-error"></span>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-1">
                                    <div class="form-group">
                                        <label for="inputTime"><b>Password:</b></label>
                                        <input name="password" type="text" id="edit_departmentname" class="form-control edit-pass" autocomplete="off">
                                        <span class="deptname-error"></span>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="" id="edit_departmentid">
                                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-outline-primary" id="btn-editdepartment">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="deldepartment-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"><i class="bi bi-trash"></i> Delete Department</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST">
                            <div class="modal-body">
                                <div class="col-lg-12 mt-1" id="mgs-deldept"></div>
                                <div class="col-lg-12 mb-1">
                                    <div class="form-group">
                                        <label for="inputTime"><b>Department Name:</b></label>
                                        <input  type="text" id="delete_departmentname" class="form-control d-dpt" autocomplete="off" readonly="">
                                        <span class="deptname-error"></span>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="" id="delete_departmentid">
                                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">No</button>
                                <button type="button" class="btn btn-outline-primary remove_id" id="btn-deldepartment">Yes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <?php
include 'footer.php';
			?>

          
        </div>

        <a href="#" class="btn btn-lg btn-warning btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Template Javascript -->
    <script src="js/main.js"></script>

</body>

</html>