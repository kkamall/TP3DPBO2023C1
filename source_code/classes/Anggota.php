<?php

include('config/db.php');

class Anggota extends DB
{
    function getAnggotaJoin()
    {
        $query = "SELECT * FROM anggota JOIN band ON anggota.id_band=band.id_band JOIN roleAnggota ON anggota.id_role=roleAnggota.id_role ORDER BY anggota.id_anggota";

        return $this->execute($query);
    }

    function getAnggota()
    {
        $query = "SELECT * FROM anggota";
        return $this->execute($query);
    }

    function getAnggotaById($id)
    {
        $query = "SELECT * FROM anggota JOIN band ON anggota.id_band=band.id_band JOIN roleAnggota ON anggota.id_role=roleAnggota.id_role WHERE anggota.id_anggota=$id";
        return $this->execute($query);
    }

    function searchAnggota($keyword)
    {
        $query = "SELECT * FROM anggota JOIN band ON anggota.id_band=band.id_band JOIN roleAnggota ON anggota.id_role=roleAnggota.id_role WHERE nama_anggota LIKE '%" . $keyword . "%'";
        return $this->execute($query);
    }

    function filterAZAnggota()
    {
        $query = "SELECT * FROM anggota JOIN band ON anggota.id_band=band.id_band JOIN roleAnggota ON anggota.id_role=roleAnggota.id_role ORDER BY nama_anggota ASC";
        return $this->execute($query);
    }

    function filterZAAnggota()
    {
        $query = "SELECT * FROM anggota JOIN band ON anggota.id_band=band.id_band JOIN roleAnggota ON anggota.id_role=roleAnggota.id_role ORDER BY nama_anggota DESC";
        return $this->execute($query);
    }

    function addAnggota($data, $file)
    {
        $tmp_file = $file['file_image']['tmp_name'];
        $pengurus_foto = $file['file_image']['name'];

        $dir = "assets/images/$pengurus_foto";
        move_uploaded_file($tmp_file, $dir);

        $nama_anggota = $data['nama_anggota'];
        $id_band = $data['id_band'];
        $id_role = $data['id_role'];

        $query = "INSERT INTO anggota VALUES('','$nama_anggota', '$pengurus_foto', '$id_role', '$id_band')";

        return $this->executeAffected($query);
    }

    function updateAnggota($id, $data, $file, $img)
    {


        $tmp_file = $file['file_image']['tmp_name'];
        $pengurus_foto = $file['file_image']['name'];

        if ($pengurus_foto == "") {
            $pengurus_foto = $img;
        }

        $dir = "assets/images/$pengurus_foto";
        move_uploaded_file($tmp_file, $dir);

        $nama_anggota = $data['nama_anggota'];
        $id_role = $data['id_role'];
        $id_band = $data['id_band'];

        // $temp_data = new Pengurus("localhost", "root", "", "db_ormawa");
        // $temp_data->open();
        // $temp_data->getPengurus();
        // $temp_data->getPengurusById($id);
        // $temp_fix = $temp_data->getResult();
        // $temp_img = $temp_fix['pengurus_foto'];
        // if ()
        // var_dump($img, $pengurus_foto);
        // die();

        // $temp_data->close();

        $query = "UPDATE anggota SET foto_anggota = '$pengurus_foto', nama_anggota = '$nama_anggota', id_role = '$id_role', id_band = '$id_band' WHERE id_anggota = '$id'";

        return $this->executeAffected($query);
    }

    function deleteAnggota($id)
    {
        $query = "DELETE FROM anggota WHERE id_anggota = $id";
        return $this->executeAffected($query);
    }
}
