<?php
class CandidateModel
{
    private $conn;
    function __construct($conn)
    {
        $this->conn = $conn;
    }

    function add($name, $party, $symbol)
    {
        return mysqli_query(
            $this->conn,
            "INSERT INTO candidates(name,party,symbol)
             VALUES('$name','$party','$symbol')"
        );
    }

    function all()
    {
        return mysqli_query($this->conn, "SELECT * FROM candidates");
    }

    function delete($id)
    {
        return mysqli_query($this->conn, "DELETE FROM candidates WHERE id=$id");
    }

    function winner()
    {
        return mysqli_fetch_assoc(
            mysqli_query(
                $this->conn,
                "SELECT c.*, COUNT(v.id) total
             FROM candidates c
             JOIN votes v ON c.id=v.candidate_id
             GROUP BY c.id
             ORDER BY total DESC LIMIT 1"
            )
        );
    }
}