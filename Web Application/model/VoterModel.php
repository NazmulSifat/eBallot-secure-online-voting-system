<?php
class VoterModel
{
    private $conn;
    function __construct($conn)
    {
        $this->conn = $conn;
    }

    function login($voter_id, $nid)
    {
        $sql = "SELECT * FROM voters WHERE voter_id='$voter_id' AND nid='$nid'";
        return mysqli_fetch_assoc(mysqli_query($this->conn, $sql));
    }

    function get($voter_id)
    {
        $sql = "SELECT * FROM voters WHERE voter_id='$voter_id'";
        return mysqli_fetch_assoc(mysqli_query($this->conn, $sql));
    }

    function findByNid($nid)
    {
        $sql = "SELECT voter_id FROM voters WHERE nid='$nid'";
        return mysqli_fetch_assoc(mysqli_query($this->conn, $sql));
    }

    function register($data)
    {
        extract($data);
        $sql = "INSERT INTO voters(voter_id,name,phone,nid,zilla,upazila)
              VALUES('$voter_id','$name','$phone','$nid','$zilla','$upazila')";
        return mysqli_query($this->conn, $sql);
    }
}