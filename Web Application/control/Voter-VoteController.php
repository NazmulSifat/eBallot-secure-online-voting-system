<?php
session_start();

ini_set('display_errors', 1);
error_reporting(E_ALL);

require "../config/db.php";
require "../model/VoterModel.php";
require "../model/VoteModel.php";

/* ---------- AUTH CHECK ---------- */
if (!isset($_SESSION['voter_id'])) {
    header("Location: ../view/auth/login.php");
    exit;
}

$voterModel = new VoterModel($conn);
$voteModel = new VoteModel($conn);

$voter = $voterModel->get($_SESSION['voter_id']);
$setting = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT * FROM voting_settings WHERE id=1")
);

/* ---------- VOTE SUBMIT ---------- */
if (isset($_POST['vote'])) {

    if ($voter['has_voted'] == 1) {
        header("Location: ../view/voter/voter-dashboard.php?voted=1");
        exit;
    }

    if ($setting['status'] !== 'on') {
        die("Voting is closed");
    }

    $candidate_id = $_POST['candidate_id'];

    $voteModel->vote($voter['voter_id'], $candidate_id);

    mysqli_query(
        $conn,
        "UPDATE voters SET has_voted=1 WHERE voter_id='{$voter['voter_id']}'"
    );

    header("Location: ../view/voter/voter-dashboard.php?voted=1");
    exit;
}

/* ---------- RESULT ---------- */
$winner = $voteModel->winner();

/* ---------- LOAD VIEW ---------- */
require "../view/voter/voter-dashboard.php";