<!DOCTYPE html>
<html>

<head>
    <title>Admin Panel</title>
    <style>
        body {
            font-family: Arial;
            background: #f4f4f4
        }

        .box {
            width: 900px;
            margin: 30px auto;
            background: #fff;
            padding: 20px
        }

        table {
            width: 100%;
            border-collapse: collapse
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center
        }

        h2 {
            background: #007bff;
            color: #fff;
            padding: 10px
        }
    </style>
</head>

<body>

    <div class="box">
        <h2>Admin Panel</h2>

        <!-- ADD CANDIDATE -->
        <h3>Add Candidate</h3>
        <form method="post">
            <input type="text" name="candidate_name" placeholder="Candidate Name" required>
            <input type="text" name="party_name" placeholder="Party Name" required>
            <button name="add_candidate">Add</button>
        </form>


        <!-- CANDIDATE LIST -->
        <h3>Candidate List</h3>
        <table>
            <tr>
                <th>Name</th>
                <th>Party</th>
                <th>Action</th>
            </tr>
            <?php while ($c = mysqli_fetch_assoc($data['candidates'])) { ?>
                <tr>
                    <td><?= $c['candidate_name'] ?></td>
                    <td><?= $c['party_name'] ?></td>

                    <td>
                        <a href="?del_candidate=<?= $c['id'] ?>">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </table>

        <!-- VOTING CONTROL -->
        <h3>Voting Control</h3>
        <p>Status: <b><?= $data['setting']['status'] ?></b></p>
        <form method="post">
            <button name="start">Start Voting</button>
            <button name="stop">Stop Voting</button>
        </form>

        <!-- VOTER LIST -->
        <h3>Voter List</h3>
        <table>
            <tr>
                <th>Name</th>
                <th>Voter_ID</th>
                <th>Voted?</th>
            </tr>
            <?php while ($v = mysqli_fetch_assoc($data['voters'])) { ?>
                <tr>
                    <td><?= $v['name'] ?></td>
                    <td><?= $v['voter_id'] ?></td>
                    <td><?= $v['has_voted'] ? 'YES' : 'NO' ?></td>
                </tr>
            <?php } ?>
        </table>

        <!-- WINNER -->
        <h3>Winner</h3>
        <?php if ($data['winner']) { ?>
            <b><?= $data['winner']['name'] ?></b>
            (<?= $data['winner']['party'] ?>)
        <?php } ?>

        <br><br>
        <a href="../control/LogoutController.php">Logout</a>

    </div>

</body>

</html>