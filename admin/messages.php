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
                    <a href="messages.php" class="nav-item nav-link active"><i class="fa fa-envelope me-2"></i>Messages</a>
                    <a href="report.php" class="nav-item nav-link"><i class="fa fa-print me-2"></i>Report</a>
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
                                    <h6 class="mb-4">Manage Message</h6>
                                </div>

                            </div>
                            <hr></hr>
                            <div class="table-responsive">
                                <table class="table table-border" id="myDataTable">
                                    <thead>
                                        <tr>
                                            <th scope="col">Full Name</th>
                                            <th scope="col">Email Address</th>
                                            <th scope="col">Contact Number</th>
                                            <th scope="col">Message</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Bea Dlonsod</td>
                                            <td>beadlonsod9@gmail.com</td>
                                            <td>09942816700</td>
                                            <td>Hello sir pano po ito</td>
                                        </tr>
                                        <tr>
                                            <td>Bea Dlonsod</td>
                                            <td>beadlonsod9@gmail.com</td>
                                            <td>09942816700</td>
                                            <td>Hello sir pano po ito</td>
                                        </tr>
                                        <tr>
                                            <td>Vikash Sharma</td>
                                            <td>vikashsharma3598@gmail.com</td>
                                            <td>08083693214</td>
                                            <td>How to buy this project</td>
                                        </tr>
                                        <tr>
                                            <td>Janssen Kim Buizon</td>
                                            <td>jbuizon2019@gmail.com</td>
                                            <td>09305949291</td>
                                            <td>Paano po ako makakapag avail nito</td>
                                        </tr>
                                        <tr>
                                            <td>Bryan Dave Ostiano Covita</td>
                                            <td>bryandavecovita65@gmail.com</td>
                                            <td>09158027117</td>
                                            <td>Thanks</td>
                                        </tr>
                                        <tr>
                                            <td>Rambotan Lansones</td>
                                            <td>bautista@gmail.com</td>
                                            <td>09202320245</td>
                                            <td>Hello pu</td>
                                        </tr>
                                        <tr>
                                            <td>Test</td>
                                            <td>Test@gmail.com</td>
                                            <td>09123456781</td>
                                            <td>Test</td>
                                        </tr>
                                        <tr>
                                            <td>OLIVER MANUEL NERVES PAYLA</td>
                                            <td>olivermanuelpayla@gmail.com</td>
                                            <td>09569339911</td>
                                            <td>Hello sir mag kano po yan</td>
                                        </tr>
                                        <tr>
                                            <td>OLIVER MANUEL NERVES PAYLA</td>
                                            <td>olivermanuelpayla@gmail.com</td>
                                            <td>09569339911</td>
                                            <td>Hello</td>
                                        </tr>
                                        <tr>
                                            <td>Saturn</td>
                                            <td>saturndeasis@gmail.com</td>
                                            <td>09108327855</td>
                                            <td>Pwde po ba tayo mag usap sa email sir salamat po</td>
                                        </tr>
                                        <tr>
                                            <td>Mkm</td>
                                            <td>865e75opi8y8@gmail.com</td>
                                            <td>12312312312</td>
                                            <td>Qwdq</td>
                                        </tr>
                                        <tr>
                                            <td>Niel Dhemster L Santos</td>
                                            <td>dhemster57@gmail.com</td>
                                            <td>09218074592</td>
                                            <td>Hiii</td>
                                        </tr>
                                        <tr>
                                            <td>Archie Lim</td>
                                            <td>katripchannel@gmail.com</td>
                                            <td>09687450820</td>
                                            <td>How to avail this system and how much for trial how long</td>
                                        </tr>
                                        <tr>
                                            <td>Ara May Calma</td>
                                            <td>ara@gmail.com</td>
                                            <td>09768788888</td>
                                            <td>Wow nice i love this work</td>
                                        </tr>
                                        <tr>
                                            <td>Nario Luis</td>
                                            <td>nario@gmail.com</td>
                                            <td>09988799899</td>
                                            <td>Nice work admin</td>
                                        </tr>
                                        <tr>
                                            <td>Junil Toledo</td>
                                            <td>toledojonel557@gmail.com</td>
                                            <td>09797899767</td>
                                            <td>Sample lamang</td>
                                        </tr>
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