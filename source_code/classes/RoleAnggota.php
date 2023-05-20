<?php

class RoleAnggota extends DB
{
    function getRoleAnggota()
    {
        $query = "SELECT * FROM roleAnggota";
        return $this->execute($query);
    }

    function searchRoleAnggota($keyword)
    {
        $query = "SELECT * FROM roleAnggota WHERE nama_role LIKE '%" . $keyword . "%'";
        return $this->execute($query);
    }
    
    function filterAZRoleAnggota()
    {
        $query = "SELECT * FROM roleAnggota ORDER BY nama_role ASC";
        return $this->execute($query);
    }

    function filterZARoleAnggota()
    {
        $query = "SELECT * FROM roleAnggota ORDER BY nama_role DESC";
        return $this->execute($query);
    }

    function getRoleAnggotaById($id)
    {
        $query = "SELECT * FROM roleAnggota WHERE id_role=$id";
        return $this->execute($query);
    }

    function addRoleAnggota($data)
    {
        $nama_role = $data['nama'];
        $query = "INSERT INTO roleAnggota VALUES('', '$nama_role')";
        return $this->executeAffected($query);
    }

    function updateRoleAnggota($id, $data)
    {
        $nama_role = $data['nama'];
        $query = "UPDATE roleAnggota SET nama_role = '$nama_role' WHERE id_role = '$id'";
        return $this->executeAffected($query);
    }

    function deleteRoleAnggota($id)
    {
        $query = "DELETE FROM roleAnggota WHERE id_role = $id";
        return $this->executeAffected($query);
    }
}
