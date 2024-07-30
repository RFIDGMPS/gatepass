<!DOCTYPE html>




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
                                    <h6 class="mb-4">Manage Role</h6>
                                </div>
                                <div class="col-3">
                                    <button type="button" class="btn btn-outline-warning m-2" data-bs-toggle="modal" data-bs-target="#roleModal">Add Role</button>
                                </div>
                            </div>
                            <hr></hr>
                            <div class="table-responsive">
                                <table class="table table-border" id="myDataTable">
                                    <thead>
                                        <tr>
                                            <th scope="col" >ID</th>
                                            <th scope="col">Role</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php include '../connection.php'; ?>
                                 <?php $results = mysqli_query($db, "SELECT * FROM role"); ?>
                                 <?php while ($row = mysqli_fetch_array($results)) { ?>
                                    <tr  class="table-<?php echo $row['id'];?>">
                                            <td><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['role']; ?></td>
                                            <td width="14%">
                                            <center>
                                          <button role="<?php echo $row['role'];?>" data-id="<?php echo $row['id'];?>" class="btn btn-outline-primary btn-sm btn-edit e_role_id" >
                                          <i class="bi bi-plus-edit"></i> Edit </button>
                                          <button role="<?php echo $row['role'];?>"  data-id="<?php echo $row['id']; ?>" class="btn btn-outline-danger btn-sm btn-del d_role_id">
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
            <div class="modal fade" id="roleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-plus-circle"></i> New Role</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST" action="transac.php?action=add_role">
                            <div class="modal-body">
                                <div class="col-lg-12 mt-1" id="mgs-dept"></div>
                                <div class="col-lg-12 mb-1">
                                    <div class="form-group">
                                        <label for="inputTime"><b>Role:</b></label>
                                        <input name="role1" type="text" id="role" class="form-control" autocomplete="off">
                                        <span class="deptname-error"></span>
                                    </div>
                                </div>
                              

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-outline-warning" id="btn-role">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
         $(document).ready(function() {
         	$("#myDataTable").DataTable();
			 $('.d_role_id').click(function(){
                $('#delrole-modal').modal('show');
						
               		$id = $(this).attr('data-id');
                       $role =  $(this).attr('role');
       
       $('.d-role').val($role);
               		$('.remove_id').click(function(){
               			window.location = 'del.php?type=role&id=' + $id;
						 
               		});
               	});
               	$('.e_role_id').click(function(){
               		$id = $(this).attr('data-id');
                       $('#editrole-modal').modal('show');
               		// $('#editModal').load('edit.php?id=' + $id);
                      
                       $role =  $(this).attr('role');
                      
       


				
					$('.edit-role').val($role);
					$('.edit-form').attr('action','edit1.php?id='+$id+'&edit=role');
					
               	});
         });
		 
		 </script>

            
            <div class="modal fade" id="editrole-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"><i class="bi bi-pencil"></i> Edit Role</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST"  class="edit-form" role="form" action="">
                            <div class="modal-body">
                                <div class="col-lg-12 mt-1" id="mgs-editdept"></div>
                                <div class="col-lg-12 mb-1">
                                    <div class="form-group">
                                        <label for="inputTime"><b>Enter Role:</b></label>
                                        <input name="role" type="text" id="edit_role" class="form-control edit-role" autocomplete="off">
                                        <span class="deptname-error"></span>
                                    </div>
                                </div>
                               

                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="" id="edit_roleid">
                                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-outline-primary" id="btn-editrole">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="delrole-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"><i class="bi bi-trash"></i> Delete Role</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST">
                            <div class="modal-body">
                                <div class="col-lg-12 mt-1" id="mgs-deldept"></div>
                                <div class="col-lg-12 mb-1">
                                    <div class="form-group">
                                        <label for="inputTime"><b>Role:</b></label>
                                        <input  type="text" id="delete_role" class="form-control d-role" autocomplete="off" readonly="">
                                        <span class="deptname-error"></span>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="" id="delete_roleid">
                                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">No</button>
                                <button type="button" class="btn btn-outline-primary remove_id" id="btn-delrole">Yes</button>
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