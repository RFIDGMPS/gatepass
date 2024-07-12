
<!DOCTYPE html>
<html>
<?php
include 'header.php';
?>

<body style="text-align:center;" onload="window.print()">
    <img src="uploads/header.png"/>
    <br><br>
    <h1>Campus Entrance Log Monitoring Report</h1>
    <br>
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
</body>
</html>