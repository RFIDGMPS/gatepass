<?php
// Query to count new lost cards
include 'connection.php';

$query = "SELECT COUNT(*) AS new_lost_cards FROM lost_card WHERE date_requested = CURRENT_DATE()";
$result = $db->query($query);
$new_lost_cards = 0;

if ($row = $result->fetch_assoc()) {
    $new_lost_cards = $row['new_lost_cards'];
}
?>

<a href="lostcard.php" class="nav-item nav-link <?php echo ($current_page == 'lostcard.php') ? 'active' : ''; ?>">
    <i class="fas fa-id-badge"></i> Lost Card
    <?php if ($new_lost_cards > 0): ?>
        <span class="badge"><?php echo $new_lost_cards; ?></span>
    <?php endif; ?>
</a>

<style>
    .badge {
        background-color: red;
        color: white;
        padding: 2px 7px;
        border-radius: 50%;
        font-size: 12px;
        position: relative;
        top: -8px;
        left: 5px;
    }
</style>
