<?php
if (!isset($_SESSION)) session_start();
?>

<div class="navbar">
    <h1>RoomEase</h1>
    <div>
        <a href="dashboard.php">Dashboard</a>
        <a href="preferences.php">Preferences</a>

        <?php if ($_SESSION['role'] == 'owner') { ?>
            <a href="accommodation.php">Accommodation</a>
        <?php } ?>

        <a href="find_matches.php">Matches</a>
        <a href="logout.php">Logout</a>
    </div>
</div>
