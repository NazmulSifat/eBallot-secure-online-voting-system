<?php
session_start();

require "../config/db.php";
require "../model/VoterModel.php";
require "../model/Voter-VoteModel.php";

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
/* ---------- VOTE SUBMIT ---------- */
if (isset($_POST['vote']) && $voter['has_voted'] == 0 && $setting['status'] == 'on') {

    $cid = $_POST['candidate_id'];
    $uid = $_SESSION['voter_id']; // voters.id

    // insert vote
    mysqli_query(
        $conn,
        "INSERT INTO votes (voter_id, candidate_id)
         VALUES ('$uid', '$cid')"
    );

    // mark voter as voted
    mysqli_query(
        $conn,
        "UPDATE voters SET has_voted = 1 WHERE id = '$uid'"
    );

    header("Location: ../control/VoterController.php");
    exit;
}


/* ---------- REDIRECT BACK TO DASHBOARD ---------- */
header("Location: VoteController.php");
exit;