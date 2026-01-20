<!DOCTYPE html>
<html>

<head>

    <title>Admin Dashboard</title>

    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            margin: 0;
            background: #f4f6f9;
        }

        .layout {
            display: flex;
            min-height: 100vh;
        }


        .sidebar {
            width: 220px;
            background: #0d6efd;
            color: #fff;
            padding: 20px;
        }

        .sidebar h2 {
            margin-bottom: 25px;
        }

        .sidebar a {
            display: block;
            color: #fff;
            text-decoration: none;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 8px;
        }

        .sidebar a.active,
        .sidebar a:hover {
            background: rgba(255, 255, 255, 0.2);
        }


        .main {
            flex: 1;
            padding: 30px;
        }

        .header {
            font-size: 24px;
            margin-bottom: 20px;
        }


        .section {
            display: none;
        }


        .card {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, .08);
        }


        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #f1f3f5;
            padding: 10px;
        }

        td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
            text-align: center;
        }

        /* Form */
        input {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-right: 8px;
        }

        button {
            padding: 8px 14px;
            border: none;
            border-radius: 5px;
            background: #0d6efd;
            color: #fff;
            cursor: pointer;
        }

        button.danger {
            background: #dc3545;
        }

        .delete {
            color: red;
            text-decoration: none;
        }
    </style>
</head>

<body>

    <div class="layout">

        <!-- Sidebar -->
        <div class="sidebar">
            <h2>eBallot Admin</h2>

            <a href="#" class="active" onclick="showSection('dashboard', this)">Dashboard</a>
            <a href="#" onclick="showSection('candidates', this)">Candidates</a>
            <a href="#" onclick="showSection('voters', this)">Voters</a>
            <a href="#" onclick="showSection('results', this)">Results</a>

            <a href="../control/LogoutController.php">Logout</a>
        </div>

        <div class="main">

            <div id="dashboard" class="section">
                <div class="header">Dashboard</div>

                <div class="card">
                    <h3>Live Result</h3>
                    <div id="liveResult">Loading...</div>
                </div>

                <div class="card">
                    <h3>Voting Control</h3>
                    Status: <b><?= $data['setting']['status'] ?></b>

                    <form method="post" style="margin-top:15px;">
                        <button name="start">Start Voting</button>
                        <button name="stop" class="danger">Stop Voting</button>
                    </form>
                </div>
            </div>


            <div id="candidates" class="section">
                <div class="header">Candidates</div>

                <div class="card">
                    <h3>Add Candidate</h3>
                    <form method="post">
                        <input type="text" name="candidate_name" placeholder="Candidate Name" required>
                        <input type="text" name="party_name" placeholder="Party Name" required>
                        <button name="add_candidate">Add</button>
                    </form>
                </div>

                <div class="card">
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
                                    <a class="delete" href="?del_candidate=<?= $c['id'] ?>">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>


            <div id="voters" class="section">
                <div class="header">Voters</div>

                <div class="card">
                    <table>
                        <tr>
                            <th>Name</th>
                            <th>Voter ID</th>
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
                </div>
            </div>


            <div id="results" class="section">
                <div class="header">Results</div>

                <div class="card">
                    <h3>Winner</h3>
                    <?php if ($data['winner']): ?>
                        <b><?= $data['winner']['candidate_name'] ?></b>
                        (<?= $data['winner']['party_name'] ?>)
                    <?php else: ?>
                        No result yet
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>

    <script>
        function showSection(id, el) {
            document.querySelectorAll('.section').forEach(sec => {
                sec.style.display = 'none';
            });

            const target = document.getElementById(id);
            if (target) target.style.display = 'block';

            document.querySelectorAll('.sidebar a').forEach(a => {
                a.classList.remove('active');
            });

            if (el) el.classList.add('active');
        }

        function loadLiveResult() {
            fetch("ajax_live_result.php")
                .then(res => res.text())
                .then(html => {
                    document.getElementById("liveResult").innerHTML = html;
                })
                .catch(err => {
                    document.getElementById("liveResult").innerHTML = "Live result load failed";
                    console.error(err);
                });
        }

        window.onload = function () {
            const firstLink = document.querySelector('.sidebar a');
            showSection('dashboard', firstLink);
            loadLiveResult();
            setInterval(loadLiveResult, 1000);
        };
    </script>



</body>

</html>