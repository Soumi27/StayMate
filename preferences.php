<?php
session_start();
include "db.php";

if (!isset($_SESSION['uid'])) {
    header("Location: login.php");
    exit();
}

$uid = $_SESSION['uid'];

if (isset($_POST['save'])) {
    mysqli_query($conn,"
        REPLACE INTO preferences
    (user_id, city, sleep_time, cleanliness, study_habit, food_habit, smoking)
    VALUES
    ('$uid','{$_POST['city']}','{$_POST['sleep']}','{$_POST['clean']}',
     '{$_POST['study']}','{$_POST['food']}','{$_POST['smoke']}')
    ");
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Preferences</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include "nav.php"; ?>

<div class="container">
    <h2>Set Your Preferences</h2>

    <form method="post">
      <label>City</label>
        <input type="text" name="city" placeholder="e.g. Pune" required>

        <label>Sleep Time</label>
        <select name="sleep" required>
            <option value="">Select</option>
            <option>Early</option>
            <option>Late</option>
        </select>

        <label>Cleanliness (1–5)</label>
        <input type="number" name="clean" min="1" max="5" required>

        <label>Study Habit</label>
        <select name="study" required>
            <option>Quiet</option>
            <option>Moderate</option>
            <option>Loud</option>
        </select>

        <label>Food Habit</label>
        <select name="food" required>
            <option>Veg</option>
            <option>Non-Veg</option>
        </select>

        <label>Smoking</label>
        <select name="smoke" required>
            <option>No</option>
            <option>Yes</option>
        </select>


        <button name="save">Save Preferences</button>
    </form>

    <a href="dashboard.php">
        <button class="secondary-btn">Return to Dashboard</button>
    </a>
</div>

</body>
</html>

