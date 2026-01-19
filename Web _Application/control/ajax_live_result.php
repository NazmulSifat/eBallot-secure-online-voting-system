<?php
require "../config/db.php";

$sql = "
SELECT c.candidate_name, c.party_name, COUNT(v.id) AS votes
FROM candidates c
LEFT JOIN votes v ON c.id = v.candidate_id
GROUP BY c.id
ORDER BY votes DESC
";

$result = mysqli_query($conn, $sql);
?>

<table border="1" width="100%" cellpadding="6">
    <tr>
        <th>Name</th>
        <th>Party</th>
        <th>Votes</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td>
                <?= htmlspecialchars($row['candidate_name']) ?>
            </td>
            <td>
                <?= htmlspecialchars($row['party_name']) ?>
            </td>
            <td>
               <?= $row['votes'] ?>
            </td>
        </tr>
    <?php } ?>
</table>