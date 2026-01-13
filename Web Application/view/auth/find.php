<?php $voter_id = $_GET['voter_id'] ?? ""; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Find Voter</title>
</head>

<body>
    <h1>Find Voter ID</h1>

    <form method="post" action="../../control/FindController.php">
        <input type="text" name="nid" placeholder="Enter NID" required>
        <button type="submit" name="find">Find</button>
    </form>

    <?php if ($voter_id): ?>
        <p>Your Voter ID: <b><?= $voter_id ?></b></p>
    <?php endif; ?>

    <a href="login.php">Back</a>
</body>

</html>