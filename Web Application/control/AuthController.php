<?php
session_start();
require "../config/db.php";
require "../model/VoterModel.php";

$model = new VoterModel($conn);

/* LOGIN */
if (isset($_POST['login'])) {
    $u = $model->login($_POST['voter_id'], $_POST['nid']);
    if ($u) {
        $_SESSION['voter_id'] = $u['voter_id'];
        header("Location: ../view/voter/dashboard.php");
    } else {
        header("Location: ../view/auth/login.php?error=1");
    }
}

/* REGISTER */
if (isset($_POST['register'])) {
    do {
        $vid = str_pad(rand(0, 999999), 6, "0", STR_PAD_LEFT);
    } while ($model->get($vid));

    $_POST['voter_id'] = $vid;
    $model->register($_POST);

    header("Location: ../view/auth/login.php?success=1&voter_id=$vid");
}