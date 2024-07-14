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

            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-users fa-3x text-warning"></i>
                            <div class="ms-3">
                                <p class="mb-2">Entrants</p>
                                <h6 class="mb-0">3</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-user-plus fa-3x text-warning"></i>
                           
                            <div class="ms-3">
                                <p class="mb-2">Visitors</p>
                                <h6 class="mb-0">6</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-ban fa-3x text-warning"></i>
                            <div class="ms-3">
                                <p class="mb-2">Blocked</p>
                                <h6 class="mb-0">50</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-user-secret fa-3x text-warning"></i>
                            <div class="ms-3">
                                <p class="mb-2">Strangers</p>
                                <h6 class="mb-0">16</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div style="margin:0;padding:0;">
    <div class="row">
        <div style="padding:20px; margin:10px; width:40%;" class="bg-light rounded">
            <div id="myChart1" style="width:100%; height:300px;"></div>

            <script>
            google.charts.load('current', {packages:['corechart']});
            google.charts.setOnLoadCallback(drawChart1);

            function drawChart1() {
                // Set Data
                const data = google.visualization.arrayToDataTable([
                    ['Entrants', 'Day'],
                    [1, 50], [2, 110], [3, 33], [4, 45], [5, 56],
                    [6, 62], [7, 73]
                ]);

                // Set Options
                const options = {
                    title: 'Weekly Entrants',
                    hAxis: {title: 'Days'},
                    vAxis: {title: 'Number of Entrants'},
                    legend: 'none'
                };

                // Draw
                const chart = new google.visualization.LineChart(document.getElementById('myChart1'));
                chart.draw(data, options);
            }
            </script>
        </div>
        
        <div style="padding:20px; margin:10px;width:30%;" class="bg-light rounded">
            <div id="myChart" style="width:100%; height:300px;"></div>

            <script>
            google.charts.load('current', {packages:['corechart']});
            google.charts.setOnLoadCallback(drawChart2);

            function drawChart2() {
                const data = google.visualization.arrayToDataTable([
                    ['Arrived', 'Not Arrived'],
                    ['Arrived', 38],
                    ['Not Arrived', 62]
                ]);

                const options = {
                    title: 'Entrants Status'
                };

                const chart = new google.visualization.PieChart(document.getElementById('myChart'));
                chart.draw(data, options);
            }
            </script>
        </div>
        
        <div style="padding:20px; margin:10px;width:30%; height:300px;" class="bg-light rounded">
            <p>Visitors</p>
        </div>
    </div>
</div>







                <div class="bg-light rounded h-100 p-4 mt-4" >
                    <br>
                    <h2><i class="bi bi-clock"></i> Entrance for today</h2>
                    <hr></hr>
                    <div class="table-responsive">
                    <table class="table table-border" id="myDataTable">
                                    <thead>
                                        <tr>
                                            <th scope="col">Photo</th>
                                            <th scope="col">RFID Number</th>
                                            <th scope="col">Role</th>
                                            <th scope="col">Full Name</th>
                                            <th scope="col">Time In (AM)</th>
                                            <th scope="col">Time Out (AM)</th>
                                            <th scope="col">Time In (PM)</th>
                                            <th scope="col">Time Out (PM)</th>
                                        
                                          

                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php include '../connection.php'; ?>
                                 <?php $results = mysqli_query($db, "SELECT * FROM entrance"); ?>
                                 <?php while ($row = mysqli_fetch_array($results)) { ?>
                                        <tr>
                                            <td>
                                                <center><img src="uploads/<?php echo $row['photo']; ?>" width="50px" height="50px"></center>
                                            </td>
                                            <td><?php echo $row['rfid_number']; ?></td>
                                            <td><?php echo $row['role']; ?></td>
                                            <td><?php echo $row['full_name']; ?></td>

                                            <td><?php echo $row['time_in_am']; ?></td>
                                            <td>
                                            <?php echo $row['time_out_am']; ?></td>
                                            <td><?php echo $row['time_in_pm']; ?></td>
                                            <td>
                                            <?php echo $row['time_out_pm']; ?></td>
                                          
                                           
                                        </tr>
                                        <?php } ?>
                                   
                                      
                                      
                                    </tbody>
                                </table>
                    </div>
                </div>
            </div>


            <?php
include 'footer.php';
			?>
        </div>
        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-warning btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
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