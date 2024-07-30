

<!DOCTYPE html>



<html lang="en">

<?php
include 'header.php';
   ?>
<head> 
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {packages: ['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        // Use the PHP generated data
        const weeklyData = <?php
            include '../connection.php';

            // Function to get count of logs for each day
            function getEntrantsCount($db, $tableName) {
                $data = array_fill(0, 7, 0); // Initialize array with 0 values for each day of the week
                for ($i = 0; $i < 7; $i++) {
                    $date = date('Y-m-d', strtotime("last Monday +$i days"));
                    $sql = "SELECT COUNT(*) as count FROM $tableName WHERE date_logged = '$date'";
                    $result = $db->query($sql);
                    if ($result && $row = $result->fetch_assoc()) {
                        $data[$i] = $row['count'];
                    }
                }
                return $data;
            }

            // Fetch data from personell_logs and visitor_logs
            $personellData = getEntrantsCount($db, 'personell_logs');
            $visitorData = getEntrantsCount($db, 'visitor_logs');

            // Sum the entrants from both tables for each day
            $totalData = [];
            for ($i = 0; $i < 7; $i++) {
                $totalData[$i] = $personellData[$i] + $visitorData[$i];
            }

            // Close connection
            $db->close();

            echo json_encode($totalData);
        ?>;
        
        const daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        const dataArray = [['Day', 'Entrants']];
        for (let i = 0; i < weeklyData.length; i++) {
            dataArray.push([daysOfWeek[i], weeklyData[i]]);
        }
        const data = google.visualization.arrayToDataTable(dataArray);

        // Set Options
        const options = {
            title: 'Weekly Entrants',
            hAxis: {title: 'Day'},
            vAxis: {title: 'Number of Entrants'},
            legend: 'none'
        };

        // Draw
        const chart = new google.visualization.LineChart(document.getElementById('myChart1'));
        chart.draw(data, options);
    }
</script>



</head>
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
        <?php
		include 'navbar.php';
		?>

            <!-- Sale & Revenue Start -->
            <?php
include '../connection.php';
$today = date('Y-m-d');

function getCount($db, $query) {
    $result = $db->query($query);
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row["count"];
    }
    return 0;
}

$entrants_today = getCount($db, "
    SELECT COUNT(*) AS count FROM (
        SELECT id FROM personell_logs WHERE date_logged = '$today'
        UNION ALL
        SELECT id FROM visitor_logs WHERE date_logged = '$today'
    ) AS combined_logs
");
$visitor = getCount($db, "SELECT COUNT(*) AS count FROM visitor_logs WHERE date_logged = '$today'");
$blocked = getCount($db, "SELECT COUNT(*) AS count FROM personell WHERE status = 'Block'");
$strangers = getCount($db, "SELECT COUNT(*) AS count FROM personell_logs WHERE date_logged = '$today' AND role='Stranger'");
?>

            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-users fa-3x text-warning"></i>
                            <div class="ms-3">
                                <p class="mb-2">Entrants</p>
                                <h6 class="mb-0"><?php echo $entrants_today; ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-user-plus fa-3x text-warning"></i>
                           
                            <div class="ms-3">
                                <p class="mb-2">Visitors</p>
                                <h6 class="mb-0"><?php echo $visitor; ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-ban fa-3x text-warning"></i>
                            <div class="ms-3">
                                <p class="mb-2">Blocked</p>
                                <h6 class="mb-0"><?php echo $blocked; ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-user-secret fa-3x text-warning"></i>
                            <div class="ms-3">
                                <p class="mb-2">Strangers</p>
                                <h6 class="mb-0"><?php echo $strangers; ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div style="margin:0;padding:0;">
    <div class="row">
    <div style="padding:20px; margin:10px; width:47%;" class="bg-light rounded">
    <div id="myChart1" style="width:100%; height:300px;"></div>
    </div>
<div style="padding:20px; margin:10px;width:47%;" class="bg-light rounded">
    <div id="myChart" style="width:100%; height:300px;"></div>

    <script>
    google.charts.load('current', {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart2);

    function drawChart2() {
        // Fetch data from the PHP script
        fetch('status.php')
            .then(response => response.json())
            .then(data => {
                // Create DataTable
                const chartData = google.visualization.arrayToDataTable([
                    ['Status', 'Percentage'],
                    ['Arrived', data.arrived],
                    ['Not Arrived', data.not_arrived]
                ]);

                // Set Options
                const options = {
                    title: 'Entrants Status',
                    pieSliceText: 'percentage', // Show percentage on slices
                    slices: {
                        0: { offset: 0.1 }, // Slightly offset the 'Arrived' slice
                    }
                };

                // Draw Chart
                const chart = new google.visualization.PieChart(document.getElementById('myChart'));
                chart.draw(chartData, options);
            })
            .catch(error => console.error('Error fetching data:', error));
    }
    </script>
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
                                 <?php  $results = mysqli_query($db, "
            SELECT id, rfid_number, photo, role, full_name, time_in_am, time_out_am, time_in_pm, time_out_pm, 'personell_logs' AS source, 
            GREATEST(STR_TO_DATE(time_in_am, '%H:%i:%s'), STR_TO_DATE(time_out_am, '%H:%i:%s'), STR_TO_DATE(time_in_pm, '%H:%i:%s'), STR_TO_DATE(time_out_pm, '%H:%i:%s')) AS latest_time
            FROM personell_logs
            WHERE DATE(date_logged) = CURDATE()
            UNION ALL
            SELECT id, rfid_number, photo, role, name as full_name, time_in_am, time_out_am, time_in_pm, time_out_pm, 'visitor_logs' AS source, 
            GREATEST(STR_TO_DATE(time_in_am, '%H:%i:%s'), STR_TO_DATE(time_out_am, '%H:%i:%s'), STR_TO_DATE(time_in_pm, '%H:%i:%s'), STR_TO_DATE(time_out_pm, '%H:%i:%s')) AS latest_time
            FROM visitor_logs
            WHERE DATE(date_logged) = CURDATE()
            ORDER BY latest_time DESC, source DESC
        ");  ?>
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