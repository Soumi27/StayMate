<?php
include "db.php";

$error = "";

if (isset($_POST['register'])) {

    $name  = $_POST['name'];
    $email = $_POST['email'];
    $pass  = $_POST['password'];
    $role  = $_POST['role'];

    // 🔍 Check if email already exists
    $check = mysqli_query($conn, "SELECT id FROM users WHERE email='$email'");

    if (mysqli_num_rows($check) > 0) {
        $error = "Email already registered. Please login instead.";
    } else {
        mysqli_query(
            $conn,
            "INSERT INTO users VALUES (NULL,'$name','$email','$pass','$role')"
        );

        // ✅ Redirect to login after successful registration
        header("Location: login.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>User Registration</h2>

    <!-- ❌ Error Message -->
    <?php if ($error != "") { ?>
        <p style="color:red; text-align:center; margin-bottom:15px;">
            <?php echo $error; ?>
        </p>
    <?php } ?>

    <form method="post">

        <input type="text" name="name" placeholder="Full Name" required>

        <input type="email" name="email" placeholder="Email Address" required>

        <input type="password" name="password" placeholder="Password" required>

        <select name="role" required>
            <option value="">Select Role</option>
            <option value="owner">Have Flat (Owner)</option>
            <option value="seeker">Need Flat (Seeker)</option>
        </select>

        <button type="submit" name="register">Register</button>
    </form>

    <!-- 🔗 Login Redirect -->
    <div class="link">
        Already registered?
        <a href="login.php">Login instead</a>
    </div>
</div>

</body>
</html>
