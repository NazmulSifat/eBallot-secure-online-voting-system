<?php
session_start();

require "../config/db.php";
require "../model/admin-model.php";


/* -------- ADMIN SECURITY -------- */
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: ../view/auth/admin-login.php");
    exit;
}

$model = new AdminModel($conn);

/* -------- HANDLE FORM / ACTION -------- */
if (isset($_POST['add_candidate'])) {
    $model->addCandidate(
        $_POST['candidate_name'],
        $_POST['party_name']
    );
}


if (isset($_GET['del_candidate'])) {
    $model->deleteCandidate($_GET['del_candidate']);
}

if (isset($_POST['start'])) {
    $model->startVoting();
}

if (isset($_POST['stop'])) {
    $model->stopVoting();
}

/* -------- DATA FOR VIEW -------- */
$data = [
    'setting' => $model->getSetting(),
    'candidates' => $model->getCandidates(),
    'voters' => $model->getVoters(),
    'winner' => $model->getWinner()
];

/* -------- LOAD VIEW -------- */

require "../view/admin/admin.php";