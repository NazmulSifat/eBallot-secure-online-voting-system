<?php
session_start();
require "../config/db.php";
require "../model/AdminModel.php";
require "../model/VoterModel.php";

/* ADMIN LOGIN */
if (isset($_POST['admin_login'])) {
    $m = new AdminModel($conn);
    $a = $m->adminLogin($_POST['email']);

    // ✅ plain text password check
    if ($a && $_POST['password'] === $a['password']) {
        $_SESSION['user_id'] = $a['id'];
        $_SESSION['role'] = 'admin';

        header("Location: admin-controller.php");
        exit;
    }

    header("Location: ../view/auth/admin-login.php?error=1");
    exit;
}


/* VOTER LOGIN */
if (isset($_POST['login'])) {
    $m = new VoterModel($conn);
    $u = $m->login($_POST['voter_id'], $_POST['nid']);
    if ($u) {
        $_SESSION['user_id'] = $u['id'];
        $_SESSION['role'] = 'voter';
        header("Location: user-controller.php");
        exit;
    }
    header("Location: ../view/auth/login.php?error=1");
    exit;
}

/* REGISTER */
if (isset($_POST['register'])) {
    $m = new VoterModel($conn);
    do {
        $vid = str_pad(rand(0, 999999), 6, "0", STR_PAD_LEFT);
    }
    while ($m->findByNid($vid));
    $_POST['voter_id'] = $vid;
    $m->register($_POST);
    header("Location: ../view/auth/login.php?voter_id=$vid");
    exit;
}