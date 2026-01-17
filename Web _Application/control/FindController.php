<?php
require "../config/db.php";
require "../model/VoterModel.php";

$model = new VoterModel($conn);

if (isset($_POST['find'])) {
    $r = $model->findByNid($_POST['nid']);
    header("Location: ../view/auth/find.php?voter_id=" . $r['voter_id']);
}