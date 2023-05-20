<?php

include('config/db.php');
include('classes/DB.php');
include('classes/RoleAnggota.php');
include('classes/Template.php');

$roleAnggota = new RoleAnggota($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$roleAnggota->open();
if (isset($_POST['btn-cari'])) {
    $roleAnggota->searchRoleAnggota($_POST['cari']);
} else if (isset($_POST['btn-az'])) {
    $roleAnggota->filterAZRoleAnggota();
} else if (isset($_POST['btn-za'])) {
    $roleAnggota->filterZARoleAnggota();
} else {
    $roleAnggota->getRoleAnggota();
}

if (!isset($_GET['id'])) {
    if (isset($_POST['submit'])) {
        if ($roleAnggota->addRoleAnggota($_POST) > 0) {
            echo "<script>
                alert('Data berhasil ditambah!');
                document.location.href = 'roleAnggota.php';
            </script>";
        } else {
            echo "<script>
                alert('Data gagal ditambah!');
                document.location.href = 'roleAnggota.php';
            </script>";
        }
    }

    $btn = 'Tambah';
    $title = 'Tambah';
}

$view = new Template('templates/skintabel.html');

$mainTitle = 'Role';
$header = '<tr>
<th scope="row">No.</th>
<th scope="row">Nama Role</th>
<th scope="row">Aksi</th>
</tr>';
$data = null;
$no = 1;
$formLabel = 'Role Anggota';

while ($div = $roleAnggota->getResult()) {
    $data .= '<tr>
    <th scope="row">' . $no . '</th>
    <td>' . $div['nama_role'] . '</td>
    <td style="font-size: 22px;">
        <a href="roleAnggota.php?id=' . $div['id_role'] . '" title="Edit Data">
        <i class="bi bi-pencil-square text-warning"></i>
        </a>&nbsp;
        <a href="roleAnggota.php?hapus=' . $div['id_role'] . '" title="Delete Data"><i class="bi bi-trash-fill text-danger"></i></a>
        </td>
    </tr>';
    $no++;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($id > 0) {
        if (isset($_POST['submit'])) {
            if ($roleAnggota->updateRoleAnggota($id, $_POST) > 0) {
                echo "<script>
                alert('Data berhasil diubah!');
                document.location.href = 'roleAnggota.php';
            </script>";
            } else {
                echo "<script>
                alert('Data gagal diubah!');
                document.location.href = 'roleAnggota.php';
            </script>";
            }
        }

        $roleAnggota->getRoleAnggotaById($id);
        $row = $roleAnggota->getResult();

        $dataUpdate = $row['nama_role'];
        $btn = 'Simpan';
        $title = 'Ubah';

        $view->replace('DATA_VAL_UPDATE', $dataUpdate);
    }
}

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    if ($id > 0) {
        if ($roleAnggota->deleteRoleAnggota($id) > 0) {
            echo "<script>
                alert('Data berhasil dihapus!');
                document.location.href = 'roleAnggota.php';
            </script>";
        } else {
            echo "<script>
                alert('Data gagal dihapus!');
                document.location.href = 'roleAnggota.php';
            </script>";
        }
    }
}

$roleAnggota->close();

$view->replace('LINK', 'roleAnggota.php');
$view->replace('DATA_MAIN_TITLE', $mainTitle);
$view->replace('DATA_TABEL_HEADER', $header);
$view->replace('DATA_TITLE', $title);
$view->replace('DATA_BUTTON', $btn);
$view->replace('DATA_FORM_LABEL', $formLabel);
$view->replace('DATA_TABEL', $data);
$view->write();
