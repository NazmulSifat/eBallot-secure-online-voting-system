<!DOCTYPE html>
<html>

<head>
    <title>Voter Dashboard</title>




    <style>
        body {
            font-family: "Segoe UI", Arial, sans-serif;
            background: #e9ecef;
            margin: 0;
            padding: 0;
        }

        .box {
            width: 720px;
            margin: 50px auto;
            background: #ffffff;
            padding: 30px 40px;
            border: 1px solid #cfd4da;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            position: relative;
        }

        /* ballot paper header line */
        .box::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            height: 8px;
            width: 100%;
            background: linear-gradient(to right, #006400, #2e8b57);
        }

        h2 {
            background: #006400;
            color: #ffffff;
            padding: 12px 15px;
            margin: -30px -40px 20px -40px;
            text-align: center;
            font-size: 22px;
            letter-spacing: 0.5px;
        }

        h3 {
            margin-top: 25px;
            color: #333;
            border-bottom: 1px solid #ddd;
            padding-bottom: 6px;
        }

        p {
            font-size: 15px;
            color: #333;
        }

        /* voting options */
        form {
            margin-top: 15px;
        }

        input[type="radio"] {
            transform: scale(1.2);
            margin-right: 8px;
            cursor: pointer;
        }

        label {
            display: block;
            padding: 10px 12px;
            margin-bottom: 8px;
            border: 1px dashed #bbb;
            border-radius: 4px;
            cursor: pointer;
            transition: background 0.2s, border 0.2s;
        }

        label:hover {
            background: #f8f9fa;
            border-color: #006400;
        }

        button {
            margin-top: 15px;
            padding: 10px 22px;
            font-size: 15px;
            background: #006400;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background 0.2s;
        }

        button:hover {
            background: #004d00;
        }

        hr {
            margin: 30px 0;
            border: none;
            border-top: 1px solid #ccc;
        }

        /* winner section */
        .winner {
            background: #f4fff4;
            border: 1px solid #c8e6c9;
            padding: 12px;
            border-radius: 4px;
            font-size: 15px;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #006400;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
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