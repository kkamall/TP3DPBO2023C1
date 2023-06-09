<?php

include('config/db.php');
include('classes/DB.php');
include('classes/RoleAnggota.php');
include('classes/Band.php');
include('classes/Anggota.php');
include('classes/Template.php');

$anggota = new Anggota($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$anggota->open();

$data = nulL;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($id > 0) {
        $anggota->getAnggotaById($id);
        $row = $anggota->getResult();

        $data .= '<div class="card-header text-center">
        <h3 class="my-0">Detail ' . $row['nama_anggota'] . '</h3>
        </div>
        <div class="card-body text-end">
            <div class="row mb-5">
                <div class="col-3">
                    <div class="row justify-content-center">
                        <img src="assets/images/' . $row['foto_anggota'] . '" class="img-thumbnail" alt="' . $row['foto_anggota'] . '" width="60">
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="card px-3">
                            <table border="0" class="text-start">
                                <tr>
                                    <td>Nama Anggota</td>
                                    <td>:</td>
                                    <td>' . $row['nama_anggota'] . '</td>
                                </tr>
                                <tr>
                                    <td>Role Anggota</td>
                                    <td>:</td>
                                    <td>' . $row['nama_role'] . '</td>
                                </tr>
                                <tr>
                                    <td>Band Anggota</td>
                                    <td>:</td>
                                    <td>' . $row['nama_band'] . '</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <a href="form.php?edit=' . $row['id_anggota'] .'"><button type="button" class="btn btn-success text-white">Ubah Data</button></a>
                <a href="detail.php?del=' . $row['id_anggota'] . '"><button type="button" class="btn btn-danger">Hapus Data</button></a>
            </div>';
    }
}

if (isset($_GET['del'])) {
    $id = $_GET['del'];
    if ($id > 0) {
        if ($anggota->deleteAnggota($id) > 0) {
            echo 
            "
            <script>
                alert('Data berhasil dihapus!');
                document.location.href = 'index.php';
            </script>
            ";
        } else {
            echo 
            "
            <script>
                alert('Data gagal dihapus!');
                document.location.href = 'index.php';
            </script>
            ";
        }
    }
}

$anggota->close();
$detail = new Template('templates/skindetail.html');
$detail->replace('DATA_DETAIL_ANGGOTA', $data);
$detail->write();
