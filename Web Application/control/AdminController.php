<?php
require "../config/db.php";
require "../model/CandidateModel.php";

$model = new CandidateModel($conn);

if (isset($_POST['add_candidate'])) {
    $model->add($_POST);
}

if (isset($_GET['del'])) {
    $model->delete($_GET['del']);
}

header("Location: ../view/admin/admin.php");