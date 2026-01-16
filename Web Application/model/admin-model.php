<?php
class AdminModel
{
    private $db;

    function __construct($conn)
    {
        $this->db = $conn;
    }

    /* ---------- ADMIN ---------- */
    function adminLogin($email)
    {
        return mysqli_fetch_assoc(
            mysqli_query(
                $this->db,
                "SELECT * FROM admin WHERE email='$email'"
            )
        );
    }

    /* ---------- CANDIDATE ---------- */
    function addCandidate($candidate_name, $party_name)
    {
        return mysqli_query(
            $this->db,
            "INSERT INTO candidates (candidate_name, party_name)
             VALUES ('$candidate_name','$party_name')"
        );
    }

    function deleteCandidate($id)
    {
        return mysqli_query(
            $this->db,
            "DELETE FROM candidates WHERE id=$id"
        );
    }

    function getCandidates()
    {
        return mysqli_query(
            $this->db,
            "SELECT * FROM candidates"
        );
    }

    /* ---------- VOTERS ---------- */
    function getVoters()
    {
        return mysqli_query(
            $this->db,
            "SELECT * FROM voters"
        );
    }

    /* ---------- VOTING SETTINGS ---------- */
    function getSetting()
    {
        return mysqli_fetch_assoc(
            mysqli_query(
                $this->db,
                "SELECT * FROM voting_settings WHERE id=1"
            )
        );
    }

    function startVoting()
    {
        return mysqli_query(
            $this->db,
            "UPDATE voting_settings SET status='on' WHERE id=1"
        );
    }

    function stopVoting()
    {
        return mysqli_query(
            $this->db,
            "UPDATE voting_settings SET status='off' WHERE id=1"
        );
    }

    /* ---------- WINNER (AUTO COUNT) ---------- */
    function getWinner()
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