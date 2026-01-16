<?php
class VoteModel
{
    private $conn;
    function __construct($conn)
    {
        $this->conn = $conn;
    }

    function vote($uid, $cid)
    {
        return mysqli_query(
            $this->conn,
            "INSERT INTO votes(voter_id,candidate_id)
             VALUES('$uid','$cid')"
        );
    }

    function count()
    {
        return mysqli_query(
            $this->conn,
            "SELECT c.name,c.party,COUNT(v.id) votes
             FROM candidates c
             LEFT JOIN votes v ON c.id=v.candidate_id
             GROUP BY c.id
             ORDER BY votes DESC"
        );
    }
}