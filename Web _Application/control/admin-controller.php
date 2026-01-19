<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../view/auth/admin-login.php");
    exit;
}

require "../config/db.php";
require "../model/AdminModel.php";

$m = new AdminModel($conn);

/* delete candidate */
if (isset($_GET['del_candidate'])) {
    $m->deleteCandidate($_GET['del_candidate']);

    //  important line for bugs that solved 
    header("Location: admin-controller.php");
    exit;
}

/*add candidate */
if (isset($_POST['add_candidate'])) {
    $m->addCandidate($_POST['candidate_name'], $_POST['party_name']);


    header("Location: admin-controller.php");
    exit;
}

/*voting control */
if (isset($_POST['start'])) {
    $m->startVoting();
    header("Location: admin-controller.php");
    exit;
}

if (isset($_POST['stop'])) {
    $m->stopVoting();
    header("Location: admin-controller.php");
    exit;
}

/*load data */
$data = [
    'setting' => $m->getSetting(),
    'candidates' => $m->getCandidates(),
    'voters' => $m->getVoters(),
    'winner' => $m->getWinner()
];

require "../view/admin/admin.php";