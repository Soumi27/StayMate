<?php
session_start();
include "db.php";

if (!isset($_SESSION['uid'])) {
    header("Location: login.php");
    exit();
}

$uid  = $_SESSION['uid'];
$role = $_SESSION['role'];

/* 🔹 Fetch user name */
$user = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT name FROM users WHERE id=$uid")
);

/* 🔹 Check profile completion */
$progress = 0;

// preferences
$pref = mysqli_query($conn, "SELECT id, city FROM preferences WHERE user_id=$uid");
$hasPref = mysqli_num_rows($pref) > 0;
if ($hasPref) $progress += 33;

// contact details
$contact = mysqli_query($conn, "SELECT id FROM contact_details WHERE user_id=$uid");
$hasContact = mysqli_num_rows($contact) > 0;
if ($hasContact) $progress += 33;

// accommodation (only for owner)
$hasAcc = false;
if ($role == 'owner') {
    $acc = mysqli_query($conn, "SELECT id FROM accommodation WHERE user_id=$uid");
    $hasAcc = mysqli_num_rows($acc) > 0;
    if ($hasAcc) $progress += 34;
} else {
    // seeker doesn’t need accommodation
    $progress += 34;
}

/* 🔹 City */
$city = "Not set";
if ($hasPref) {
    $p = mysqli_fetch_assoc($pref);
    $city = $p['city'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include "nav.php"; ?>

<div class="container">

    <!-- 👋 Welcome -->
    <h2>Welcome back, <?php echo $user['name']; ?> 👋</h2>
    <p style="text-align:center; font-size:14px; color:#666;">
        Let’s help you find the perfect roommate.
    </p>

    <!-- 📊 Profile Completion -->
    <h4 style="margin-top:20px;">Profile Completion: <?php echo $progress; ?>%</h4>
    <div class="progress-bar">
        <div class="progress-fill" style="width: <?php echo $progress; ?>%;"></div>
    </div>

    <!-- 📦 Info Cards -->
    <div class="card-grid">

        <div class="info-card">
            <h4>Role</h4>
            <p><?php echo ucfirst($role); ?></p>
        </div>

        <div class="info-card">
            <h4>City</h4>
            <p><?php echo $city; ?></p>
        </div>

        <div class="info-card">
            <h4>Matches</h4>
            <p>Top 5</p>
        </div>

    </div>

    <!-- ⚡ Quick Actions -->
    <a href="preferences.php"><button>Edit Preferences</button></a>

    <a href="contact_details.php">
        <button class="secondary-btn">Manage Contact Details</button>
    </a>

    <?php if ($role == 'owner') { ?>
        <a href="accommodation.php">
            <button class="secondary-btn">Edit Accommodation</button>
        </a>
    <?php } ?>

    <a href="find_matches.php">
        <button class="secondary-btn">Find Matches</button>
    </a>

    <!-- 🔒 Privacy Note -->
    <div class="privacy-box">
        🔒 Your contact details are visible only to matched users and only if you allow it.
    </div>

    <hr>

    <!-- 🚪 Logout & Delete -->
    <a href="logout.php">
        <button class="secondary-btn">Logout</button>
    </a>

    <a href="confirm_delete.php">
        <button class="danger-btn">Delete My Account</button>
    </a>

</div>

</body>
</html>
