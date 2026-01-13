<?php
session_start();
require "../../config/db.php";
require "../../model/VoterModel.php";
require "../../model/VoteModel.php";
require "../../model/CandidateModel.php";

if (!isset($_SESSION['voter_id']))
    header("Location: ../auth/login.php");

$voterM = new VoterModel($conn);
$voteM = new VoteModel($conn);
$candM = new CandidateModel($conn);

$voter = $voterM->get($_SESSION['voter_id']);
$already = $voteM->alreadyVoted($voter['voter_id']);
$cands = $candM->byArea($voter['zilla'], $voter['upazila']);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
</head>

<body>

    <h2>Welcome <?= htmlspecialchars($voter['name']) ?></h2>
    <a href="../../control/LogoutController.php">Logout</a>

    <?php if ($already): ?>
        <p>You voted for: <?= $already['candidate_name'] ?></p>
    <?php endif; ?>

    <h3>Candidates</h3>

    <?php while ($c = mysqli_fetch_assoc($cands)): ?>
        <form method="post" action="../../control/VoteController.php">
            <input type="hidden" name="candidate_id" value="<?= $c['id'] ?>">
            <button <?= $already ? 'disabled' : '' ?>>Vote</button>
            <?= $c['candidate_name'] ?> (<?= $c['party_name'] ?>)
        </form>
    <?php endwhile; ?>

</body>

</html>