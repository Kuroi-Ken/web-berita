<?php
session_start();
if (isset($_SESSION['username'])) {
  header("Location: index.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../css/login.css">
    <script src="https://unpkg.com/feather-icons"></script>
</head>

<body>
    <div class="container">
        <div class="login-box">
            <h1>Welcome back!</h1>
            <p>Simplify your workflow and boost your productivity with <strong>Game News</strong>. Get started for
                free.</p>

            <form action="auth.php" method="post">
                <input type="text" name="username" placeholder="Username" required>
                <div class="password-wrapper">
                    <input type="password" name="password" placeholder="Password" required>
                    <span class="toggle-password" onclick="togglePassword()">
                        <i data-feather="eye-off"></i>
                    </span>
                </div>
                <a href="#" class="forgot">Forgot Password?</a>
                <button type="submit">Login</button>
            </form>

            <div class="divider">or continue with</div>
            <div class="social-login">
                <button class="social"><i data-feather="github"></i></button>
                <button class="social"><i data-feather="apple"></i></button>
                <button class="social"><i data-feather="facebook"></i></button>
            </div>

            <p class="register">Not a member? <a href="#">Register now</a></p>
        </div>

        <div class="side-image">
            <img src="../assets/njir.jpg" alt="Illustration" />
            <p>Make your work easier and organized<br><strong>with Game News</strong></p>
        </div>
    </div>

    <script>
    feather.replace();

    function togglePassword() {
        const passwordInput = document.querySelector('input[name="password"]');
        const icon = document.querySelector('.toggle-password i');
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            icon.setAttribute("data-feather", "eye");
        } else {
            passwordInput.type = "password";
            icon.setAttribute("data-feather", "eye-off");
        }
        feather.replace();
    }
    </script>
</body>

</html>