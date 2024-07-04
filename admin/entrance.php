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
                   
                    <a href="entrance.php" class="nav-item nav-link active"><i class="fa fa-address-card me-2"></i>Entrance</a>
                    <a href="messages.php" class="nav-item nav-link"><i class="fa fa-envelope me-2"></i>Messages</a>
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
                                    <h6 class="mb-4">Manage Attendance</h6>
                                </div>
                            </div>
                            <hr></hr>
                            <div class="table-responsive">
                                <table class="table table-border" id="myDataTable">
                                    <thead>
                                        <tr>
                                            <th scope="col">Photo</th>
                                            <th scope="col">RFID Number</th>
                                            <th scope="col">Full Name</th>
                                            <th scope="col">Time In</th>
                                            <th scope="col">Time Out</th>
                                            <th scope="col">Date Logged</th>
                                            <th scope="col">Morning Status</th>
                                            <th scope="col">Afternoon Status</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <center><img src="../uploads/download.jpg" width="50px" height="50px"></center>
                                            </td>
                                            <td>0006613545</td>
                                            <td>Lance Nicko, Alarilla </td>

                                            <td>8:41 am</td>
                                            <td>
                                                8:41 am</td>

                                            <td>Mar 18, 2024</td>
                                            <td align="center">

                                                <span class="badge bg-danger"><i class="bi bi-clock"></i> Late</span> </td>

                                            <td align="center">

                                                <span class="badge bg-info"><i class="bi bi-clock"></i> Over Time</span> </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <center><img src="../uploads/download.jpg" width="50px" height="50px"></center>
                                            </td>
                                            <td>0006613545</td>
                                            <td>Lance Nicko, Alarilla </td>

                                            <td>8:42 am</td>
                                            <td>
                                                8:42 am</td>

                                            <td>Mar 18, 2024</td>
                                            <td align="center">

                                                <span class="badge bg-danger"><i class="bi bi-clock"></i> Late</span> </td>

                                            <td align="center">

                                                <span class="badge bg-info"><i class="bi bi-clock"></i> Over Time</span> </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <center><img src="../uploads/download.jpg" width="50px" height="50px"></center>
                                            </td>
                                            <td>0006613545</td>
                                            <td>Lance Nicko, Alarilla </td>

                                            <td>2:34 pm</td>
                                            <td>
                                            </td>

                                            <td>Mar 18, 2024</td>
                                            <td align="center">

                                                <span class="badge bg-danger"><i class="bi bi-clock"></i> Late</span> </td>

                                            <td align="center">

                                                <p style='color:red'>No Time Out</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <center><img src="../uploads/382666826_1043752916810255_4754522340657598554_n.jpg" width="50px" height="50px"></center>
                                            </td>
                                            <td>0006613547</td>
                                            <td>CALVADORES, ARIANE </td>

                                            <td>5:42 pm</td>
                                            <td>
                                                5:43 pm</td>

                                            <td>Mar 16, 2024</td>
                                            <td align="center">

                                                <span class="badge bg-danger"><i class="bi bi-clock"></i> Late</span> </td>

                                            <td align="center">

                                                <span class="badge bg-info"><i class="bi bi-clock"></i> Over Time</span> </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <center><img src="../uploads/382666826_1043752916810255_4754522340657598554_n.jpg" width="50px" height="50px"></center>
                                            </td>
                                            <td>0006613547</td>
                                            <td>CALVADORES, ARIANE </td>

                                            <td>5:43 pm</td>
                                            <td>
                                                6:10 pm</td>

                                            <td>Mar 16, 2024</td>
                                            <td align="center">

                                                <span class="badge bg-danger"><i class="bi bi-clock"></i> Late</span> </td>

                                            <td align="center">

                                                <span class="badge bg-info"><i class="bi bi-clock"></i> Over Time</span> </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <center><img src="../uploads/382666826_1043752916810255_4754522340657598554_n.jpg" width="50px" height="50px"></center>
                                            </td>
                                            <td>0006613547</td>
                                            <td>CALVADORES, ARIANE </td>

                                            <td>6:11 pm</td>
                                            <td>
                                            </td>

                                            <td>Mar 16, 2024</td>
                                            <td align="center">

                                                <span class="badge bg-danger"><i class="bi bi-clock"></i> Late</span> </td>

                                            <td align="center">

                                                <p style='color:red'>No Time Out</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <center><img src="../uploads/382666826_1043752916810255_4754522340657598554_n.jpg" width="50px" height="50px"></center>
                                            </td>
                                            <td>0006613547</td>
                                            <td>CALVADORES, ARIANE </td>

                                            <td>3:23 pm</td>
                                            <td>
                                            </td>

                                            <td>Mar 17, 2024</td>
                                            <td align="center">

                                                <span class="badge bg-danger"><i class="bi bi-clock"></i> Late</span> </td>

                                            <td align="center">

                                                <p style='color:red'>No Time Out</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <center><img src="../uploads/431343536_395697873209200_7086884325319238891_n.jpg" width="50px" height="50px"></center>
                                            </td>
                                            <td>0006581291</td>
                                            <td>DESPE, APRIL JOHN </td>

                                            <td>5:34 pm</td>
                                            <td>
                                                5:42 pm</td>

                                            <td>Mar 16, 2024</td>
                                            <td align="center">

                                                <span class="badge bg-danger"><i class="bi bi-clock"></i> Late</span> </td>

                                            <td align="center">

                                                <span class="badge bg-info"><i class="bi bi-clock"></i> Over Time</span> </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <center><img src="../uploads/431343536_395697873209200_7086884325319238891_n.jpg" width="50px" height="50px"></center>
                                            </td>
                                            <td>0006581291</td>
                                            <td>DESPE, APRIL JOHN </td>

                                            <td>5:42 pm</td>
                                            <td>
                                                5:43 pm</td>

                                            <td>Mar 16, 2024</td>
                                            <td align="center">

                                                <span class="badge bg-danger"><i class="bi bi-clock"></i> Late</span> </td>

                                            <td align="center">

                                                <span class="badge bg-info"><i class="bi bi-clock"></i> Over Time</span> </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <center><img src="../uploads/431343536_395697873209200_7086884325319238891_n.jpg" width="50px" height="50px"></center>
                                            </td>
                                            <td>0006581291</td>
                                            <td>DESPE, APRIL JOHN </td>

                                            <td>5:43 pm</td>
                                            <td>
                                                5:44 pm</td>

                                            <td>Mar 16, 2024</td>
                                            <td align="center">

                                                <span class="badge bg-danger"><i class="bi bi-clock"></i> Late</span> </td>

                                            <td align="center">

                                                <span class="badge bg-info"><i class="bi bi-clock"></i> Over Time</span> </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <center><img src="../uploads/431343536_395697873209200_7086884325319238891_n.jpg" width="50px" height="50px"></center>
                                            </td>
                                            <td>0006581291</td>
                                            <td>DESPE, APRIL JOHN </td>

                                            <td>5:44 pm</td>
                                            <td>
                                                5:44 pm</td>

                                            <td>Mar 16, 2024</td>
                                            <td align="center">

                                                <span class="badge bg-danger"><i class="bi bi-clock"></i> Late</span> </td>

                                            <td align="center">

                                                <span class="badge bg-info"><i class="bi bi-clock"></i> Over Time</span> </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <center><img src="../uploads/431343536_395697873209200_7086884325319238891_n.jpg" width="50px" height="50px"></center>
                                            </td>
                                            <td>0006581291</td>
                                            <td>DESPE, APRIL JOHN </td>

                                            <td>6:09 pm</td>
                                            <td>
                                            </td>

                                            <td>Mar 16, 2024</td>
                                            <td align="center">

                                                <span class="badge bg-danger"><i class="bi bi-clock"></i> Late</span> </td>

                                            <td align="center">

                                                <p style='color:red'>No Time Out</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <center><img src="../uploads/431343536_395697873209200_7086884325319238891_n.jpg" width="50px" height="50px"></center>
                                            </td>
                                            <td>0006581291</td>
                                            <td>DESPE, APRIL JOHN </td>

                                            <td>3:03 pm</td>
                                            <td>
                                            </td>

                                            <td>Mar 17, 2024</td>
                                            <td align="center">

                                                <span class="badge bg-danger"><i class="bi bi-clock"></i> Late</span> </td>

                                            <td align="center">

                                                <p style='color:red'>No Time Out</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <center><img src="../uploads/athletic-man-practicing-gymnastics-keep-fit_23-2150989809.avif" width="50px" height="50px"></center>
                                            </td>
                                            <td>0006613535</td>
                                            <td>Bailon, Lester </td>

                                            <td>6:07 am</td>
                                            <td>
                                                6:07 am</td>

                                            <td>Mar 16, 2024</td>
                                            <td align="center">

                                                <span class="badge bg-danger"><i class="bi bi-clock"></i> Late</span> </td>

                                            <td align="center">

                                                <span class="badge bg-info"><i class="bi bi-clock"></i> Over Time</span> </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <center><img src="../uploads/athletic-man-practicing-gymnastics-keep-fit_23-2150989809.avif" width="50px" height="50px"></center>
                                            </td>
                                            <td>0006613535</td>
                                            <td>Bailon, Lester </td>

                                            <td>12:04 pm</td>
                                            <td>
                                                12:04 pm</td>

                                            <td>Mar 16, 2024</td>
                                            <td align="center">

                                                <span class="badge bg-danger"><i class="bi bi-clock"></i> Late</span> </td>

                                            <td align="center">

                                                <span class="badge bg-info"><i class="bi bi-clock"></i> Over Time</span> </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <center><img src="../uploads/athletic-man-practicing-gymnastics-keep-fit_23-2150989809.avif" width="50px" height="50px"></center>
                                            </td>
                                            <td>0006613535</td>
                                            <td>Bailon, Lester </td>

                                            <td>12:05 pm</td>
                                            <td>
                                                12:07 pm</td>

                                            <td>Mar 16, 2024</td>
                                            <td align="center">

                                                <span class="badge bg-danger"><i class="bi bi-clock"></i> Late</span> </td>

                                            <td align="center">

                                                <span class="badge bg-info"><i class="bi bi-clock"></i> Over Time</span> </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <center><img src="../uploads/athletic-man-practicing-gymnastics-keep-fit_23-2150989809.avif" width="50px" height="50px"></center>
                                            </td>
                                            <td>0006613535</td>
                                            <td>Bailon, Lester </td>

                                            <td>12:09 pm</td>
                                            <td>
                                                12:09 pm</td>

                                            <td>Mar 16, 2024</td>
                                            <td align="center">

                                                <span class="badge bg-danger"><i class="bi bi-clock"></i> Late</span> </td>

                                            <td align="center">

                                                <span class="badge bg-info"><i class="bi bi-clock"></i> Over Time</span> </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <center><img src="../uploads/athletic-man-practicing-gymnastics-keep-fit_23-2150989809.avif" width="50px" height="50px"></center>
                                            </td>
                                            <td>0006613535</td>
                                            <td>Bailon, Lester </td>

                                            <td>12:54 pm</td>
                                            <td>
                                                12:54 pm</td>

                                            <td>Mar 16, 2024</td>
                                            <td align="center">

                                                <span class="badge bg-danger"><i class="bi bi-clock"></i> Late</span> </td>

                                            <td align="center">

                                                <span class="badge bg-info"><i class="bi bi-clock"></i> Over Time</span> </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <center><img src="../uploads/athletic-man-practicing-gymnastics-keep-fit_23-2150989809.avif" width="50px" height="50px"></center>
                                            </td>
                                            <td>0006613535</td>
                                            <td>Bailon, Lester </td>

                                            <td>5:42 pm</td>
                                            <td>
                                                5:42 pm</td>

                                            <td>Mar 16, 2024</td>
                                            <td align="center">

                                                <span class="badge bg-danger"><i class="bi bi-clock"></i> Late</span> </td>

                                            <td align="center">

                                                <span class="badge bg-info"><i class="bi bi-clock"></i> Over Time</span> </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <center><img src="../uploads/athletic-man-practicing-gymnastics-keep-fit_23-2150989809.avif" width="50px" height="50px"></center>
                                            </td>
                                            <td>0006613535</td>
                                            <td>Bailon, Lester </td>

                                            <td>6:08 pm</td>
                                            <td>
                                                6:09 pm</td>

                                            <td>Mar 16, 2024</td>
                                            <td align="center">

                                                <span class="badge bg-danger"><i class="bi bi-clock"></i> Late</span> </td>

                                            <td align="center">

                                                <span class="badge bg-info"><i class="bi bi-clock"></i> Over Time</span> </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <center><img src="../uploads/athletic-man-practicing-gymnastics-keep-fit_23-2150989809.avif" width="50px" height="50px"></center>
                                            </td>
                                            <td>0006613535</td>
                                            <td>Bailon, Lester </td>

                                            <td>11:13 pm</td>
                                            <td>
                                                11:13 pm</td>

                                            <td>Mar 17, 2024</td>
                                            <td align="center">

                                                <span class="badge bg-info"><i class="bi bi-clock"></i> Early Time</span> </td>

                                            <td align="center">

                                                <span class="badge bg-warning"><i class="bi bi-clock"></i> Under Time</span> </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <center><img src="../uploads/athletic-man-practicing-gymnastics-keep-fit_23-2150989809.avif" width="50px" height="50px"></center>
                                            </td>
                                            <td>0006613535</td>
                                            <td>Bailon, Lester </td>

                                            <td>11:15 pm</td>
                                            <td>
                                                11:20 pm</td>

                                            <td>Mar 17, 2024</td>
                                            <td align="center">

                                                <span class="badge bg-info"><i class="bi bi-clock"></i> Early Time</span> </td>

                                            <td align="center">

                                                <span class="badge bg-warning"><i class="bi bi-clock"></i> Under Time</span> </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <center><img src="../uploads/athletic-man-practicing-gymnastics-keep-fit_23-2150989809.avif" width="50px" height="50px"></center>
                                            </td>
                                            <td>0006613535</td>
                                            <td>Bailon, Lester </td>

                                            <td>11:20 pm</td>
                                            <td>
                                            </td>

                                            <td>Mar 17, 2024</td>
                                            <td align="center">

                                                <span class="badge bg-info"><i class="bi bi-clock"></i> Early Time</span> </td>

                                            <td align="center">

                                                <p style='color:red'>No Time Out</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <center><img src="../uploads/athletic-man-practicing-gymnastics-keep-fit_23-2150989809.avif" width="50px" height="50px"></center>
                                            </td>
                                            <td>0006613535</td>
                                            <td>Bailon, Lester </td>

                                            <td>4:06 am</td>
                                            <td>
                                                4:06 am</td>

                                            <td>Mar 18, 2024</td>
                                            <td align="center">

                                                <span class="badge bg-danger"><i class="bi bi-clock"></i> Late</span> </td>

                                            <td align="center">

                                                <span class="badge bg-info"><i class="bi bi-clock"></i> Over Time</span> </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <center><img src="../uploads/athletic-man-practicing-gymnastics-keep-fit_23-2150989809.avif" width="50px" height="50px"></center>
                                            </td>
                                            <td>0006613535</td>
                                            <td>Bailon, Lester </td>

                                            <td>4:09 am</td>
                                            <td>
                                                4:09 am</td>

                                            <td>Mar 18, 2024</td>
                                            <td align="center">

                                                <span class="badge bg-danger"><i class="bi bi-clock"></i> Late</span> </td>

                                            <td align="center">

                                                <span class="badge bg-info"><i class="bi bi-clock"></i> Over Time</span> </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <center><img src="../uploads/athletic-man-practicing-gymnastics-keep-fit_23-2150989809.avif" width="50px" height="50px"></center>
                                            </td>
                                            <td>0006613535</td>
                                            <td>Bailon, Lester </td>

                                            <td>5:56 am</td>
                                            <td>
                                                5:57 am</td>

                                            <td>Mar 18, 2024</td>
                                            <td align="center">

                                                <span class="badge bg-danger"><i class="bi bi-clock"></i> Late</span> </td>

                                            <td align="center">

                                                <span class="badge bg-info"><i class="bi bi-clock"></i> Over Time</span> </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <center><img src="../uploads/athletic-man-practicing-gymnastics-keep-fit_23-2150989809.avif" width="50px" height="50px"></center>
                                            </td>
                                            <td>0006613535</td>
                                            <td>Bailon, Lester </td>

                                            <td>5:57 am</td>
                                            <td>
                                            </td>

                                            <td>Mar 18, 2024</td>
                                            <td align="center">

                                                <span class="badge bg-danger"><i class="bi bi-clock"></i> Late</span> </td>

                                            <td align="center">

                                                <p style='color:red'>No Time Out</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <center><img src="" width="50px" height="50px"></center>
                                            </td>
                                            <td></td>
                                            <td></td>

                                            <td>4:59 am</td>
                                            <td>
                                                4:59 am</td>

                                            <td>Mar 16, 2024</td>
                                            <td align="center">

                                                <span class="badge bg-info"><i class="bi bi-clock"></i> Early Time</span> </td>

                                            <td align="center">

                                                <span class="badge bg-info"><i class="bi bi-clock"></i> Over Time</span> </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <center><img src="" width="50px" height="50px"></center>
                                            </td>
                                            <td></td>
                                            <td></td>

                                            <td>5:03 am</td>
                                            <td>
                                                5:03 am</td>

                                            <td>Mar 16, 2024</td>
                                            <td align="center">

                                                <span class="badge bg-info"><i class="bi bi-clock"></i> Early Time</span> </td>

                                            <td align="center">

                                                <span class="badge bg-info"><i class="bi bi-clock"></i> Over Time</span> </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <center><img src="" width="50px" height="50px"></center>
                                            </td>
                                            <td></td>
                                            <td></td>

                                            <td>5:15 am</td>
                                            <td>
                                                5:15 am</td>

                                            <td>Mar 16, 2024</td>
                                            <td align="center">

                                                <span class="badge bg-info"><i class="bi bi-clock"></i> Early Time</span> </td>

                                            <td align="center">

                                                <span class="badge bg-info"><i class="bi bi-clock"></i> Over Time</span> </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <center><img src="" width="50px" height="50px"></center>
                                            </td>
                                            <td></td>
                                            <td></td>

                                            <td>5:16 am</td>
                                            <td>
                                                5:16 am</td>

                                            <td>Mar 16, 2024</td>
                                            <td align="center">

                                                <span class="badge bg-info"><i class="bi bi-clock"></i> Early Time</span> </td>

                                            <td align="center">

                                                <span class="badge bg-info"><i class="bi bi-clock"></i> Over Time</span> </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <center><img src="" width="50px" height="50px"></center>
                                            </td>
                                            <td></td>
                                            <td></td>

                                            <td>5:46 am</td>
                                            <td>
                                                5:46 am</td>

                                            <td>Mar 16, 2024</td>
                                            <td align="center">

                                                <span class="badge bg-info"><i class="bi bi-clock"></i> Early Time</span> </td>

                                            <td align="center">

                                                <span class="badge bg-info"><i class="bi bi-clock"></i> Over Time</span> </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <center><img src="" width="50px" height="50px"></center>
                                            </td>
                                            <td></td>
                                            <td></td>

                                            <td>6:07 am</td>
                                            <td>
                                                6:07 am</td>

                                            <td>Mar 16, 2024</td>
                                            <td align="center">

                                                <span class="badge bg-info"><i class="bi bi-clock"></i> Early Time</span> </td>

                                            <td align="center">

                                                <span class="badge bg-info"><i class="bi bi-clock"></i> Over Time</span> </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <center><img src="" width="50px" height="50px"></center>
                                            </td>
                                            <td></td>
                                            <td></td>

                                            <td>12:01 pm</td>
                                            <td>
                                                12:05 pm</td>

                                            <td>Mar 16, 2024</td>
                                            <td align="center">

                                                <span class="badge bg-info"><i class="bi bi-clock"></i> Early Time</span> </td>

                                            <td align="center">

                                                <span class="badge bg-warning"><i class="bi bi-clock"></i> Under Time</span> </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <center><img src="" width="50px" height="50px"></center>
                                            </td>
                                            <td></td>
                                            <td></td>

                                            <td>12:06 pm</td>
                                            <td>
                                                12:06 pm</td>

                                            <td>Mar 16, 2024</td>
                                            <td align="center">

                                                <span class="badge bg-info"><i class="bi bi-clock"></i> Early Time</span> </td>

                                            <td align="center">

                                                <span class="badge bg-warning"><i class="bi bi-clock"></i> Under Time</span> </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <center><img src="" width="50px" height="50px"></center>
                                            </td>
                                            <td></td>
                                            <td></td>

                                            <td>12:08 pm</td>
                                            <td>
                                                12:09 pm</td>

                                            <td>Mar 16, 2024</td>
                                            <td align="center">

                                                <span class="badge bg-info"><i class="bi bi-clock"></i> Early Time</span> </td>

                                            <td align="center">

                                                <span class="badge bg-warning"><i class="bi bi-clock"></i> Under Time</span> </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <center><img src="" width="50px" height="50px"></center>
                                            </td>
                                            <td></td>
                                            <td></td>

                                            <td>12:54 pm</td>
                                            <td>
                                                12:54 pm</td>

                                            <td>Mar 16, 2024</td>
                                            <td align="center">

                                                <span class="badge bg-info"><i class="bi bi-clock"></i> Early Time</span> </td>

                                            <td align="center">

                                                <span class="badge bg-warning"><i class="bi bi-clock"></i> Under Time</span> </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <center><img src="" width="50px" height="50px"></center>
                                            </td>
                                            <td></td>
                                            <td></td>

                                            <td>12:55 pm</td>
                                            <td>
                                                12:55 pm</td>

                                            <td>Mar 16, 2024</td>
                                            <td align="center">

                                                <span class="badge bg-info"><i class="bi bi-clock"></i> Early Time</span> </td>

                                            <td align="center">

                                                <span class="badge bg-warning"><i class="bi bi-clock"></i> Under Time</span> </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <center><img src="" width="50px" height="50px"></center>
                                            </td>
                                            <td></td>
                                            <td></td>

                                            <td>4:11 pm</td>
                                            <td>
                                                4:11 pm</td>

                                            <td>Mar 16, 2024</td>
                                            <td align="center">

                                                <span class="badge bg-info"><i class="bi bi-clock"></i> Early Time</span> </td>

                                            <td align="center">

                                                <span class="badge bg-info"><i class="bi bi-clock"></i> Over Time</span> </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <center><img src="" width="50px" height="50px"></center>
                                            </td>
                                            <td></td>
                                            <td></td>

                                            <td>5:25 pm</td>
                                            <td>
                                                5:25 pm</td>

                                            <td>Mar 16, 2024</td>
                                            <td align="center">

                                                <span class="badge bg-info"><i class="bi bi-clock"></i> Early Time</span> </td>

                                            <td align="center">

                                                <span class="badge bg-info"><i class="bi bi-clock"></i> Over Time</span> </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <center><img src="" width="50px" height="50px"></center>
                                            </td>
                                            <td></td>
                                            <td></td>

                                            <td>5:25 pm</td>
                                            <td>
                                                5:25 pm</td>

                                            <td>Mar 16, 2024</td>
                                            <td align="center">

                                                <span class="badge bg-info"><i class="bi bi-clock"></i> Early Time</span> </td>

                                            <td align="center">

                                                <span class="badge bg-info"><i class="bi bi-clock"></i> Over Time</span> </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <center><img src="" width="50px" height="50px"></center>
                                            </td>
                                            <td></td>
                                            <td></td>

                                            <td>5:25 pm</td>
                                            <td>
                                                5:25 pm</td>

                                            <td>Mar 16, 2024</td>
                                            <td align="center">

                                                <span class="badge bg-info"><i class="bi bi-clock"></i> Early Time</span> </td>

                                            <td align="center">

                                                <span class="badge bg-info"><i class="bi bi-clock"></i> Over Time</span> </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <center><img src="" width="50px" height="50px"></center>
                                            </td>
                                            <td></td>
                                            <td></td>

                                            <td>5:42 pm</td>
                                            <td>
                                                6:09 pm</td>

                                            <td>Mar 16, 2024</td>
                                            <td align="center">

                                                <span class="badge bg-info"><i class="bi bi-clock"></i> Early Time</span> </td>

                                            <td align="center">

                                                <span class="badge bg-info"><i class="bi bi-clock"></i> Over Time</span> </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <center><img src="" width="50px" height="50px"></center>
                                            </td>
                                            <td></td>
                                            <td></td>

                                            <td>3:04 pm</td>
                                            <td>
                                                3:26 pm</td>

                                            <td>Mar 17, 2024</td>
                                            <td align="center">

                                                <span class="badge bg-info"><i class="bi bi-clock"></i> Early Time</span> </td>

                                            <td align="center">

                                                <span class="badge bg-warning"><i class="bi bi-clock"></i> Under Time</span> </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <center><img src="" width="50px" height="50px"></center>
                                            </td>
                                            <td></td>
                                            <td></td>

                                            <td>5:39 pm</td>
                                            <td>
                                                5:39 pm</td>

                                            <td>Feb 06, 2024</td>
                                            <td align="center">

                                                <span class="badge bg-danger"><i class="bi bi-clock"></i> Late</span> </td>

                                            <td align="center">

                                                <span class="badge bg-info"><i class="bi bi-clock"></i> Over Time</span> </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <center><img src="" width="50px" height="50px"></center>
                                            </td>
                                            <td></td>
                                            <td></td>

                                            <td>5:40 pm</td>
                                            <td>
                                                5:40 pm</td>

                                            <td>Feb 06, 2024</td>
                                            <td align="center">

                                                <span class="badge bg-danger"><i class="bi bi-clock"></i> Late</span> </td>

                                            <td align="center">

                                                <span class="badge bg-info"><i class="bi bi-clock"></i> Over Time</span> </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <center><img src="" width="50px" height="50px"></center>
                                            </td>
                                            <td></td>
                                            <td></td>

                                            <td>5:43 pm</td>
                                            <td>
                                                5:44 pm</td>

                                            <td>Feb 06, 2024</td>
                                            <td align="center">

                                                <span class="badge bg-danger"><i class="bi bi-clock"></i> Late</span> </td>

                                            <td align="center">

                                                <span class="badge bg-info"><i class="bi bi-clock"></i> Over Time</span> </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <center><img src="" width="50px" height="50px"></center>
                                            </td>
                                            <td></td>
                                            <td></td>

                                            <td>5:45 pm</td>
                                            <td>
                                                5:45 pm</td>

                                            <td>Feb 06, 2024</td>
                                            <td align="center">

                                                <span class="badge bg-danger"><i class="bi bi-clock"></i> Late</span> </td>

                                            <td align="center">

                                                <span class="badge bg-info"><i class="bi bi-clock"></i> Over Time</span> </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <center><img src="" width="50px" height="50px"></center>
                                            </td>
                                            <td></td>
                                            <td></td>

                                            <td>5:45 pm</td>
                                            <td>
                                                5:45 pm</td>

                                            <td>Feb 06, 2024</td>
                                            <td align="center">

                                                <span class="badge bg-danger"><i class="bi bi-clock"></i> Late</span> </td>

                                            <td align="center">

                                                <span class="badge bg-info"><i class="bi bi-clock"></i> Over Time</span> </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <center><img src="" width="50px" height="50px"></center>
                                            </td>
                                            <td></td>
                                            <td></td>

                                            <td>2:26 am</td>
                                            <td>
                                                2:26 am</td>

                                            <td>Sep 15, 2023</td>
                                            <td align="center">

                                                <span class="badge bg-danger"><i class="bi bi-clock"></i> Late</span> </td>

                                            <td align="center">

                                                <span class="badge bg-info"><i class="bi bi-clock"></i> Over Time</span> </td>
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