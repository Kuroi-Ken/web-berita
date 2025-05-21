<?php
session_start();

$valid_user = "admin";
$valid_pass = "123456";

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if ($username === $valid_user && $password === $valid_pass) {
    $_SESSION['username'] = $username;
    header("Location: ../index.php"); 
    exit();
} else {
    echo "<script>
      alert('Login gagal. Username atau password salah!');
      window.location.href = '../login.php'; // Asumsi login.php ada di root relatif terhadap direktori php
    </script>";
}
?>