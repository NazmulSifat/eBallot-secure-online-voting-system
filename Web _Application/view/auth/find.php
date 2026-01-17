<?php
$voter_id = $_GET['voter_id'] ?? "";
?>
<!DOCTYPE html>
<html>

<head>
    <title>Find Voter ID</title>
    <style>
        body {
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
            background-image: url("../../Assest/find1.png");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }

        .box {
            width: 420px;
            padding: 30px;
            border-radius: 10px;
            margin-top: 150px;
        }

        h1 {
            text-align: center;
            margin-bottom: 8px;
        }

        p {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
            font-size: 14px;
        }

        input {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
        }

        button {
            width: 100%;
            padding: 12px;
            margin-top: 12px;
            background: #000;
            color: #fff;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-size: 15px;
        }

        button:hover {
            background: #333;
        }

        .ok {
            background: #eaffea;
            color: #0a6b0a;
            padding: 10px;
            border-radius: 8px;
            margin-top: 12px;
            text-align: center;
            font-size: 14px;
        }

        .err {
            background: #ffe6e6;
            color: #a00000;
            padding: 10px;
            border-radius: 8px;
            margin-top: 12px;
            text-align: center;
            font-size: 14px;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 14px;
            text-decoration: none;
            font-weight: bold;
            color: #000;
        }
    </style>
</head>

<body>

    <div class="box">
        <h1>ভোটার আইডি অনুসন্ধান</h1>
        <p>এনআইডি নম্বর প্রদান করে আপনার ভোটার আইডি জানুন</p>


        <form method="post" action="../../control/FindController.php">
            <input type="text" name="nid" placeholder="NID (10-17 digits)" required>
            <button type="submit" name="find">Find Voter ID</button>
        </form>


        <?php if ($voter_id): ?>
            <div class="ok">
                Your Voter ID: <b><?php echo htmlspecialchars($voter_id); ?></b>
            </div>
        <?php endif; ?>

        <a href="login.php">Back to Login</a>
    </div>

</body>

</html>