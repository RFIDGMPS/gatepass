
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
    <title>ADMIN</title>

        <style type="text/css">
 
    </style>
</head>

<body onload="startTime()">

        <nav class="navbar navbar-expand-lg navbar-light py-2" style="height: 1%;border-bottom: 1px solid #FBC257;margin-bottom: 5%;padding: 15px!important;">

        <div class="container">
               <a class="navbar-brand" href="index">
                <img src="assets/img/nav_brand/logo.png" alt="brand" style="height: 90px" id="imgs">
                <span></span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                   
                    </li>
                        <li class="nav-item" style="border: 1px solid #ffc107;;background-color:#ffc107;border-radius: 7% ;max-width: 100px!important;margin-right: 2%">
                     <a class="nav-link" href="attendance">&nbsp;&nbsp;&nbsp;&nbsp;<font color=" #FFF">VISITOR</font></a>

                    </li>
                      <li class="nav-item" style="border: 1px solid #ffc107;;background-color:#e35c30;border-radius: 7% ;max-width: 100px!important;">
                     <a class="nav-link" href="employee-login">&nbsp;&nbsp;&nbsp;&nbsp;<font color=" #FFF">REPORT</font></a>

                    </li>
    
                </ul>

            </div>
        </div>
    </nav>

    <!-- Section -->
    <section class="hero" style="margin-top: 0%">
        <div class="container">
                <center>
                    <div id="clockdate" style="border: 1px solid #f5af5b;background-color: #f5af5b">
                        <div class="clockdate-wrapper">
                            <div id="clock" style="font-weight: bold; color: #fff;font-size: 60px"></div>
                            <div id="date" style="color: #fff"><i class="fas fa-calendar"></i> June 27, 2024</div>
                        </div>
                    </div>
                </center><br><Br>
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                    <form id="rfidForm" method="POST">
                      <div class="card-body">
                         <p class="card-text">
                          <div id="mgs-add"></div>
                     
    <input type="text" id="rfidcard" name="rfid_number" class="form-control" placeholder="Scan RFID card" autofocus>
    <input type="submit" name="submit" value="Submit">
 


    
<?php
// Check if form is submitted
if(isset($_POST['submit'])) {
    // Retrieve RFID number from form
    $rfid_number = $_POST['rfid_number'];
    $time = date('H:i'); // Current time
    // Include database connection
    include 'connection.php';

    // Query to check if RFID number exists in users table
    $query = "SELECT * FROM users WHERE rfid_number = '$rfid_number'";
    $result = mysqli_query($db, $query);
    $user = mysqli_fetch_assoc($result);
    $id = $user['id'];
    // Check if RFID number exists
    if(mysqli_num_rows($result) > 0) {
        // RFID exists, fetch user data
        $query1 = "SELECT * FROM entrance WHERE rfid_number = '$rfid_number'";
         $result1 = mysqli_query($db, $query1);

         if(mysqli_num_rows($result1) > 0) {
            $user1 = mysqli_fetch_assoc($result1);
    $id1 = $user1['id'];
            if($user1['time_out_am'] == '') {
                $update_field = 'time_out_am';
            } elseif($user1['time_in_pm'] == '') {
                $update_field = 'time_in_pm';
            } elseif($user1['time_out_pm'] == '') {
                $update_field = 'time_out_pm';
            }
    
            // Build query based on available field to update
            if($update_field) {
                $insert_query = "UPDATE entrance SET $update_field = '$time' WHERE id = '$id1'";
                 // Execute query
            if(mysqli_query($db, $insert_query)) {
               echo "User information updated successfully.";
           } else {
               echo "Error updating record: " . mysqli_error($db);
           }
            } else {
                echo "All time slots are filled."; // Handle case where all slots are filled
            }
    
           
    
         } else {
         
            
            $full_name = $user['first_name'] . ' ' . $user['last_name'];
            $photo_name = $user['photo']; // Assuming 'photo' is the column storing photo file name
            $date_logged = date('Y-m-d'); // Current date as date_logged
            $role = $user['role'];
            $department = $user['department'];
            $status = $user['status'];
           
    
            // Determine appropriate time field to update
           
            $update_field = null;
           
    // Insert query for entrance table
    $insert_query = "INSERT INTO entrance (photo, role, full_name, rfid_number, time_in_am, date_logged, department, status) 
                    VALUES ('$photo_name', '$role', '$full_name', '$rfid_number', '$time', '$date_logged', '$department', '$status')";
     // Execute query
     if(mysqli_query($db, $insert_query)) {
       echo "User information updated successfully.";
   } else {
       echo "Error updating record: " . mysqli_error($db);
   }
        }


    } else {
        // RFID does not exist in the database
        echo "RFID number $rfid_number does not exist in the database.";
    }

    // Close database connection
    mysqli_close($db);
}
?>

