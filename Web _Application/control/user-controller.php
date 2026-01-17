<?php
session_start();
if ($_SESSION['role'] != 'voter')
    exit;

require "../config/db.php";
require "../model/VoterModel.php";
$m = new VoterModel($conn);
$uid = $_SESSION['user_id'];

if (isset($_POST['vote'])) {
    $v = $m->getById($uid);
    $s = $m->getSetting();
    if (!$v['has_voted'] && $s['status'] == 'on')
        $m->giveVote($uid, $_POST['candidate_id']);
}

$data = [
    'voter' => $m->getById($uid),
    'candidates' => $m->getCandidates(),
    'setting' => $m->getSetting(),
    'winner' => $m->getWinner()
];
require "../view/voter/user.php";