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
            border-radius: 8px;
        }

        h2 {
            background: #007bff;
            color: white;
            padding: 10px;
        }

        button {
            padding: 8px 15px;
            background: black;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background: red;
        }
    </style>
</head>

<body>

    <div class="box">

        <h2>Welcome, <?= htmlspecialchars($voter['name']) ?></h2>

        <p><b>Voter ID:</b> <?= htmlspecialchars($voter['voter_id']) ?></p>
        <p><b>Area:</b> <?= htmlspecialchars($voter['zilla']) ?>, <?= htmlspecialchars($voter['upazila']) ?></p>

        <hr>

        <?php if ($setting['status'] !== 'on') { ?>

            <p style="color:red;"><b>Voting is not active.</b></p>

        <?php } elseif ($voter['has_voted']) { ?>

            <p style="color:green;"><b>You have already voted.</b></p>

        <?php } else { ?>

            <h3>Cast Your Vote</h3>

            <form method="post" action="../../control/VoteController.php">

                <?php
                $candidates = mysqli_query($conn, "SELECT * FROM candidates");
                while ($c = mysqli_fetch_assoc($candidates)) {
                    ?>
                    <input type="radio" name="candidate_id" value="<?= $c['id'] ?>" required>
                    <?= htmlspecialchars($c['candidate_name']) ?>
                    (<?= htmlspecialchars($c['party_name']) ?>)
                    <br>
                <?php } ?>

                <br>
                <button type="submit" name="vote">Submit Vote</button>
            </form>

        <?php } ?>

        <hr>

        <h3>Current Result</h3>
        <?php if ($winner) { ?>
            <p>
                Leading Candidate:
                <b><?= htmlspecialchars($winner['candidate_name']) ?></b>
                (<?= htmlspecialchars($winner['party_name']) ?>)
            </p>
        <?php } else { ?>
            <p>No votes yet.</p>
        <?php } ?>

        <hr>

        <a href="../../control/LogoutController.php">Logout</a>

    </div>

</body>

</html>