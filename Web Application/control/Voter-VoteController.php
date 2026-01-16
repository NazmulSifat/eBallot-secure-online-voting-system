<?php
session_start();

require "../config/db.php";
require "../model/VoterModel.php";
require "../model/voter-voteModel.php";

/* ---------- AUTH CHECK ---------- */
if (!isset($_SESSION['voter_id'])) {
    header("Location: ../view/auth/login.php");
    exit;
}

/* ---------- MODELS ---------- */
$voterModel = new VoterModel($conn);
$voteModel = new VoterVoteModel($conn);

/* ---------- FETCH VOTER ---------- */
$voter = $voterModel->get($_SESSION['voter_id']);

if (!$voter) {
    header("Location: ../view/auth/login.php");
    exit;
}

/* ---------- FETCH VOTING STATUS ---------- */
$setting = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT status FROM voting_settings WHERE id=1")
);

/* ---------- VOTE SUBMIT ---------- */
if (
    isset($_POST['candidate_id']) &&
    !$voter['has_voted'] &&
    $setting &&
    $setting['status'] === 'on'
) {

    // Save vote
    $voteModel->vote($voter['voter_id'], $_POST['candidate_id']);

    // Mark voter as voted
    mysqli_query(
        $conn,
        "UPDATE voters 
         SET has_voted = 1 
         WHERE voter_id = '{$voter['voter_id']}'"
    );
}

/* ---------- REDIRECT BACK TO DASHBOARD ---------- */
header("Location: VoteController.php");
exit;