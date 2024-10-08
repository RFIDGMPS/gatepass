<?php
session_start();
include 'connection.php';

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32)); // Secure token generation
}
// Function to sanitize input data
function sanitizeInput($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $department = sanitizeInput($_POST['roomdpt']);
    $location = sanitizeInput($_POST['location']);
    $password = sanitizeInput($_POST['Ppassword']);
    $rfid_number = sanitizeInput($_POST['Prfid_number']);

    // Validate inputs (simple example, you can expand this)
    if (empty($department) || empty($location) || empty($password) || empty($rfid_number)) {
        echo "All fields are required.";
        exit;
    }

    // Assuming you have a login function that handles authentication
    // Use prepared statements for the database query
    $stmt = $db->prepare("SELECT * FROM users WHERE department = ? AND location = ? AND password = ? AND rfid_number = ?");
    $stmt->bind_param("ssss", $department, $location, password_hash($password, PASSWORD_DEFAULT), $rfid_number); // Use password_hash() for security
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Successful login
        $_SESSION['user'] = $department; // Save user data in session
        header("Location: main.php");
        exit;
    } else {
        echo "Invalid credentials.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Administrator</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <!-- Other meta tags and links here -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" rel="stylesheet">
    <!-- Other styles and scripts -->
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
                                <input id="remember" type="password" class="form-control" name="Ppassword" placeholder="Password" autocomplete="off">
                                <label for="floatingPassword">Password</label>
                            </div>

                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div class="form-check">
                                    <input type="checkbox" id="showPassword" onclick="togglePasswordVisibility()" class="form-check-input">
                                    <label class="form-check-label" for="showPassword">Show Password</label>
                                </div>
                            </div>
                            <input style="border-color:#084298" type="text" name="Prfid_number" class="form-control" placeholder="Tap RFID card" autofocus>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        <script>
                            $(document).ready(function () {
                                $('#logform').on('submit', function (event) {
                                    event.preventDefault();

                                    // Gather form data
                                    var formData = $(this).serialize();

                                    // Send form data via AJAX
                                    $.ajax({
                                        url: 'login.php',
                                        type: 'POST',
                                        data: formData,
                                        success: function (response) {
                                            if (response.trim() === 'success') {
                                                window.location.href = "main.php";
                                            } else {
                                                $('#alerttext').html(response);
                                                document.getElementById("myalert3").style.display = "block";
                                                setTimeout(function () {
                                                    $("#myalert3").fadeOut("slow");
                                                }, 3000);
                                            }
                                        },
                                        error: function () {
                                            $('#alerttext').html("Error in form submission.");
                                            document.getElementById("myalert3").style.display = "block";
                                        }
                                    });
                                });
                            });

                            function togglePasswordVisibility() {
                                var passwordField = document.getElementById("remember");
                                if (passwordField.type === "password") {
                                    passwordField.type = "text";
                                } else {
                                    passwordField.type = "password";
                                }
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>


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