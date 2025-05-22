<?php
session_start();
require_once __DIR__ . '/config/database.php';

$username = $_POST['username'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$confirm_password = $_POST['confirm_password'] ?? '';

$errors = [];

if (empty($username)) {
    $errors[] = "Username harus diisi!";
} elseif (strlen($username) < 3) {
    $errors[] = "Username minimal 3 karakter!";
}

if (empty($email)) {
    $errors[] = "Email harus diisi!";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Format email tidak valid!";
}

if (empty($password)) {
    $errors[] = "Password harus diisi!";
} elseif (strlen($password) < 6) {
    $errors[] = "Password minimal 6 karakter!";
}

if ($password !== $confirm_password) {
    $errors[] = "Konfirmasi password tidak cocok!";
}

if (!empty($errors)) {
    $errorMessage = implode("\\n", $errors);
    echo "<script>
        alert('$errorMessage');
        window.location.href = 'register.php';
    </script>";
    exit();
}

try {
    $db = getDB();

    $sql = "SELECT id FROM users WHERE username = :username";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    if ($stmt->fetch()) {
        echo "<script>
            alert('Username sudah digunakan!');
            window.location.href = 'register.php';
        </script>";
        exit();
    }

    $sql = "SELECT id FROM users WHERE email = :email";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->fetch()) {
        echo "<script>
            alert('Email sudah terdaftar!');
            window.location.href = 'register.php';
        </script>";
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, email, password, created_at) VALUES (:username, :email, :password, NOW())";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $hashedPassword);

    if ($stmt->execute()) {
        echo "<script>
            alert('Registrasi berhasil! Silakan login.');
            window.location.href = 'login.php';
        </script>";
    } else {
        throw new Exception("Gagal menyimpan data user");
    }
} catch (PDOException $e) {
    echo "<script>
        alert('Terjadi kesalahan sistem. Silakan coba lagi.');
        window.location.href = 'register.php';
    </script>";
    error_log("Registration error: " . $e->getMessage());
} catch (Exception $e) {
    echo "<script>
        alert('Terjadi kesalahan: " . $e->getMessage() . "');
        window.location.href = 'register.php';
    </script>";
    error_log("Registration error: " . $e->getMessage());
}