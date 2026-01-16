<?php
session_start();

require "../config/db.php";
require "../model/VoterModel.php";
require "../model/voter-voteModel.php";

if (!isset($_SESSION['voter_id'])) {
    header("Location: ../view/auth/login.php");
    exit;
}

$voterModel = new VoterModel($conn);
$voteModel = new VoterVoteModel($conn);

$voter = $voterModel->get($_SESSION['voter_id']);

$setting = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT * FROM voting_settings WHERE id=1")
);

$winner = $voteModel->winner();

require "../view/voter/voter-dashboard.php";