<?php
if (!isset($voter) || !isset($setting)) {
    die("Direct access not allowed");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Voter Dashboard</title>
    <style>
        body {
            font-family: Arial;
            background: #eef2f3;
        }

        .box {
            width: 700px;
            margin: 40px auto;
            background: #fff;
            padding: 20px;
        }

        h2 {
            background: #007bff;
            color: #fff;
            padding: 10px;
        }

        button {
            padding: 8px 15px;
            background: black;
            color: white;
            border: none;
        }
    </style>
</head>

<body>
    <div class="box">

        <h2>Welcome, <?= htmlspecialchars($voter['name']) ?></h2>

        <p><b>Voter ID:</b> <?= $voter['voter_id'] ?></p>
        <p><b>Area:</b> <?= $voter['zilla'] ?>, <?= $voter['upazila'] ?></p>

        <hr>

        <?php if ($setting['status'] !== 'on') { ?>

            <p style="color:red;">Voting is not active.</p>

        <?php } elseif ($voter['has_voted']) { ?>

            <p style="color:green;">You have already voted.</p>

        <?php } else { ?>

            <form method="post" action="../../control/voter-voteController.php">

                <?php
                $candidates = mysqli_query($conn, "SELECT * FROM candidates");
                while ($c = mysqli_fetch_assoc($candidates)) {
                    ?>
                    <input type="radio" name="candidate_id" value="<?= $c['id'] ?>" required>
                    <?= $c['candidate_name'] ?> (<?= $c['party_name'] ?>)<br>
                <?php } ?>

                <br>

                <button type="submit" name="vote">Submit Vote</button>

            </form>

        <?php } ?>

        <hr>

        <h3>Current Result</h3>
        <?php if ($winner) { ?>
            <p>
                Leading:
                <b><?= $winner['candidate_name'] ?></b>
                (<?= $winner['party_name'] ?>)
            </p>
        <?php } else { ?>
            <p>No votes yet.</p>
        <?php } ?>

        <hr>

        <a href="../../control/LogoutController.php">Logout</a>

    </div>
</body>

</html>