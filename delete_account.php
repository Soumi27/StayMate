<?php
session_start();
include "db.php";

if (!isset($_SESSION['uid'])) {
    header("Location: login.php");
    exit();
}

$uid = $_SESSION['uid'];

// delete related data
mysqli_query($conn, "DELETE FROM preferences WHERE user_id=$uid");
mysqli_query($conn, "DELETE FROM accommodation WHERE user_id=$uid");
mysqli_query($conn, "DELETE FROM contact_details WHERE user_id=$uid");

// delete user
mysqli_query($conn, "DELETE FROM users WHERE id=$uid");

// destroy session
session_destroy();

// redirect to goodbye page
header("Location: goodbye.php");
exit();
