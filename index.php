
<?php
include 'connection.php';
$logo1 = "";
    $name = "";
    $address = "";
    $logo2 = "";
// Fetch data from the about table
$sql = "SELECT * FROM about LIMIT 1";

$result = $db->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    $row = $result->fetch_assoc();
    $logo1 = $row['logo1'];
    $name = $row['name'];
    $address = $row['address'];
    $logo2 = $row['logo2'];
} 



// Get yesterday's date
$yesterday = date('Y-m-d', strtotime('-1 day'));

// Get current period
$current_period = date('A');

// Update status for missing time-ins and time-outs
$queries = [];

if ($current_period === 'PM') {
    // For the current period being PM
    $queries[] = "UPDATE personell_logs SET time_in_pm = 'No time in' WHERE time_in_pm IS NULL AND date_logged = '$yesterday'";
    $queries[] = "UPDATE personell_logs SET time_out_pm = 'No time out' WHERE time_out_pm IS NULL AND date_logged = '$yesterday'";
} else {
    // For the current period being AM
    $queries[] = "UPDATE personell_logs SET time_in_am = 'No time in' WHERE time_in_am IS NULL AND date_logged = '$yesterday'";
    $queries[] = "UPDATE personell_logs SET time_out_am = 'No time out' WHERE time_out_am IS NULL AND date_logged = '$yesterday'";
}

foreach ($queries as $query) {
    mysqli_query($db, $query);
}

mysqli_close($db);
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/grow_up.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="assets/img/brand/favicon-bar.svg" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="script.js"></script>
    <title>RFID GPMS</title>
    <style>
        .preview-1 {
            width: 140px!important;
            height: 130px!important;
            position: absolute;
            border: 1px solid gray;
            top: 15%;
            cursor: pointer; /* Add cursor pointer to indicate clickability */
        }
    </style>
        <style type="text/css">

.column {
    flex: 1;
    text-align: center;
}

.column.wide {
    flex: 2; /* Makes this column twice as wide as the others */
}

.column:first-child img,
.column:last-child img {
    max-width: 100%;
    height: auto;
}

.text {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 100%;
}

.text .row {
    line-height: 1.5;
    margin-bottom: 5px;
}

.detail {
    appearance: none;
	border: none;
	outline: none;
	border-bottom: .2em solid #FCCC73;
	background: white;
	border-radius: .2em .2em 0 0;
	padding: .4em;
	color: #ced4da;
    margin:13px 0px;
    height:70px;
}

    </style>
</head>

<body onload="startTime()">

<nav class="navbar navbar-expand-lg navbar-light py-2" style="height: 1%; border-bottom: 1px solid #FBC257; margin-bottom: 1%; padding: 0px 50px 0px 50px; display: flex; justify-content: center; align-items: center;">
    <div style="text-align: left; margin-right: 10px;">
        <img src="<?php echo 'admin/uploads/'.$logo1; ?>" alt="Image 1" style="height: 100px;">
    </div>
    <div class="column wide" style="flex-grow: 2; text-align: center;">
        <div class="text">
            <h1><div class="row"><b><?php echo $name; ?></b></div></h1>
            <h5><div><i><?php echo $address; ?></i></div></h5>
        </div>
    </div>
    <div style="text-align: right; margin-left: 10px;">
        <img src="<?php echo 'admin/uploads/'.$logo2; ?>" alt="Image 2" style="height: 100px;">
    </div>
</nav>







    
    <!-- Section -->
    <section class="hero" style="margin-top: 0%">
        <div class="container">
                <center>
                    <div id="clockdate" style="border: 1px solid #f5af5b;background-color: #f5af5b">
                        <div class="clockdate-wrapper" style="height:100px;">
                            <div id="clock" style="font-weight: bold; color: #fff;font-size: 50px"></div>
                            <div id="date" style="color: #fff"><i class="fas fa-calendar"></i><span id="currentDate"></span></div>
                        </div>
                    </div>
                </center><br><Br>
            <div class="row" style="margin-top:-35px;">
                <div class="col-md-3">
                    <div class="card">
                    <form id="rfidForm" method="POST">
                      <div class="card-body" style="padding-top:0;height:310px;">
                         <p class="card-text">
                          <div id="mgs-add"></div>
                     
    <input type="text" id="rfidcard" name="rfid_number" class="form-control" placeholder="Scan RFID card" autofocus>
    <input type="submit" name="submit" value="Submit" hidden>
 


    
    <?php
