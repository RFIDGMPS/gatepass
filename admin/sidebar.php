<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>
<?php
include '../connection.php';
$logo1 = "";
// Fetch data from the about table
$sql = "SELECT * FROM about LIMIT 1";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    $row = $result->fetch_assoc();
    $logo1 = $row['logo1'];
} 

$username = "";
// Fetch data from the about table
$sql1 = "SELECT * FROM user LIMIT 1";
$result1 = $db->query($sql1);

if ($result1->num_rows > 0) {
    // Output data of each row
    $row = $result1->fetch_assoc();
    $username = $row['username'];
} 
?>
<div class="sidebar pe-4 pb-3" style="background-color: #fcaf42">
    <nav class="navbar navbar-light">
        <a href="dashboard.php" class="navbar-brand mx-4 mb-3">
            <h3 class="text" style="color: #f0ddcc">RFID Gate Pass</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="<?php echo 'uploads/'.$logo1; ?>" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0"><?php echo $username; ?></h6>
                <span>Administrator</span>
            </div>
        </div>

        <div class="navbar-nav w-100">
            <!-- Dashboard -->
            <a href="dashboard.php" class="nav-item nav-link <?php echo ($current_page == 'dashboard.php') ? 'active' : ''; ?>">
                <i class="fa fa-tachometer-alt me-2"></i>Dashboard
            </a>

            <!-- Department -->
            <a href="department.php" class="nav-item nav-link <?php echo ($current_page == 'department.php') ? 'active' : ''; ?>">
                <i class="fa fa-city me-2"></i>Department
            </a>

            <!-- Roles -->
            <a href="role.php" class="nav-item nav-link <?php echo ($current_page == 'role.php') ? 'active' : ''; ?>">
                <i class="fa fa-user-tie me-2"></i>Roles
            </a>

            <!-- Personnel with Submenu -->
            <a class="nav-item nav-link collapsed <?php echo in_array($current_page, ['personell.php', 'personell_logs.php']) ? 'active' : ''; ?>" href="#personnelSubmenu" data-bs-toggle="collapse" aria-expanded="<?php echo in_array($current_page, ['personell.php', 'personell_logs.php']) ? 'true' : 'false'; ?>">
                <i class="fa fa-users me-2"></i>Personnel
            </a>
            <div id="personnelSubmenu" class="collapse <?php echo in_array($current_page, ['personell.php', 'personell_logs.php']) ? 'show' : ''; ?>" data-bs-parent=".navbar-nav">
                <ul class="navbar-nav ps-3">
                    <li>
                        <a href="personell.php" class="nav-item nav-link <?php echo ($current_page == 'personell.php') ? 'active' : ''; ?>">Personnel List</a>
                    </li>
                    <li>
                        <a href="personell_logs.php" class="nav-item nav-link <?php echo ($current_page == 'personell_logs.php') ? 'active' : ''; ?>">Personnel Logs</a>
                    </li>
                </ul>
            </div>

            <!-- Visitor with Submenu -->
            <a class="nav-item nav-link collapsed <?php echo in_array($current_page, ['visitor.php', 'visitor_logs.php']) ? 'active' : ''; ?>" href="#visitorSubmenu" data-bs-toggle="collapse" aria-expanded="<?php echo in_array($current_page, ['visitor.php', 'visitor_logs.php']) ? 'true' : 'false'; ?>">
                <i class="fa fa-user-plus me-2"></i>Visitor
            </a>
            <div id="visitorSubmenu" class="collapse <?php echo in_array($current_page, ['visitor.php', 'visitor_logs.php']) ? 'show' : ''; ?>" data-bs-parent=".navbar-nav">
                <ul class="navbar-nav ps-3">
                    <li>
                        <a href="visitor.php" class="nav-item nav-link <?php echo ($current_page == 'visitor.php') ? 'active' : ''; ?>">Visitor List</a>
                    </li>
                    <li>
                        <a href="visitor_logs.php" class="nav-item nav-link <?php echo ($current_page == 'visitor_logs.php') ? 'active' : ''; ?>">Visitor Logs</a>
                    </li>
                </ul>
            </div>

            <!-- Lost and Found -->
            <a href="lostfound.php" class="nav-item nav-link <?php echo ($current_page == 'lostfound.php') ? 'active' : ''; ?>">
                <i class="fa fa-box me-2"></i>Lost and Found
            </a>

            <!-- Settings -->
            <a href="settings.php" class="nav-item nav-link <?php echo ($current_page == 'settings.php') ? 'active' : ''; ?>">
                <i class="fa fa-cog me-2"></i>Settings
            </a>
        </div>
    </nav>
</div>