<div id="rfidDisplay"></div>

                          <center><img class="w-100" height="170px" alt="img"  src="assets/img/section//istockphoto-1184670010-612x612.jpg" id="img"></center>
                    
                          <div class="card-body">
                             <p id="fname"></p>
                             <p id="lname"></p>
                          </div>
                        
                      </p>      
                      </div>
                              </form>
                            

                    </div>
                </div>
                <div class="col-md-8">
                    <div class="alert alert-warning" role="alert">
                        Just tap the rfid card on the RFID Reader for it to time in and time out.
                     </div>
                       <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th scope="col">Photo</th>
                          <th scope="col">Role</th>
                          <th scope="col">Full Name</th>
                          <th scope="col">Time In (AM)</th>
                          <th scope="col">Time Out (AM)</th>
                          <th scope="col">Time In (PM)</th>
                          <th scope="col">Time Out (PM)</th>
                          <th scope="col">Date logged</th>
                        </tr>
                      </thead>
                      <tbody>
                          	 

                      <?php include 'connection.php'; ?>
                                 <?php $results = mysqli_query($db, "SELECT * FROM entrance"); ?>
                                 <?php while ($row = mysqli_fetch_array($results)) { ?>
                        <tr>
                          <td><center><img src="admin/uploads/<?php echo $row['photo']; ?>" width="50px" height="50px" ></center></td>
                          <td><?php echo $row['role']; ?></td>
                          <td><?php echo $row['full_name']; ?></td>
                         <td><?php echo $row['time_in_am']; ?></td>
                          <td>
                          <?php echo $row['time_out_am']; ?></td>
                          <td><?php echo $row['time_in_pm']; ?></td>
                          <td>
                          <?php echo $row['time_out_pm']; ?></td>
                          <td><?php echo $row['date_logged']; ?></td>
                        </tr>
                        <?php }?>
                        
                                               </tbody>
                    </table>
                  </div>
              </div>
            </div>
        </div>
    </section>
  <!-- end Section -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
        <!-- <script src="assets/custom/js/scan_rfid.js"></script>-->
        <script src="script.js"></script>
   <!-- <script>
        AOS.init();
    </script>
    
 <script type="text/javascript">
    // Disable right-click
    document.addEventListener('contextmenu', (e) => e.preventDefault());

    function ctrlShiftKey(e, keyCode) {
      return e.ctrlKey && e.shiftKey && e.keyCode === keyCode.charCodeAt(0);
    }

    document.onkeydown = (e) => {
      // Disable F12, Ctrl + Shift + I, Ctrl + Shift + J, Ctrl + U
      if (
        event.keyCode === 123 ||
        ctrlShiftKey(e, 'I') ||
        ctrlShiftKey(e, 'J') ||
        ctrlShiftKey(e, 'C') ||
        (e.ctrlKey && e.keyCode === 'U'.charCodeAt(0))
      )
        return false;
    };
  </script>
  <script>
      $('body').keydown(function(e) {
        if(e.which==123){
            e.preventDefault();
        }
        if(e.ctrlKey && e.shiftKey && e.which == 73){
            e.preventDefault();
        }
        if(e.ctrlKey && e.shiftKey && e.which == 75){
            e.preventDefault();
        }
        if(e.ctrlKey && e.shiftKey && e.which == 67){
            e.preventDefault();
        }
        if(e.ctrlKey && e.shiftKey && e.which == 74){
            e.preventDefault();
        }
    });
!function() {
        function detectDevTool(allow) {
            if(isNaN(+allow)) allow = 100;
            var start = +new Date();
            debugger;
            var end = +new Date();
            if(isNaN(start) || isNaN(end) || end - start > allow) {
                console.log('DEVTOOLS detected '+allow);
            }
        }
        if(window.attachEvent) {
            if (document.readyState === "complete" || document.readyState === "interactive") {
                detectDevTool();
              window.attachEvent('onresize', detectDevTool);
              window.attachEvent('onmousemove', detectDevTool);
              window.attachEvent('onfocus', detectDevTool);
              window.attachEvent('onblur', detectDevTool);
            } else {
                setTimeout(argument.callee, 0);
            }
        } else {
            window.addEventListener('load', detectDevTool);
            window.addEventListener('resize', detectDevTool);
            window.addEventListener('mousemove', detectDevTool);
            window.addEventListener('focus', detectDevTool);
            window.addEventListener('blur', detectDevTool);
        }
    }();
  </script>-->

</body>

</html>