<?php
require "../../config/db.php";
require "../../model/CandidateModel.php";
$model = new CandidateModel($conn);
$list = $model->all();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin</title>
</head>

<body>

    <h2>Admin Panel</h2>

    <form method="post" action="../../control/AdminController.php">
        <input type="text" name="candidate_name" placeholder="Name" required>
        <input type="text" name="ballot_number" placeholder="Ballot" required>
        <input type="text" name="party_name" placeholder="Party" required>
        <input type="text" name="symbol" placeholder="Symbol">
        <input type="text" name="zilla" placeholder="Zilla" required>
        <input type="text" name="upazila" placeholder="Upazila" required>
        <button type="submit" name="add_candidate">Add</button>
    </form>

    <table border="1">
        <tr>
            <th>Name</th>
            <th>Action</th>
        </tr>
        <?php while ($c = mysqli_fetch_assoc($list)): ?>
            <tr>
                <td><?= $c['candidate_name'] ?></td>
                <td>
                    <a href="../../control/AdminController.php?del=<?= $c['id'] ?>">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

</body>

</html>