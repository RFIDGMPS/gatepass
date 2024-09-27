<!DOCTYPE html>


<?php
include 'auth.php'; // Include session validation
?>

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
            <?php
		include 'navbar.php';
		?>


            <div class="container-fluid pt-4 px-4">
                <div class="col-sm-12 col-xl-12">

                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-light rounded h-100 p-4">
                            <div class="row">
                                <div class="col-9">
                                    <h6 class="mb-4">Messages</h6>
                                </div>

                            </div>
                            <hr></hr>
                            <div class="table-responsive">
                                <table class="table table-border" id="myDataTable">
                                    <thead>
                                        <tr>
                                            <th scope="col">From</th>
                                            <th scope="col">Subject</th>
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

            <?php
include 'footer.php';
			?>
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