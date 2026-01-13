<?php
class CandidateModel
{
    private $conn;
    function __construct($conn)
    {
        $this->conn = $conn;
    }

    function add($d)
    {
        extract($d);
        return mysqli_query(
            $this->conn,
            "INSERT INTO candidates(candidate_name,ballot_number,party_name,symbol,zilla,upazila)
         VALUES('$candidate_name','$ballot_number','$party_name','$symbol','$zilla','$upazila')"
        );
    }

    function all()
    {
        return mysqli_query(
            $this->conn,
            "SELECT * FROM candidates ORDER BY zilla,upazila,ballot_number"
        );
    }

    function byArea($z, $u)
    {
        return mysqli_query(
            $this->conn,
            "SELECT * FROM candidates WHERE zilla='$z' AND upazila='$u'"
        );
    }

    function delete($id)
    {
        return mysqli_query($this->conn, "DELETE FROM candidates WHERE id=$id");
    }
}