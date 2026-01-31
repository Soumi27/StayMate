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
        REPLACE INTO contact_details VALUES (
            NULL,
            '$uid',
            '{$_POST['phone']}',
            '{$_POST['email']}',
            '{$_POST['whatsapp']}',
            '{$_POST['visible']}'
        )
    ");

    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact Details</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include "nav.php"; ?>

<div class="container">
    <h2>Contact Preferences</h2>

    <p style="font-size:14px; color:#555;">
        These details will be visible only to your matched roommates.
        At least one contact method is mandatory.
    </p>

    <form method="post">
        <input type="text" name="phone" placeholder="Phone Number (optional)">
        <input type="email" name="email" placeholder="Email (optional)">
        <input type="text" name="whatsapp" placeholder="WhatsApp Number (optional)">

        <label>Who can see your contact details?</label>
        <select name="visible" required>
            <option value="yes">Only matched users</option>
            <option value="no">Hide my contact details</option>
        </select>

        <button name="save">Save Contact Details</button>
    </form>

    <a href="dashboard.php">
        <button class="secondary-btn">Return to Dashboard</button>
    </a>
</div>

</body>
</html>
