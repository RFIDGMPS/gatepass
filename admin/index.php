<!DOCTYPE html>
<html lang="en">

<?php
include 'header.php';
   ?>
<?php
include '../connection.php';
$username = "";
    $password = "";
// Fetch data from the about table
$sql = "SELECT * FROM user LIMIT 1";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    $row = $result->fetch_assoc();
    $username = $row['username'];
    $password = $row['password'];
} 



if(isset($_POST['login'])){
    if($_POST['username'] == $username && $_POST['password'] == $password){
        echo '<script type="text/javascript">
			window.location = "dashboard.php";
		</script>';
    }
    else {
        echo '<script type="text/javascript">
        alert("Invalid username and password.");
    </script>';
    }

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
                            <div class="">
                                <center><span id="myalert2"></span></center>
                            </div>
                            <div id="myalert" style="display:none;">

                                <div class="">
                                   <center><span id="alerttext"></span></center>
                                </div>


                            </div>
                            <div id="myalert3" style="display:none;">
                                <div class="">
                                    <div class="alert alert-success" id="alerttext3">

                                    </div>

                                </div>
                            </div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="index.html" class="">
                                <h3 class="text-warning">ADMIN</h3>
                            </a>
                            <h3>Sign In</h3>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="username" id="username" placeholder="Username" autocomplete="off">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="form-check">
                                <input type="checkbox" id="remember" onclick="myFunction()"  class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Show Password</label>
                            </div>
                        </div>
                        <button type="submit" name="login" id="login-button" class="btn btn-warning py-3 w-100 mb-4">Sign In</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign In End -->
    </div>
    <script>
        function myFunction() {
            var x = document.getElementById("password");
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
     <script type="text/javascript" src="../assets/custom/js/admin_login.js"> </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>