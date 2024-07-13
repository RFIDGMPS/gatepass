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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <link href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>

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

    <script type="text/javascript">
        $(document).ready(function() {
            $("#myDataTable").DataTable();
        });
    </script>
</head>

<body>
    <div class="container-fluid position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->
        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3" style="background-color: #fcaf42">
            <nav class="navbar  navbar-light">
                <a href="dashboard" class="navbar-brand mx-4 mb-3">
                    <h3 class="text" style="color: #f0ddcc">RFID Attendance</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/2601828.png" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">admin@gmail.com</h6>
                        <span>Administrator</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="dashboard.php" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>

                   <a href="department.php" class="nav-item nav-link"><i class="fa fa-city me-2"></i>Department</a>
                   <a href="sections.php" class="nav-item nav-link"><i class="fa fa-puzzle-piece me-2"></i>Sections</a>
                    <a href="users.php" class="nav-item nav-link"><i class="fa fa-users me-2"></i>Users</a>
                   
                    <a href="entrance.php" class="nav-item nav-link"><i class="fa fa-address-card me-2"></i>Entrance</a>
                    <a href="messages.php" class="nav-item nav-link"><i class="fa fa-envelope me-2"></i>Messages</a>
                    <a href="report.php" class="nav-item nav-link active"><i class="fa fa-print me-2"></i>Report</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->

        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand  navbar-light sticky-top px-4 py-0" style="background-color: #fcaf42">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-warning mb-0"></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>

                <div class="navbar-nav align-items-center ms-auto">
                    <!--      <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-envelope me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Message</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                       
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all message</a>
                        </div>
                    </div> -->
                    <!--  <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Notification</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                 
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Password changed</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all notifications</a>
                        </div>
                    </div> -->
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/2601828.png" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">admin@gmail.com</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="logout" class="dropdown-item" style="border: 1px solid #b0a8a7"><i class="bi bi-arrow-right-circle"></i> Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->


            <div class="container-fluid pt-4 px-4">
                <div class="col-sm-12 col-xl-12">

                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-light rounded h-100 p-4">
                            <div class="row">
                                <div class="col-9">
                                    <h6 class="mb-4">Manage Report</h6>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-3">

                                    <label>Date:</label>
                                    <input type="text" class="form-control" placeholder="Start" id="date1" autocomplete="off" />
                                </div>
                                <div class="col-lg-3">
                                    <label>To</label>
                                    <input type="text" class="form-control" placeholder="End" id="date2" autocomplete="off" />
                                </div>

                                <div class="col-lg-3 mt-4">
                                    <label></label>
                                    <button type="button" class="btn btn-primary" id="btn_search"><i class="fa fa-search"></i></button> <button type="button" id="reset" class="btn btn-warning"><i class="fa fa-sync"></i></button>

                                </div>
                                <div class="col-lg-3 mt-4" style="text-align:right;">
                                    <label></label>
                                    <button onclick="toPrint()" type="button" class="btn btn-success" id="btn_print"><i class="fa fa-print"> Print</i></button> 
                                    <script>
function toPrint() {
    window.location.href = 'print.php';  // Redirect to print.php
}
</script>
                                </div>
                            </div>
                            <hr>
                            </hr>
                            <div class="table-responsive">
                                <table class="table table-border" id="">

                                    <thead>

                                        <tr>
                                        <th>Photo</th>
                                        <th>Full Name</th>
                                        <th>Department</th>
                                     
                                            <th>Role</th>
                                          
                                           
                                            <th>Time In (AM)</th>
                                            <th>Time Out (AM)</th>
                                            <th>Time In (PM)</th>
                                            <th>Time Out (PM)</th>
                                            <th>Log Date</th>
                                        </tr>
                                    </thead>
                                    <tbody id="load_data">
                                    <?php include '../connection.php'; ?>
                                 <?php $results = mysqli_query($db, "SELECT * FROM entrance"); ?>
                                 <?php while ($row = mysqli_fetch_array($results)) { ?>
                                        <tr>
                                        <td>
                                                <center><img src="uploads/<?php echo $row['photo']; ?>" width="50px" height="50px"></center>
                                            </td>
                                            <td><?php echo $row['full_name']; ?></td>
                                            <td><?php echo $row['department']; ?></td>
                                          
                                            <td><?php echo $row['role']; ?></td>
                                           
                                           
                                            <td><?php echo $row['time_in_am']; ?></td>
                                            <td>
                                            <?php echo $row['time_out_am']; ?></td>
                                            <td><?php echo $row['time_in_pm']; ?></td>
                                            <td>
                                            <?php echo $row['time_out_pm']; ?></td>
                                            <td><?php echo $row['date_logged']; ?></td>

                                        </tr>
                                        <?php } ?>
                                    

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid pt-4 px-4" style="margin-top: 60%">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">2023</a>, All Right Reserved.
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            Created By <a href="#">Junil Toledo</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery-3.1.1.js"></script>
        <script src="js/jquery-ui.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#date1').datepicker();
                $('#date2').datepicker();
                $('#btn_search').on('click', function() {
                    if ($('#date1').val() == "" || $('#date2').val() == "") {
                        alert("Please enter Date 'From' and 'To' before submit");
                    } else {
                        $date1 = $('#date1').val();
                        $date2 = $('#date2').val();
                        $('#load_data').empty();
                        $loader = $('<tr ><td colspan = "6"><center>Searching....</center></td></tr>');
                        $loader.appendTo('#load_data');
                        setTimeout(function() {
                            $loader.remove();
                            $.ajax({
                                url: '../config/init/report_attendance.php',
                                type: 'POST',
                                data: {
                                    date1: $date1,
                                    date2: $date2
                                },
                                success: function(res) {
                                    $('#load_data').html(res);
                                }
                            });
                        }, 1000);
                    }
                });

                $('#reset').on('click', function() {
                    location.reload();
                });
            });
        </script>

        <script>
            $(function() {
                $("#date1").datepicker();
            });
        </script>
        <script>
            $(function() {
                $("#date2").datepicker();
            });
        </script>


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