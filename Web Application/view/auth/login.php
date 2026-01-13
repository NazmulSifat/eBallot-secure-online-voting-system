<?php
session_start();
$error = isset($_GET['error']) ? "Invalid Voter ID or NID" : "";
$voter_id = $_GET['voter_id'] ?? "";
?>
<!DOCTYPE html>
<html>

<head>
    <title>Voter Login</title>
    <style>
        body {
            margin: 0;
            height: 100vh;
            font-family: Arial;
            background: #f4f4f4
        }

        .container {
            display: flex;
            height: 100vh
        }

        .form-box {
            width: 40%;
            display: flex;
            justify-content: center;
            align-items: center
        }

        .loginbox {
            width: 500px;
            padding: 50px
        }

        input,
        button {
            width: 100%;
            padding: 12px;
            margin: 8px 0
        }

        button {
            background: #000;
            color: #fff;
            border: none;
            border-radius: 25px
        }

        .err {
            background: #ffe6e6;
            padding: 10px
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="form-box">
            <div class="loginbox">
                <h1>ভোটার লগইন</h1>

                <?php if ($error): ?>
                    <div class="err"><?= $error ?></div>
                <?php endif; ?>

                <form method="post" action="../../control/AuthController.php">
                    <input type="hidden" name="login">
                    <input type="text" name="voter_id" value="<?= htmlspecialchars($voter_id) ?>" placeholder="Voter ID"
                        required>
                    <input type="text" name="nid" placeholder="NID" required>
                    <button type="submit">Login</button>
                </form>

                <p><a href="find.php">Find Voter ID</a></p>
                <p><a href="signup.php">Register</a></p>
            </div>
        </div>
    </div>
</body>

</html>