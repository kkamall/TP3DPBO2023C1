<?php

class Band extends DB
{
    function getBand()
    {
        $query = "SELECT * FROM band";
        return $this->execute($query);
    }

    function searchBand($keyword)
    {
        $query = "SELECT * FROM band WHERE nama_band LIKE '%" . $keyword . "%'";
        return $this->execute($query);
    }

    function filterAZBand()
    {
        $query = "SELECT * FROM band ORDER BY nama_band ASC";
        return $this->execute($query);
    }
    function filterZABand()
    {
        $query = "SELECT * FROM band ORDER BY nama_band DESC";
        return $this->execute($query);
    }

    function getBandById($id)
    {
        $query = "SELECT * FROM band WHERE id_band=$id";
        return $this->execute($query);
    }

    function addBand($data)
    {
        $nama_band = $data['nama'];
        $query = "INSERT INTO band VALUES('', '$nama_band')";
        return $this->executeAffected($query);
    }

    function updateBand($id, $data)
    {
        $nama_band = $data['nama'];
        $query = "UPDATE band SET nama_band = '$nama_band' WHERE id_band = '$id'";
        return $this->executeAffected($query);
    }

    function deleteBand($id)
    {
        $query = "DELETE FROM band WHERE id_band = $id";
        return $this->executeAffected($query);
    }
}
