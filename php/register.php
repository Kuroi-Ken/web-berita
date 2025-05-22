<?php
session_start();
// In a real application, you might want to prevent access to register.php if already logged in.
// For now, we'll allow it so users can create new accounts even if a session exists.
// if (isset($_SESSION['username'])) {
//   header("Location: ../index.php");
//   exit();
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="../css/register.css">
    <script src="https://unpkg.com/feather-icons"></script>
</head>

<body>
    <div class="container">
        <div class="register-box">
            <h1>Join Game News!</h1>
            <p>Create your account to get personalized news feeds and tournament updates.</p>

            <form action="process_registration.php" method="post">
                <input type="text" name="username" placeholder="Username" required>
                <input type="email" name="email" placeholder="Email" required>
                <div class="password-wrapper">
                    <input type="password" name="password" placeholder="Password" required>
                    <span class="toggle-password" onclick="togglePassword(this)">
                        <i data-feather="eye-off"></i>
                    </span>
                </div>
                <div class="password-wrapper">
                    <input type="password" name="confirm_password" placeholder="Confirm Password" required>
                    <span class="toggle-password" onclick="togglePassword(this)">
                        <i data-feather="eye-off"></i>
                    </span>
                </div>
                <button type="submit">Register</button>
            </form>

            <div class="divider">or register with</div>
            <div class="social-login">
                <button class="social"><i data-feather="chrome"></i></button>
                <button class="social"><i data-feather="facebook"></i></button>
            </div>

            <p class="login">Already have an account? <a href="login.php">Login here</a></p>
        </div>

        <div class="side-image">
            <img src="../assets/njir.jpg" alt="Illustration" />
            <p>Stay informed and never miss a beat<br><strong>with Game News</strong></p>
        </div>
    </div>

    <script>
    feather.replace();

    function togglePassword(element) {
        const passwordInput = element.previousElementSibling;
        const icon = element.querySelector('i');
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