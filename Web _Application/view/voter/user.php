<!DOCTYPE html>
<html>

<head>
    <title>Voter Dashboard</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        /* HEADER */
        .eci-header {
            background: #006651;
            padding: 35px 0;
            /* 🔥 header মোটা */
            display: flex;
            align-items: center;
            justify-content: center;


        }

        .eci-header h1 {
            margin: 0;
            font-size: 38px;
            /* 🔥 লেখা বড় */
            font-weight: 700;
            color: #000;
            line-height: 1.3;
        }


        /* MAIN BOX */
        .box {
            width: 85%;
            margin: 40px auto;
            background: #ffffff;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
        }

        h2 {
            margin-top: 0;
            color: #333;
        }

        /* INFO */
        .info-text {
            font-weight: bold;
            color: red;
        }

        /* TABLE */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th {
            text-align: left;
            padding: 12px;
            border-bottom: 2px solid #ddd;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #eee;
        }

        /* BUTTON */
        .vote-btn {
            background: #26a69a;
            color: white;
            border: none;
            padding: 8px 22px;
            cursor: pointer;
            border-radius: 3px;
            font-weight: bold;
        }

        .vote-btn:hover {
            background: #2bbbad;
        }

        /* WINNER */
        .winner {
            background: #f4fff4;
            border: 1px solid #c8e6c9;
            padding: 15px;
            border-radius: 4px;
            margin-top: 20px;
        }

        a {

            /*
            display: inline-block;
            margin-top: 25px;
            text-decoration: none;
            color: #006400;
            font-weight: bold;

            */
            position: absolute;
            top: 180px;
            left: 1720px;
            color: #f40505;
        }


        .logo-container {

            position: absolute;
            top: 10px;
            left: 600px;
        }

        .logo {
            width: 100px;
        }
    </style>
</head>

<body>

    <!-- HEADER -->
    <div class="eci-header">
        <h1>বাংলাদেশ নির্বাচন কমিশন</h1>
    </div>

    <div class="logo-container">
        <img src="../Assest/elc.png" alt="Logo" class="logo">
    </div>

    <div class="box">

        <h2>স্বাগতম, <?= $data['voter']['name'] ?></h2>

        <!-- VOTING SECTION -->
        <?php if ($data['setting']['status'] != 'on') { ?>

            <p class="info-text">Voting is not active.</p>

        <?php } elseif ($data['voter']['has_voted']) { ?>

            <p class="info-text">You have already voted.</p>

        <?php } else { ?>

            <p>
                আপনাকে ভোটার ড্যাশবোর্ডে স্বাগতম। গণতন্ত্রের এই গুরুত্বপূর্ণ প্রক্রিয়ায়
                অংশগ্রহণ করার জন্য আপনাকে ধন্যবাদ।
            </p>

            <h4>🗳️ ভোট দেওয়ার নির্দেশনা</h4>

            <ul>
                <li>তালিকাভুক্ত প্রার্থীদের নাম ও দল ভালোভাবে যাচাই করুন।</li>
                <li>আপনি যাকে ভোট দিতে চান, তার পাশে থাকা <b>VOTE</b> বোতামে ক্লিক করুন।</li>
                <li>একবার ভোট দেওয়ার পর পুনরায় ভোট দেওয়া যাবে না।</li>
                <li>ভোট দেওয়ার আগে নিশ্চিত হয়ে নিন, কারণ এটি চূড়ান্ত সিদ্ধান্ত।</li>
                <li>ভোট সফলভাবে সম্পন্ন হলে একটি নিশ্চিতকরণ বার্তা দেখানো হবে।</li>
            </ul>

            <p class="note">
                আপনার একটি ভোটই দেশ ও সমাজের ভবিষ্যৎ নির্ধারণে গুরুত্বপূর্ণ ভূমিকা রাখে।
                <br>
                <b>সচেতনভাবে ভোট দিন, গণতন্ত্রকে শক্তিশালী করুন।</b>
            </p>

            <table>
                <tr>
                    <th>Party</th>
                    <th>Candidate Name</th>
                    <th>Vote</th>
                </tr>

                <?php while ($c = mysqli_fetch_assoc($data['candidates'])) { ?>
                    <tr>
                        <td><?= $c['party_name'] ?></td>
                        <td><?= $c['candidate_name'] ?></td>
                        <td>
                            <form method="post">
                                <input type="hidden" name="candidate_id" value="<?= $c['id'] ?>">
                                <button name="vote" class="vote-btn">VOTE</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </table>

        <?php } ?>

        <!-- RESULT -->
        <h3>Current Winner</h3>

        <?php if ($data['winner']) { ?>
            <div class="winner">
                <b><?= $data['winner']['candidate_name'] ?></b>
                (<?= $data['winner']['party_name'] ?>)
            </div>
        <?php } else { ?>
            <p>No votes yet.</p>
        <?php } ?>


    </div>
    <a href="../../control/LogoutController1.php">Logout</a>

</body>

</html>