<!DOCTYPE html>
<html>

<head>
    <title>Voter Panel</title>
    <style>
        body {
            font-family: Arial;
            background: #eef2f3
        }

        .box {
            width: 700px;
            margin: 40px auto;
            background: #fff;
            padding: 20px
        }
    </style>
</head>

<body>

    <div class="box">
        <h2>Voter Panel</h2>

        <?php if ($voting['status'] != 'on') { ?>
            <p>Voting is not active.</p>

        <?php } elseif ($user['has_voted']) { ?>
            <p>You already voted.</p>

        <?php } else { ?>
            <form method="post" action="../../controllers/VoterController.php">
                <?php while ($c = mysqli_fetch_assoc($candidates)) { ?>
                    <input type="radio" name="candidate" value="<?= $c['id'] ?>" required>

                    <img src="../../uploads/<?= $c['symbol'] ?>" width="30">
                    <?= $c['name'] ?> (<?= $c['party'] ?>)
                    <br><br>
                <?php } ?>

                <button name="vote">Submit Vote</button>
            </form>
        <?php } ?>

        <!-- RESULT -->
        <?php if ($resultStatus['published'] == 'YES' && $winner) { ?>
            <h3>Result</h3>
            <p>Winner: <b><?= $winner['name'] ?></b></p>
        <?php } ?>

        <a href="../../logout.php">Logout</a>
    </div>

</body>

</html>