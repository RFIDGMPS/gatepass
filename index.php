
<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="utf-8">
      <title>Administrator</title>
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <meta content="" name="keywords">
      <meta content="" name="description">
      <!-- Favicon -->
      <!--     <link href="img/favicon.ico" rel="icon"> -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
      <link href="admin/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
      <link href="admin/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
      <link href="admin/css/bootstrap.min.css" rel="stylesheet">
      <link href="admin/css/style.css" rel="stylesheet">
      <link href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css" rel="stylesheet" />
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
      <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
      <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
      <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
      <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
      <!--   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/elevatezoom/2.2.3/jquery.elevatezoom.js" integrity="sha512-EjW7LChk2bIML+/kvj1NDrPSKHqfQ+zxJGBUKcopijd85cGwAX8ojz+781Rc0e7huwyI3j5Bn6rkctL3Gy61qw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <style type="text/css">
         @media (max-width: 576px) and (max-width: 768px) {
         #lnamez {
         margin-top: 30%;
         display: block;
         /* remove extra space below image */
         }
         #up_img {
         position: relative;
         margin-top: 4%;
         display: block;
         /* remove extra space below image */
         }
         }
         @media (max-width: 992px) and (max-width: 1200px) {
         #lnamez {
         margin-top: 30%;
         display: block;
         /* remove extra space below image */
         }
         #up_img {
         position: relative;
         margin-top: 4%;
         display: block;
         /* remove extra space below image */
         }
         }
      </style>
      
   </head>
<?php
// Start the session
//session_start();

?>
<?php
include 'connection.php';

header('Content-Type: application/json'); // Ensure the response is in JSON format

$location = "";
$password = "";
$error_message = ''; // Initialize an error message variable

if (isset($_POST['submit'])) {
    $location = htmlspecialchars($_POST['location'], ENT_QUOTES, 'UTF-8');
    $password1 = htmlspecialchars($_POST['Ppassword'], ENT_QUOTES, 'UTF-8');
    $Prfid_number = htmlspecialchars($_POST['Prfid_number'], ENT_QUOTES, 'UTF-8');
    
    // Escape special characters for database use
    $password1 = mysqli_real_escape_string($db, stripslashes($password1));
    
    // Check if user is a security personnel at the gate
    $sql1 = "SELECT * FROM personell WHERE rfid_number = '$Prfid_number'";
    $result1 = $db->query($sql1);
    
    if ($result1 && $result1->num_rows > 0 && $location === "Gate") {
        $personell = $result1->fetch_assoc();
        
        // Validate password
        if ($password1 === "gate123") {
            if ($personell['role'] === 'Security Personnel' && $personell['status'] === 'Active') {
                // Successful login
                $_SESSION['location'] = 'Main Gate';
                $_SESSION['department'] = 'main';
                echo json_encode(['success' => true]);
                exit();
            } else {
                $error_message = "You're not allowed to open the Main Gate.";
            }
        } else {
            $error_message = "Incorrect Password.";
        }
    } else {
        $error_message = "RFID number not found.";
    }
    
    // If not security personnel, check for room login
    $sql2 = "SELECT * FROM rooms WHERE room = '$location'";
    $result2 = $db->query($sql2);

    if ($result2 && $result2->num_rows > 0) {
        $room = $result2->fetch_assoc();
        $sql3 = "SELECT * FROM personell WHERE rfid_number = '$Prfid_number' AND department = '{$room['department']}' AND role = 'Instructor'";
        $result3 = $db->query($sql3);

        if ($result3 && $result3->num_rows > 0) {
            $instructor = $result3->fetch_assoc();
            // Verify password and ensure the department matches
            if(password_verify($password1, $room['password'])){
                if ($instructor['department'] == $room['department'] && $instructor['status'] == 'Active') {
                    // Successful login
                    $_SESSION['location'] = $room['room'];
                    $_SESSION['department'] = $room['department'];
                    $_SESSION['descr'] = $room['descr'];
                    echo json_encode(['success' => true]);
                    exit();
                } else {
                    $error_message = "You're not allowed to open this room.";
                }
            } else {
                $error_message = "Incorrect Password.";
            }
        } else {
            $error_message = "RFID number not found.";
        }
    }

    // Return error message if any
    echo json_encode(['success' => false, 'message' => $error_message]);
    exit();
}
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


        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                    <form role="form" id="logform" method="POST">
    <div id="myalert3" style="display:none;">
        <div class="alert alert-danger">
            <span id="alerttext"></span>
        </div>
    </div>

    <div class="d-flex align-items-center justify-content-between mb-3">
        <a href="index.html" class="">
            <h3 class="text-warning">GPMS</h3>
        </a>
        <h3>Sign In</h3>
    </div>
    
    <select class="form-control mb-4" name="location" id="location" autocomplete="off">
        <option value='Gate'>Gate</option>
        <?php
        $sql = "SELECT * FROM rooms";
        $result = $db->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo "<option value='{$row['room']}'>{$row['room']}</option>";
        }
        ?>
    </select>
    
    <div class="form-floating mb-4">
        <input id="remember" type="password" class="form-control" name="Ppassword" placeholder="Password" autocomplete="off">
        <label for="floatingPassword">Password</label>
    </div>

    <div class="d-flex align-items-center justify-content-between mb-4">
        <div class="form-check">
            <input type="checkbox" id="remember" onclick="myFunction()" class="form-check-input">
            <label class="form-check-label" for="exampleCheck1">Show Password</label>
        </div>
    </div>
    
    <input style="border-color:#084298" type="text" name="Prfid_number" class="form-control" placeholder="Tap RFID card" autofocus>
    <input hidden id="submit" type="submit" name="submit" value="Submit"/>
</form>

<script>
    document.getElementById('logform').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent default form submission

        var formData = new FormData(this); // Get form data

        fetch('index.php', { // Change 'login.php' to your actual PHP file
            method: 'POST',
            body: formData
        })
        .then(response => response.json()) // Expect JSON response
        .then(data => {
            if (data.success) {
                window.location.href = "main.php"; // Redirect to main page on success
            } else {
                // Display error message
                document.getElementById('alerttext').innerText = data.message;
                document.getElementById('myalert3').style.display = "block";

                // Fade out after 3 seconds
                setTimeout(function() {
                    var alertDiv = document.getElementById("myalert3");
                    alertDiv.style.transition = "opacity 1s";
                    alertDiv.style.opacity = 0;
                    setTimeout(function() {
                        alertDiv.style.display = "none";
                    }, 1000);
                }, 3000);
            }
        })
        .catch(error => console.error('Error:', error));
    });
</script>

                    </div>
                </div>
            </div>
        </div>
      
    </div>
    <script>
        function myFunction() {
            var x = document.getElementById("remember");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
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
  </script>
     <script type="text/javascript" src="assets/custom/js/admin_login.js"> </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="admin/lib/chart/chart.min.js"></script>
    <script src="admin/lib/easing/easing.min.js"></script>
    <script src="admin/lib/waypoints/waypoints.min.js"></script>
    <script src="admin/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="admin/lib/tempusdominus/js/moment.min.js"></script>
    <script src="admin/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="admin/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="admin/js/main.js"></script>
</body>

</html>