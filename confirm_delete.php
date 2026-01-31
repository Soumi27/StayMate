<?php
session_start();
include "db.php";

if (!isset($_SESSION['uid'])) {
    header("Location: login.php");
    exit();
}

$error = "";

if (isset($_POST['confirm'])) {
    $uid = $_SESSION['uid'];
    $password = $_POST['password'];

    // verify password
    $res = mysqli_query($conn,
        "SELECT id FROM users WHERE id=$uid AND password='$password'"
    );

    if (mysqli_num_rows($res) == 1) {
        header("Location: delete_account.php");
        exit();
    } else {
        $error = "Incorrect password. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Confirm Account Deletion</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include "nav.php"; ?>

<div class="container">
    <h2>Confirm Account Deletion</h2>

    <p style="font-size:14px; color:#555; text-align:center;">
        Please enter your password to confirm account deletion.
    </p>

    <?php if ($error != "") { ?>
        <p style="color:red; text-align:center;"><?php echo $error; ?></p>
    <?php } ?>

    <form method="post">
        <input 
            type="password" 
            name="password" 
            placeholder="Enter your password" 
            required
        >

        <button name="confirm">Confirm & Delete</button>
    </form>

    <a href="dashboard.php">
        <button class="secondary-btn">Cancel</button>
    </a>
</div>

</body>
</html>
