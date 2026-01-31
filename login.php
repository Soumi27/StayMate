<?php
session_start();
include "db.php";

$error = "";

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass  = $_POST['password'];

    $res = mysqli_query($conn,
        "SELECT * FROM users WHERE email='$email' AND password='$pass'"
    );

    if (mysqli_num_rows($res) == 1) {
        $u = mysqli_fetch_assoc($res);
        $_SESSION['uid']  = $u['id'];
        $_SESSION['role'] = $u['role'];
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid email or password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>User Login</h2>

    <!-- ❌ Error Message -->
    <?php if ($error != "") { ?>
        <p style="color:red; text-align:center; margin-bottom:15px;">
            <?php echo $error; ?>
        </p>
    <?php } ?>

    <form method="post">
        <input 
            type="email" 
            name="email" 
            placeholder="Email Address" 
            required
        >

        <input 
            type="password" 
            name="password" 
            placeholder="Password" 
            required
        >

        <button type="submit" name="login">Login</button>
    </form>

    <div class="link">
        New user?
        <a href="register.php">Register here</a>
    </div>
</div>

</body>
</html>
