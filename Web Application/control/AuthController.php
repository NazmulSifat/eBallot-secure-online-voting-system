<?php
session_start();

ini_set('display_errors', 1);
error_reporting(E_ALL);

require "../config/db.php";
require "../model/VoterModel.php";
require "../model/admin-model.php";

/* ================= ADMIN LOGIN ================= */
if (isset($_POST['admin_login'])) {

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $adminModel = new AdminModel($conn);
    $admin = $adminModel->adminLogin($email);

    // SIMPLE PASSWORD CHECK (NO HASH)
    if ($admin && $password === $admin['password']) {

        $_SESSION['user_id'] = $admin['id'];
        $_SESSION['role'] = 'admin';

        header("Location: ../control/admin-controller.php");
        exit;

    } else {
        header("Location: ../view/auth/admin-login.php?error=1");
        exit;
    }
}


/* ================= VOTER LOGIN ================= */
$model = new VoterModel($conn);

if (isset($_POST['login'])) {

    $voter_id = trim($_POST['voter_id']);
    $nid = trim($_POST['nid']);

    $u = $model->login($voter_id, $nid);

    if ($u) {
        $_SESSION['voter_id'] = $u['voter_id'];

        // ✅ MUST match file name exactly
        header("Location: ../control/VoteController.php");
        exit;


    } else {
        header("Location: ../view/auth/login.php?error=1");
        exit;
    }
}


/* ================= VOTER REGISTER ================= */
if (isset($_POST['register'])) {

    if (
        empty($_POST['name']) ||
        empty($_POST['phone']) ||
        empty($_POST['nid']) ||
        empty($_POST['zilla']) ||
        empty($_POST['upazila'])
    ) {
        die("Required fields missing");
    }

    do {
        $vid = str_pad(rand(0, 999999), 6, "0", STR_PAD_LEFT);
    } while ($model->get($vid));

    $_POST['voter_id'] = $vid;

    $ok = $model->register($_POST);

    if ($ok) {
        header(
            "Location: ../view/auth/login.php?success=1&voter_id=" .
            urlencode($vid)
        );
        exit;
    } else {
        die("Registration failed. Database insert error.");
    }
}

/* ================= FALLBACK ================= */
die("Invalid request");