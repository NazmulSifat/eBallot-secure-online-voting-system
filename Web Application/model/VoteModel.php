<?php
class VoteModel
{
    private $conn;
    function __construct($conn)
    {
        $this->conn = $conn;
    }

    function alreadyVoted($voter_id)
    {
        $sql = "SELECT v.*,c.candidate_name,c.party_name
              FROM votes v
              JOIN candidates c ON c.id=v.candidate_id
              WHERE v.voter_id='$voter_id'";
        return mysqli_fetch_assoc(mysqli_query($this->conn, $sql));
    }

    function vote($voter_id, $candidate_id)
    {
        return mysqli_query(
            $this->conn,
            "INSERT INTO votes(voter_id,candidate_id)
         VALUES('$voter_id','$candidate_id')"
        );
    }
}