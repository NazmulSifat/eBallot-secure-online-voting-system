<?php
session_start();
require_once "db.php";

$response = ["status" => "error"];

$name = trim($_POST['name'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$nid = trim($_POST['nid'] ?? '');
$zilla = trim($_POST['zilla'] ?? '');
$upazila = trim($_POST['upazila'] ?? '');

if ($name == '' || $phone == '' || $nid == '' || $zilla == '' || $upazila == '') {
    $response["message"] = "All fields are required";
    $_SESSION['reg_json'] = json_encode($response);
    header("Location: signup.php");
    exit();
}

/* check nid */
$stmt = mysqli_prepare($conn, "SELECT id FROM voters WHERE nid=?");
mysqli_stmt_bind_param($stmt, "s", $nid);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($res) > 0) {
    $response["message"] = "This NID is already registered";
    $_SESSION['reg_json'] = json_encode($response);
    header("Location: signup.php");
    exit();
}

/* generate voter id */
do {
    $voter_id = str_pad((string) random_int(0, 999999), 6, "0", STR_PAD_LEFT);
    $chk = mysqli_prepare($conn, "SELECT id FROM voters WHERE voter_id=?");
    mysqli_stmt_bind_param($chk, "s", $voter_id);
    mysqli_stmt_execute($chk);
    $r = mysqli_stmt_get_result($chk);
} while (mysqli_num_rows($r) > 0);

/* insert */
$ins = mysqli_prepare(
    $conn,
    "INSERT INTO voters (voter_id,name,phone,nid,zilla,upazila)
     VALUES (?,?,?,?,?,?)"
);
mysqli_stmt_bind_param(
    $ins,
    "ssssss",
    $voter_id,
    $name,
    $phone,
    $nid,
    $zilla,
    $upazila
);

if (mysqli_stmt_execute($ins)) {

    $_SESSION['registered_voter_id'] = $voter_id;

    $_SESSION['reg_json'] = json_encode([
        "status" => "success",
        "voter_id" => $voter_id
    ]);

    header("Location: register_success.php");
    exit();
}

$_SESSION['reg_json'] = json_encode([
    "status" => "error",
    "message" => "Registration failed"
]);
header("Location: signup.php");
exit();