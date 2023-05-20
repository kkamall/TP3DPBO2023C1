<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Band.php');
include('classes/Template.php');

$band = new Band($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$band->open();
if (isset($_POST['btn-cari'])) {
    $band->searchBand($_POST['cari']);
} else if (isset($_POST['btn-az'])) {
    $band->filterAZBand();
} else if (isset($_POST['btn-za'])) {
    $band->filterZABand();
} else {
    $band->getBand();
}

if (!isset($_GET['id'])) {
    if (isset($_POST['submit'])) {
        if ($band->addBand($_POST) > 0) {
            echo "<script>
                alert('Data berhasil ditambah!');
                document.location.href = 'band.php';
            </script>";
        } else {
            echo "<script>
                alert('Data gagal ditambah!');
                document.location.href = 'band.php';
            </script>";
        }
    }

    $btn = 'Tambah';
    $title = 'Tambah';
}

$view = new Template('templates/skintabel.html');

$mainTitle = 'Band';
$header = '<tr>
<th scope="row">No.</th>
<th scope="row">Nama Band</th>
<th scope="row">Aksi</th>
</tr>';
$data = null;
$no = 1;
$formLabel = 'band';

while ($div = $band->getResult()) {
    $data .= '<tr>
    <th scope="row">' . $no . '</th>
    <td>' . $div['nama_band'] . '</td>
    <td style="font-size: 22px;">
        <a href="band.php?id=' . $div['id_band'] . '" title="Edit Data">
        <i class="bi bi-pencil-square text-warning"></i>
        </a>&nbsp;
        <a href="band.php?hapus=' . $div['id_band'] . '" title="Delete Data"><i class="bi bi-trash-fill text-danger"></i></a>
        </td>
    </tr>';
    $no++;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($id > 0) {
        if (isset($_POST['submit'])) {
            if ($band->updateBand($id, $_POST) > 0) {
                echo "<script>
                alert('Data berhasil diubah!');
                document.location.href = 'band.php';
            </script>";
            } else {
                echo "<script>
                alert('Data gagal diubah!');
                document.location.href = 'band.php';
            </script>";
            }
        }

        $band->getBandById($id);
        $row = $band->getResult();

        $dataUpdate = $row['nama_band'];
        $btn = 'Simpan';
        $title = 'Ubah';

        $view->replace('DATA_VAL_UPDATE', $dataUpdate);
    }
}

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    if ($id > 0) {
        if ($band->deleteBand($id) > 0) {
            echo "<script>
                alert('Data berhasil dihapus!');
                document.location.href = 'band.php';
            </script>";
        } else {
            echo "<script>
                alert('Data gagal dihapus!');
                document.location.href = 'band.php';
            </script>";
        }
    }
}

$band->close();

$view->replace('LINK', 'band.php');
$view->replace('DATA_MAIN_TITLE', $mainTitle);
$view->replace('DATA_TABEL_HEADER', $header);
$view->replace('DATA_TITLE', $title);
$view->replace('DATA_BUTTON', $btn);
$view->replace('DATA_FORM_LABEL', $formLabel);
$view->replace('DATA_TABEL', $data);
$view->write();
