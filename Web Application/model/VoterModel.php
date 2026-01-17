<?php
class VoterModel
{
    private $db;
    function __construct($conn)
    {
        $this->db = $conn;
    }

    function login($vid, $nid)
    {
        return mysqli_fetch_assoc(
            mysqli_query(
                $this->db,
                "SELECT * FROM voters WHERE voter_id='$vid' AND nid='$nid'"
            )
        );
    }

    function getById($id)
    {
        return mysqli_fetch_assoc(
            mysqli_query($this->db, "SELECT * FROM voters WHERE id=" . (int) $id)
        );
    }

    function findByNid($nid)
    {
        return mysqli_fetch_assoc(
            mysqli_query($this->db, "SELECT voter_id FROM voters WHERE nid='$nid'")
        );
    }

    function register($d)
    {
        extract($d);
        return mysqli_query(
            $this->db,
            "INSERT INTO voters(voter_id,name,phone,nid,zilla,upazila)
         VALUES('$voter_id','$name','$phone','$nid','$zilla','$upazila')"
        );
    }

    function getCandidates()
    {
        return mysqli_query($this->db, "SELECT * FROM candidates");
    }

    function getSetting()
    {
        return mysqli_fetch_assoc(
            mysqli_query($this->db, "SELECT * FROM voting_settings WHERE id=1")
        );
    }

    function giveVote($vid, $cid)
    {
        mysqli_query(
            $this->db,
            "INSERT INTO votes(voter_id,candidate_id) VALUES($vid,$cid)"
        );
        mysqli_query(
            $this->db,
            "UPDATE voters SET has_voted=1 WHERE id=$vid"
        );
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