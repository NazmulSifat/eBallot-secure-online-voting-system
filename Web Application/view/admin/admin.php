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

        td,
        th {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center
        }
    </style>
</head>

<body>

    <div class="box">
        <h2>Admin Panel</h2>

        <!-- ADD CANDIDATE -->
        <h3>Add Candidate</h3>
        <form method="post" enctype="multipart/form-data" action="../../controllers/AdminController.php">
            <input type="text" name="name" placeholder="Candidate Name" required>
            <input type="text" name="party" placeholder="Party Name" required>
            <input type="file" name="symbol" required>
            <button name="add_candidate">Add</button>
        </form>

        <!-- CANDIDATE LIST -->
        <h3>Candidate List</h3>
        <table>
            <tr>
                <th>Symbol</th>
                <th>Name</th>
                <th>Party</th>
                <th>Action</th>
            </tr>

            <tr>
                <td>
                    <img src="../../uploads/<?= $c['symbol'] ?>" width="40">
                </td>

                <td>
                    <a href="../../controllers/AdminController.php?del=<?= $c['id'] ?>">
                        Delete
                    </a>
                </td>
            </tr>

        </table>

        <!-- VOTING CONTROL -->
        <h3>Voting Control</h3>


        <form method="post" action="../../controllers/AdminController.php">
            <button name="start">Start Voting</button>
            <button name="stop">Stop Voting</button>
        </form>

        <!-- VOTER LIST -->
        <h3>Voter List</h3>
        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Voted?</th>
            </tr>




        </table>

        <!-- WINNER -->


        <a href="../../logout.php">Logout</a>
    </div>

</body>

</html>