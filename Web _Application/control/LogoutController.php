<?php
session_start();

// Detect role before destroying session
$role = $_SESSION['role'] ?? null;

// Destroy session
session_unset();
session_destroy();

// Redirect based on role
if ($role === 'voter') {
    header("Location: ../view/auth/login.php");

} else {
    header("Location: ../view/auth/admin-login.php");
}
exit;