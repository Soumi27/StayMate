<?php
session_start();
include "db.php";

if (!isset($_SESSION['uid']) || $_SESSION['role'] != 'owner') {
    header("Location: dashboard.php");
    exit();
}

$uid = $_SESSION['uid'];

if (isset($_POST['add'])) {
    mysqli_query($conn,"
        INSERT INTO accommodation VALUES (
            NULL,
            '$uid',
            '{$_POST['location']}',
            '{$_POST['rent']}',
            '{$_POST['rooms']}'
        )
    ");
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Accommodation</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include "nav.php"; ?>

<div class="container">
    <h2>Accommodation Details</h2>

    <form method="post">
        <label>Location</label>
        <input 
          name="location" 
          placeholder="Area, City (e.g. Kothrud, Pune)" 
          required
        >
        <p style="font-size:13px;color:#666;">
          Enter locality and city to help seekers find nearby accommodation.
        </p><br>



        <label>Monthly Rent</label>
        <input type="number" name="rent" required>

        <label>Number of Rooms</label>
        <input type="number" name="rooms" required>

        <button name="add">Save Accommodation</button>
    </form>

    <a href="dashboard.php">
        <button class="secondary-btn">Return to Dashboard</button>
    </a>
</div>

</body>
</html>


