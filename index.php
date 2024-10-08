<?php
session_start();
include 'connection.php';

// Set session cookies to secure options
ini_set('session.cookie_httponly', 1); // Prevent JavaScript access to session cookie
ini_set('session.cookie_secure', 1);   // Use only over HTTPS
ini_set('session.use_only_cookies', 1); // Use only cookies for session

// Function to sanitize input
function sanitizeInput($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Check if user is already logged in
if (isset($_SESSION['user_id'])) {
    header('Location: main.php'); // Redirect to main page if already logged in
    exit();
}

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
    <!-- <link href="img/favicon.ico" rel="icon"> -->
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/elevatezoom/2.2.3/jquery.elevatezoom.js" integrity="sha512-EjW7LChk2bIML+/kvj1NDrPSKHqfQ+zxJGBUKcopijd85cGwAX8ojz+781Rc0e7huwyI3j5Bn6rkctL3Gy61qw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style type="text/css">
        /* Responsive styles */
        @media (max-width: 576px), (max-width: 768px) {
            #lnamez {
                margin-top: 30%;
                display: block;
            }
            #up_img {
                position: relative;
                margin-top: 4%;
                display: block;
            }
        }
        @media (max-width: 992px), (max-width: 1200px) {
            #lnamez {
                margin-top: 30%;
                display: block;
            }
            #up_img {
                position: relative;
                margin-top: 4%;
                display: block;
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid position-relative bg-white d-flex p-0">
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
                            <div>
                                <select class="form-control mb-4" name="roomdpt" id="roomdpt" autocomplete="off" onchange="fetchRooms()">
                                    <option value="Main" selected>Main</option>
                                    <?php
                                    $sql = "SELECT * FROM department";
                                    $result = $db->query($sql);
                                    while ($row = $result->fetch_assoc()) {
                                        $department_name = $row['department_name'];
                                        if ($department_name !== 'Main') {
                                            echo "<option value='$department_name'>$department_name</option>";
                                        }
                                    }
                                    ?>
                                </select>

                                <select class="form-control mb-4" name="location" id="location" autocomplete="off">
                                    <option value="Gate" selected>Gate</option>
                                </select>

                                <script>
                                    function fetchRooms() {
                                        var selectedDepartment = document.getElementById('roomdpt').value;
                                        if (selectedDepartment === "Main") {
                                            document.getElementById('location').innerHTML = "<option value='Gate' selected>Gate</option>";
                                        } else if (selectedDepartment) {
                                            var xhr = new XMLHttpRequest();
                                            xhr.onreadystatechange = function () {
                                                if (xhr.readyState === 4 && xhr.status === 200) {
                                                    document.getElementById('location').innerHTML = xhr.responseText;
                                                }
                                            };
                                            xhr.open('GET', 'get_rooms.php?department=' + encodeURIComponent(selectedDepartment), true);
                                            xhr.send();
                                        } else {
                                            document.getElementById('location').innerHTML = "<option value=''>Select Room</option>";
                                        }
                                    }
                                </script>
                            </div>

                            <div class="form-floating mb-4">
                                <input id="password" type="password" class="form-control" name="Ppassword" placeholder="Password" autocomplete="off" required>
                                <label for="floatingPassword">Password</label>
                            </div>

                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div class="form-check">
                                    <input type="checkbox" id="show-password" onclick="togglePassword()" class="form-check-input">
                                    <label class="form-check-label" for="show-password">Show Password</label>
                                </div>
                            </div>
                            <input style="border-color:#084298" type="text" name="Prfid_number" class="form-control" placeholder="Tap RFID card" autofocus required>
                            <button type="submit">Submit</button>
                        </form>

                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        <script>
                            $(document).ready(function(){
                                $('#logform').on('submit', function(event){
                                    event.preventDefault();  // Prevent form from reloading the page
                                    var formData = $(this).serialize();  // Gather form data

                                    // Send form data via AJAX
                                    $.ajax({
                                        url: 'login.php',  // PHP file to handle the form submission
                                        type: 'POST',
                                        data: formData,
                                        success: function(response) {
                                            if (response.trim() === 'success') {
                                                window.location.href = "main.php"; // Redirect to main page
                                            } else {
                                                $('#alerttext').html(response);  // Set the response message
                                                document.getElementById("myalert3").style.display = "block";  // Show alert
                                                setTimeout(function() {
                                                    $("#myalert3").fadeOut("slow"); // Fade out alert after 3 seconds
                                                }, 3000);
                                            }
                                        }
                                    });
                                });
                            });

                            function togglePassword() {
                                var passwordInput = document.getElementById("password");
                                passwordInput.type = passwordInput.type === "password" ? "text" : "password";
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="admin/js/bootstrap.bundle.min.js"></script>
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