<?php
class AdminModel
{
    private $db;
    function __construct($conn)
    {
        $this->db = $conn;
    }

    function adminLogin($email)
    {
        return mysqli_fetch_assoc(
            mysqli_query($this->db, "SELECT * FROM admin WHERE email='$email'")
        );
    }

    function addCandidate($name, $party)
    {
        return mysqli_query(
            $this->db,
            "INSERT INTO candidates(candidate_name,party_name) VALUES('$name','$party')"
        );
    }

    function deleteCandidate($id)
    {
        return mysqli_query($this->db, "DELETE FROM candidates WHERE id=" . (int) $id);
    }

    function getCandidates()
    {
        return mysqli_query($this->db, "SELECT * FROM candidates");
    }

    function getVoters()
    {
        return mysqli_query($this->db, "SELECT * FROM voters");
    }

    function getSetting()
    {
        return mysqli_fetch_assoc(
            mysqli_query($this->db, "SELECT * FROM voting_settings WHERE id=1")
        );
    }

    function startVoting()
    {
        return mysqli_query($this->db, "UPDATE voting_settings SET status='on' WHERE id=1");
    }

    function stopVoting()
    {
        return mysqli_query($this->db, "UPDATE voting_settings SET status='off' WHERE id=1");
    }

    function getWinner()
    {
        return mysqli_fetch_assoc(
            mysqli_query(
                $this->db,
                "SELECT c.candidate_name,c.party_name,COUNT(v.id) total
             FROM votes v JOIN candidates c ON c.id=v.candidate_id
             GROUP BY c.id ORDER BY total DESC LIMIT 1"
            )
        );
    }
}