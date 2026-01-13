<?php
session_start();
require "../config/db.php";
require "../model/VoterModel.php";
require "../model/VoteModel.php";

$voter = new VoterModel($conn);
$vote = new VoteModel($conn);

$v = $voter->get($_SESSION['voter_id']);

if (!$vote->alreadyVoted($v['voter_id'])) {
    $vote->vote($v['voter_id'], $_POST['candidate_id']);
}

header("Location: ../view/voter/dashboard.php?voted=1");