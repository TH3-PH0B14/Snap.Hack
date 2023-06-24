<?php
session_start();

// Check if user is already logged in
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
    header("Location: home.php");
    exit;
}

// Check if the form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $password = "123"; // Replace "your_password" with your actual password

    // Validate password
    if(isset($_POST['password']) && $_POST['password'] === $password){
        $_SESSION['loggedin'] = true;
        header("Location: home.php");
        exit;
    } else{
        if(empty($_POST['password'])){
            $login_error = "Password is required";
        } else {
            $login_error = "Invalid password";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="fav.png" type="image/png" />
</head>
<body>

    <div class="contain">
        <div class="snapchat-logo">
            <img src="snapchat-app-icon.svg" alt="Snapchat Ghost Icon">
        </div>

        <div class="login-challenge-frame">
                <h1 class="login-challenge-title">Log in to Snap.Hack</h1>
        </div>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-group">
            <label class="control-label">Password</label>
            <input type="password" class="form-control" value="" name="password" id="password">
        </div>
        <div style="margin:0 auto;text-align: center;">
                <button type="submit" class="btn">Next</button>
        </div>
    </div>

    <h3 class="by">❤️ Made by: Not3 & PH0B14</h3>

    <?php if(isset($login_error)) echo $login_error; ?>
</body>
</html>
