<?php
class VoteModel
{
    private $db;

    function __construct($conn)
    {
        $this->db = $conn;
    }

    function vote($voter_id, $candidate_id)
    {
        return mysqli_query(
            $this->db,
            "INSERT INTO votes (voter_id, candidate_id)
             VALUES ('$voter_id', '$candidate_id')"
        );
    }

    function winner()
    {
        return mysqli_fetch_assoc(
            mysqli_query(
                $this->db,
                "SELECT c.candidate_name, c.party_name,
                        COUNT(v.id) AS total_votes
                 FROM votes v
                 JOIN candidates c ON c.id = v.candidate_id
                 GROUP BY v.candidate_id
                 ORDER BY total_votes DESC
                 LIMIT 1"
            )
        );
    }
}