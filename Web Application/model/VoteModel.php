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
        mysqli_query(
            $this->conn,
            "INSERT INTO votes (voter_id, candidate_id)
         VALUES ('$uid', '$cid')"
        );

        mysqli_query(
            $this->conn,
            "UPDATE voters SET has_voted = 1 WHERE id = '$uid'"
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


    function winner()
    {
        $res = mysqli_query(
            $this->conn,
            "SELECT c.candidate_name, c.party_name, COUNT(v.id) AS votes
         FROM candidates c
         JOIN votes v ON c.id = v.candidate_id
         GROUP BY c.id
         ORDER BY votes DESC
         LIMIT 1"
        );
        return mysqli_fetch_assoc($res);
    }

}