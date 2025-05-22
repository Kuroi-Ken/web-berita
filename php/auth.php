<?php
session_start();
require_once __DIR__ . '/config/database.php';

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if (empty($username) || empty($password)) {
  echo "<script>
        alert('Username dan password harus diisi!');
        window.location.href = 'login.php';
    </script>";
  exit();
}

try {
  $db = getDB();

  $sql = "SELECT id, username, email, password, full_name FROM users 
            WHERE (username = :username OR email = :username) AND is_active = 1";

  $stmt = $db->prepare($sql);
  $stmt->bindParam(':username', $username);
  $stmt->execute();

  $user = $stmt->fetch();

  if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['full_name'] = $user['full_name'];

    header("Location: ../index.php");
    exit();
  } else {
    echo "<script>
            alert('Username/Email atau password salah!');
            window.location.href = 'login.php';
        </script>";
  }
} catch (PDOException $e) {
  echo "<script>
        alert('Terjadi kesalahan sistem. Silakan coba lagi.');
        window.location.href = 'login.php';
    </script>";
  error_log("Login error: " . $e->getMessage());
}