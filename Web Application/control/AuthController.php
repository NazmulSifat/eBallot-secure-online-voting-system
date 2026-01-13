<?php
session_start();

ini_set('display_errors', 1);
error_reporting(E_ALL);

require "../config/db.php";
require "../model/VoterModel.php";

$model = new VoterModel($conn);

/* ================= LOGIN ================= */
if (isset($_POST['login'])) {

    $voter_id = trim($_POST['voter_id']);
    $nid = trim($_POST['nid']);

    $u = $model->login($voter_id, $nid);

    if ($u) {
        $_SESSION['voter_id'] = $u['voter_id'];
        header("Location: ../view/voter/dashboard.php");
        exit;
    } else {
        header("Location: ../view/auth/login.php?error=1");
        exit;
    }
}

/* ================= REGISTER ================= */
if (isset($_POST['register'])) {

    /* basic safety check */
    if (
        empty($_POST['name']) ||
        empty($_POST['phone']) ||
        empty($_POST['nid']) ||
        empty($_POST['zilla']) ||
        empty($_POST['upazila'])
    ) {
        die("Required fields missing");
    }

    /* generate unique voter id */
    do {
        $vid = str_pad(rand(0, 999999), 6, "0", STR_PAD_LEFT);
    } while ($model->get($vid));

    /* add voter_id into POST */
    $_POST['voter_id'] = $vid;

    /* insert into database */
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