<!DOCTYPE html>
<html>

<head>
    <title>Voter Dashboard</title>
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

        h2 {
            background: green;
            color: #fff;
            padding: 10px
        }
    </style>
</head>

<body>

    <div class="box">
        <h2>Welcome, <?= $data['voter']['name'] ?></h2>

        <!-- VOTING SECTION -->
        <?php if ($data['setting']['status'] != 'on') { ?>

            <p><b>Voting is not active.</b></p>

        <?php } elseif ($data['voter']['has_voted']) { ?>

            <p><b>You have already voted.</b></p>

        <?php } else { ?>

            <form method="post">
                <h3>Cast Your Vote</h3>

                <?php while ($c = mysqli_fetch_assoc($data['candidates'])) { ?>
                    <input type="radio" name="candidate_id" value="<?= $c['id'] ?>" required>
                    <?= $c['candidate_name'] ?>
                    (<?= $c['party_name'] ?>)
                    <br>
                <?php } ?>

                <br>
                <button name="vote">Submit Vote</button>
            </form>

        <?php } ?>

        <!-- RESULT -->
        <hr>
        <h3>Current Winner</h3>
        <?php if ($data['winner']) { ?>
            <b><?= $data['winner']['candidate_name'] ?></b>
            (<?= $data['winner']['party_name'] ?>)
        <?php } else { ?>
            <p>No votes yet.</p>
        <?php } ?>

        <br><br>
        <a href="../../control/LogoutController.php">Logout</a>
    </div>

</body>

</html>