$rfid_number = '';
$time_in_out = 'TIME IN';

// Check if form is submitted
if (isset($_POST['submit'])) {
    $rfid_number = $_POST['rfid_number'];
    date_default_timezone_set('Asia/Manila');
    $time = date('H:i:s');
    $date_logged = date('Y-m-d');
    $current_period = date('A'); // Get AM/PM period

    include 'connection.php';

    // Check if RFID number exists in personell table
    $query = "SELECT * FROM personell WHERE rfid_number = '$rfid_number'";
    $result = mysqli_query($db, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        if ($user['status'] == 'Block') {
            echo "<script>alert('This Personnel is Blocked!'); window.location = 'index.php';</script>";
        } else {
            // Check if user is already logged today
            $query1 = "SELECT * FROM personell_logs WHERE rfid_number = '$rfid_number' AND date_logged = '$date_logged'";
            $result1 = mysqli_query($db, $query1);
            $user1 = mysqli_fetch_assoc($result1);

            if ($user1) {
                // Update existing log entry
                if (($current_period === "AM" && $user1['time_out_am'] === '') ||
                    ($current_period === "PM" && $user1['time_out_pm'] === '')) {
                    $update_field = $current_period === "AM" ? 'time_out_am' : 'time_out_pm';
                    $time_in_out = 'TIME OUT';

                    $update_query = "UPDATE personell_logs SET $update_field = '$time' WHERE id = '{$user1['id']}'";
                    mysqli_query($db, $update_query);
                } else {
                    echo "<script>alert('Please wait for the appropriate time period.'); </script>";
                }
            } else {
                // Insert new log entry
                $full_name = $user['first_name'] . ' ' . $user['last_name'];
                $photo_name = $user['photo'];
                $role = $user['role'];
                $department = $user['department'];
                $status = $user['status'];

                $time_field = $current_period === "AM" ? 'time_in_am' : 'time_in_pm';

                $insert_query = "INSERT INTO personell_logs (photo, role, full_name, rfid_number, $time_field, date_logged, department, status) 
                                 VALUES ('$photo_name', '$role', '$full_name', '$rfid_number', '$time', '$date_logged', '$department', '$status')";
                mysqli_query($db, $insert_query);
            }
        }
    } else {
        // Check if RFID number exists in visitor table
        $query = "SELECT * FROM visitor WHERE rfid_number = '$rfid_number'";
        $result = mysqli_query($db, $query);
        $visitor = mysqli_fetch_assoc($result);

        if ($visitor) {
            $query1 = "SELECT * FROM visitor_logs WHERE rfid_number = '$rfid_number' AND date_logged = '$date_logged'";
            $result1 = mysqli_query($db, $query1);
            $visitor1 = mysqli_fetch_assoc($result1);

            if ($visitor1) {
                if (($current_period === "AM" && $visitor1['time_out_am'] === '') ||
                    ($current_period === "PM" && $visitor1['time_out_pm'] === '')) {
                    $update_field = $current_period === "AM" ? 'time_out_am' : 'time_out_pm';
                    $time_in_out = 'TIME OUT';

                    $update_query = "UPDATE visitor_logs SET $update_field = '$time' WHERE id = '{$visitor1['id']}'";
                    mysqli_query($db, $update_query);
                } else {
                    echo "<script>alert('Please wait for the appropriate time period.'); window.location = 'index.php';</script>";
                }
            } else {
                echo '<script>$(document).ready(function() {
                    $("#visitorModal").modal("show");
                });</script>';
            }
        } else {
            $insert_query = "INSERT INTO personell_logs (role, rfid_number, time_in_$current_period, date_logged, photo) 
                             VALUES ('Stranger', '$rfid_number', '$time', '$date_logged', 'stranger.jpg')";
            mysqli_query($db, $insert_query);
        }
    }

    // Close database connection
    mysqli_close($db);
}
?>


