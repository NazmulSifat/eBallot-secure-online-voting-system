<?php
session_start();
if ($_SESSION['role'] != 'admin')
    exit;

require "../config/db.php";
require "../model/AdminModel.php";
$m = new AdminModel($conn);

if (isset($_POST['add_candidate']))
    $m->addCandidate($_POST['candidate_name'], $_POST['party_name']);

if (isset($_GET['del_candidate']))
    $m->deleteCandidate($_GET['del_candidate']);

if (isset($_POST['start']))
    $m->startVoting();
if (isset($_POST['stop']))
    $m->stopVoting();

$data = [
    'setting' => $m->getSetting(),
    'candidates' => $m->getCandidates(),
    'voters' => $m->getVoters(),
    'winner' => $m->getWinner()
];
require "../view/admin/admin.php";