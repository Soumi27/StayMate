<?php
session_start();
if (!isset($_SESSION['uid'])) {
    header("Location: login.php");
    exit();
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
    <h2>Welcome to Dashboard</h2>

    <a href="preferences.php"><button>Edit Preferences</button></a>

    <?php if ($_SESSION['role'] == 'owner') { ?>
        <a href="accommodation.php"><button class="secondary-btn">Edit Accommodation</button></a>
    <?php } ?>

    <a href="find_matches.php"><button class="secondary-btn">Find Matches</button></a>
    <hr>
    <a href="contact_details.php">
    <button class="secondary-btn">Manage Contact Details</button>
</a>


<hr>

<a href="confirm_delete.php">
    <button class="secondary-btn">
        I found a roommate – Delete My Account
    </button>
</a>


</div>

</body>
</html>