<div id="rfidDisplay"></div>
<br/>
                          <center style="margin-top:-7px;"><img id="pic" height="220px" class="w-100 entrant" alt="img"  src="assets/img/section//istockphoto-1184670010-612x612.jpg" id="img"></center>
                          <script type="text/javascript">
         $(document).ready(function() {
         
    	$getphoto =  $('.pic').attr('src');
					$('.entrant').attr('src',$getphoto);
                    $getname =  $('.entrant_name').html();
                    $('.display_name').html($getname);  
                    $getrole =  $('.role').html();
                    $('.d_role').html($getrole);  
         });
		 
		 </script>
                          
                        
                      </p>      
                      </div>
                              </form>
                            

                    </div>
                </div>
                <div class="col-md-9">
          
                        
             
             
        <?php 
        include 'connection.php'; 

        // Combine and fetch data from both tables for the current date, ordering by the latest update
        $results = mysqli_query($db, "
        SELECT * FROM (
            SELECT id, department, photo, role, full_name, time_in_am, time_out_am, time_in_pm, time_out_pm 
            FROM personell_logs
            UNION ALL
            SELECT id, department, photo, role, name as full_name, time_in_am, time_out_am, time_in_pm, time_out_pm 
            FROM visitor_logs
        ) AS combined_results
        ORDER BY id DESC
        LIMIT 1
    ");
    if(isset($_POST['submit'])){

        // Fetch and display the results
        while ($row = mysqli_fetch_array($results)) { ?>
           <?php

if($time_in_out == 'TIME IN') {
    echo '<div class="alert alert-success" role="alert" id="alert">
                                 <center><h3 id="in_out">TIME IN</h3></center>
                         </div>';
        }else {
            echo '<div class="alert alert-danger" role="alert" id="alert">
                                <center> <h3 id="in_out">TIME OUT</h3></center>
                         </div>';
        }
                                 
                         
                         ?>
         <img class="pic" src="admin/uploads/<?php echo $row['photo']; ?>" width="50px" height="50px" hidden>
                
         <div class="row">
         <div class="col-md-12">
        <div class="detail entrant_name" style="margin-top:0px;margin-bottom:0px;"><h1 style="color:black;"><center><b id="entrant_name"><?php echo $row['full_name']; ?></b></center></h1></div>
        </div></div>
        <div class="row">
        <div class="col-md-6">
        <div class="detail deprt" ><h1 style="color:black;" id="department"><?php echo $row['department']; ?> </h1></div>
        <div class="detail role" ><h1 style="color:black;" id="role"><?php echo $row['role']; ?></h1> </div>
        </div>
        <div class="col-md-6">
        <div class="detail time_in" ><h1 style="color:black;" id="time_in"><?php echo $row['time_in_pm']; ?> </h1></div>
        <div class="detail time_out" ><h1 style="color:black;" id="time_out"><?php echo $row['time_out_pm']; ?> </h1></div>
        </div>
        </div>
        <script>
    // Array of elements with their initial texts
    const elements = [
        { el: document.getElementById('entrant_name'), text: 'Name' },
        { el: document.getElementById('department'), text: 'Department' },
        { el: document.getElementById('role'), text: 'Role' },
        { el: document.getElementById('time_in'), text: 'Time in' },
        { el: document.getElementById('time_out'), text: 'Time out' },
        { el: document.getElementById('in_out'), text: 'Tap Your Card' }
    ];

    // After 3 seconds, fade and revert back to initial values
    setTimeout(() => {
        elements.forEach(item => item.el.style.opacity = '0'); // Start fading

        setTimeout(() => {
            elements.forEach(item => {
                item.el.textContent = item.text; // Restore initial text
                item.el.style.opacity = '1'; // Restore opacity
            });

            // Update the alert class
            const alertDiv = document.getElementById('alert');
            if (alertDiv) {
                alertDiv.classList.remove('alert-success', 'alert-danger');
                alertDiv.classList.add('alert-primary');
            }

            // Change background color of all .detail divs to white
            document.querySelectorAll('.detail').forEach(div => {
                div.style.backgroundColor = 'white';
                div.style.color = '#ced4da';
            });

            // Change the source of the image
            document.getElementById('pic').src = "assets/img/section/istockphoto-1184670010-612x612.jpg";

        }, 500); // Wait for fade-out to complete before changing text
    }, 3000);
</script>

        <?php }
        }
        else {
        ?>
        <div class="alert alert-primary" role="alert" id="alert">
                                <center> <h3 id="in_out">Tap Your Card</h3></center>
                         </div>
 <img class="pic" src="assets/img/section//istockphoto-1184670010-612x612.jpg" width="50px" height="50px" hidden>
                
         <div class="row">
         <div class="col-md-12">
        <div class="detail entrant_name" style="margin-top:0px;margin-bottom:0px;"><h1><center><b id="entrant_name" style="opacity:1;">Name</b></center></h1></div>
        </div></div>
        <div class="row">
        <div class="col-md-6">
        <div class="detail deprt" ><h1 id="department">Department</h1></div>
        <div class="detail role" ><h1 id="role">Role</h1> </div>
        </div>
        <div class="col-md-6">
        <div class="detail time_in" ><h1 id="time_in">Time in</h1></div>
        <div class="detail time_out" ><h1 id="time_out">Time out</h1></div>
        </div>
        </div>
        <?php
        }
         ?>
       
                 
              </div>
            </div>
        </div>
        <a href="#" class="btn btn-lg btn-warning btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
         
    </section>



 <!-- Modal -->
 <form role="form" method="post" action="admin/transac.php?action=add_visitor_log" enctype="multipart/form-data">
               <div class="modal fade" id="visitorModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLabel">
                              <i class="bi bi-plus-circle"></i> Visitor E-Logbook
                           </h5>
                           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="col-lg-11 mb-2 mt-1" id="mgs-emp" style="margin-left: 4%"></div>
                        <div class="modal-body">
                           <div class="row justify-content-md-center">
                              <div id="msg-emp" style=""></div>
                              <div class="col-sm-12 col-md-12 col-lg-10">
                                 <div class="" style="border: 1PX solid #b3f0fc;padding: 1%;background-color: #f7cfa1;color: black;font-size: 1.2rem">PERSONAL INFORMATION</div>
                                 <?php 
        include 'connection.php'; 

        // Combine and fetch data from both tables for the current date, ordering by the latest update
        $results = mysqli_query($db, "SELECT * FROM visitor WHERE rfid_number = '$rfid_number'"); 
     
        // Fetch and display the results
        while ($row = mysqli_fetch_array($results)) { ?>
                                 <div class="row">
                                    <div class="col-lg-3 col-md-6 col-sm-12" id="up_img">
                                    <div class="file-uploader">
                                         
                                          <img id="captured" class="preview-1" src="assets/img/pngtree-vector-add-user-icon-png-image_780447.jpg" style="width: 140px!important;height: 130px!important;position: absolute;border: 1px solid gray;top: 15%" title="Upload Photo.." />
                                          
                                       </div>

                                       <input type="hidden" id="capturedImage" name="capturedImage">
                                    </div>
        
                                    <div class="col-lg-4 col-md-6 col-sm-12" id="lnamez">
                                       <div class="form-group">
                                          <label>VISITOR CODE:</label>
                                          <input readonly value="<?php echo $row['v_code']; ?>" required type="text" class="form-control" name="v_code" id="v_code" autocomplete="off">
                                          <span class="id-error"></span>
                                       </div>
                                    </div>
                                    <div class="col-lg-5 col-md-6 col-sm-12">
                                       <div class="form-group">
                                          <label>RFID NUMBER:</label>
                                          <input readonly value="<?php echo $row['rfid_number']; ?>" required type="text" class="form-control" name="rfid_number" id="rfid_number" minlength="10" maxlength="10" autocomplete="off">
                                          <span class="rfidno-error"></span>
                                       </div>
                                    </div>
                                 </div>
                                 <?php }?>
                                 <div class="row mb-3">
                                    <div class="col-lg-3 col-md-6 col-sm-12" id="up_img">
                                      
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12" id="lnamez">
                                    <div class="form-group">
                                          <label>NAME:</label>
                                          <input required type="text" class="form-control" name="fullName" id="fullName" autocomplete="off">
                                       </div>
                                    </div>
                                    <div class="col-lg-5 col-md-6 col-sm-12">
                                    <div class="form-group">
                                          <label>SEX:</label>
                                          <select readonly required class="form-control dept_ID" name="sex" id="sex_id" autocomplete="off">
                                             <option value="">&larr; Select Section &rarr;</option>
                                             <option value="Male">Male</option>
                                             <option value="Female">Female</option>
                                          </select>
                                          <span class="sex-error"></span>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row mb-2">
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="form-group">
                                          <label>CIVIL STATUS:</label>
                                          <select readonly required class="form-control dept_ID" name="stat" id="stat_id" autocomplete="off">
                                             <option value="">&larr; Select Status &rarr;</option>
                                             <option value="Single">Single</option>
                                             <option value="Married">Married</option>
                                             <option value="Widowed">Widowed</option>
                                          </select>
                                          <span class="stat-error"></span>
                                       </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="form-group">
                                          <label>DEPARTMENT:</label>
                                          <select readonly required class="form-control dept_ID" name="department" id="dept_id" autocomplete="off">
										  <option value="">&larr; Select Department &rarr;</option>
<?php
										  $sql = "SELECT * FROM department";
$result = $db->query($sql);

// Initialize an array to store department options
$department_options = [];

// Fetch and store department options
while ($row = $result->fetch_assoc()) {
    $department_id = $row['department_id'];
    $department_name = $row['department_name'];
    $department_options[] = "<option value='$department_id'>$department_name</option>";
}?>
                          <?php
    // Output department options
    foreach ($department_options as $option) {
        echo $option;
    }
    ?>            

                                          </select>
                                          <span class="dprt-error"></span>
                                       </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="form-group">
                                          <label>CONTACT NUMBER:</label>
                                          <input required type="text" class="form-control" name="contact_number" id="contact_number" minlength="11" maxlength="11" autocomplete="off">
                                       </div>
                                    </div>
                                 </div>
                                
                                 <div class="row">
                                    <div class="col-lg-12 col-md-6 col-sm-12">
                                       <div class="form-group">
                                          <label>ADDRESS:</label>
                                          <input required type="text" class="form-control" name="address" id="complete_address" autocomplete="off">
                                          <span class="ca-error"></span>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-lg-12 col-md-6 col-sm-12">
                                       <div class="form-group">
                                          <label>PURPOSE OF VISIT:</label>
                                          <textarea style="height:100px;" required type="text" class="form-control" name="purpose" id="purpose" autocomplete="off"></textarea>
                                          <span class="ca-error"></span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
                           <button type="submit" id="btn-emp" class="btn btn-outline-warning">Save</button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>


            <div class="modal fade" id="cameraModal" tabindex="-1" role="dialog" aria-labelledby="cameraModalLabel" aria-hidden="true">
                                                   <div class="modal-dialog" role="document">
                                                      <div class="modal-content">
                                                         <div class="modal-header">
                                                            <h5 class="modal-title" id="cameraModalLabel">Capture Photo</h5>
                                                            
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                  
                                                               </button>
                                                         </div>
                                                          <div class="modal-body" id="my_camera">
                  .
                                                               </div>
                                                            <div class="modal-footer">
                                                           
                                                                 <button onclick="saveSnap()" type="button" class="btn btn-primary" id="captureButton">Capture</button>
                                                           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                  </div>
                                                                        </div>
                                                    </div>
                                    </div>

                                    <div id="results" style="visibility:hidden;position:absolute;"></div>
                                     
                                     <script>
            $(document).ready(function() {
            $('.preview-1').click(function() {
                // Show the modal
                $('#cameraModal').modal('show');

            });

           
        });

       
    </script>
                                    <script type="text/javascript" src="admin/assets/webcam.min.js"></script>
<script>

$(document).ready(function() {
            // Initialize Webcam.js
            Webcam.set({
width:460,
height:400,
image_format: 'jpeg',
jpeg_quality: 90
});
Webcam.attach('#my_camera');
            });
       

   

function saveSnap(){

Webcam.snap(function(data_uri){

   $('.preview-1').attr('src', data_uri); // Update preview image src
   document.getElementById('capturedImage').value = data_uri;
   $('#cameraModal').modal('hide');
   
});

}


</script>


  <!-- end Section -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
     
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
       <script type="text/javascript">
            function readURL(input) {
            	if (input.files && input.files[0]) {
            		var reader = new FileReader();
            		reader.onload = function(e) {
            			var num = $(input).attr('class').split('-')[2];
            			$('.file-uploader .preview-' + num).attr('src', e.target.result);
            		}
            		reader.readAsDataURL(input.files[0]);
            	}
            }
            $("[class^=upload-field-]").change(function() {
            	readURL(this);
            });
         </script>
         
</body>

</html>