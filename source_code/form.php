<?php 

    include('config/db.php');
    include('classes/DB.php');
    include('classes/Template.php');
    include('classes/Anggota.php');
    include('classes/RoleAnggota.php');
    include('classes/Band.php');

    $band = new Band($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
    $roleAnggota = new RoleAnggota($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
    $anggota = new Anggota($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
    $tmp_image = new Anggota($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
    $band->open();
    $roleAnggota->open();
    $anggota->open();
    $tmp_image->open();

    // VAR UNTUK SHOW band DAN roleAnggota
    $band_options = null;
    $roleAnggota_options = null;

    // VAR UNTUK EDIT TAPI JADI GLOBAL
    $img_edit = ""; $nama_edit = "";
    $band_edit = ""; $roleAnggota_edit = "";

    $view_form = new Template('templates/skintambah.html');
    if (!isset($_GET['edit'])) {
    
        if (isset($_POST['submit'])) {
            if ($anggota->addAnggota($_POST, $_FILES) > 0) {
                echo "
                <script>
                    alert('Data berhasil ditambahkan!');
                    document.location.href = 'index.php';
                </script>
                ";
            } else {
                echo "
                <script>
                    alert('Data berhasil ditambahkan!');
                    document.location.href = 'form.php';
                </script>
                ";
            }
        }
        
        // Connect to Tabel Band
        
        $band->getBand();
    
        // Looping for Shows the data 
        while ($row = $band->getResult()) {
            $band_options .= "<option value=". $row['id_band']. ">" . $row['nama_band'] . "</option>";
        }
    
    
        // Connect to Tabel Role Anggota
        
        $roleAnggota->getRoleAnggota();
    
        // Looping for shows the data
        while($row = $roleAnggota->getResult()) {
            $roleAnggota_options .= "<option value=". $row['id_role']. ">" . $row['nama_role'] . "</option>";
        }
    } else if (isset($_GET['edit'])) {
        $_ID = $_GET['edit'];
        $tmp_image->getAnggota();
        $tmp_image->getAnggotaById($_ID);
        $temp_fix = $tmp_image->getResult();
        $temp_img = $temp_fix['foto_anggota'];
        // $temp_data = $tmp_image->getPengurusById($_ID);
        // $image_temp_edit = $temp_data->getResult();
        if (isset($_POST['submit'])) {
            if ($anggota->updateAnggota($_ID, $_POST, $_FILES, $temp_img) > 0) {
                echo "
                <script>
                    alert('Data berhasil diubah!');
                    document.location.href = 'index.php';
                </script>
                ";
            } else {
                echo "
                <script>
                    alert('Data berhasil diubah!');
                    document.location.href = 'tambah.php';
                </script>
                ";
            }
        }
        // var_dump($_ID);
        // die();
        $anggota->getAnggotaById($_ID);

        $row = $anggota->getResult();
        $img_edit = $row['foto_anggota'];
        $nama_edit = $row['nama_anggota'];
        $band_edit = $row['id_band'];
        $roleAnggota_edit = $row['id_role'];
        
        
        // $tmp_file = $file['file_image']['tmp_name'];
        // $pengurus_foto = $file['file_image']['name'];


        $band->getBand();
    
        // Looping for Shows the data 
        while ($row = $band->getResult()) {
            $select = ($row['id_band'] == $band_edit) ? 'selected' : "";
            $band_options .= "<option value=". $row['id_band']. " . $select . >" . $row['nama_band'] . "</option>";
        }
    
    
        // Connect to Tabel Jabatan
        
        $roleAnggota->getRoleAnggota();
    
        // Looping for shows the data
        while($row = $roleAnggota->getResult()) {
            $select = ($row['id_role'] == $roleAnggota_edit) ? 'selected' : "";
            $roleAnggota_options .= "<option value=". $row['id_role']. " . $select . >" . $row['nama_role'] . "</option>";
        }


    }

    $view_form->replace('IMAGE_DATA' , $img_edit);
    $view_form->replace('NAMA_DATA' , $nama_edit);
    $view_form->replace('BAND_DATA' , $band_edit);
    $view_form->replace('ROLEANGGOTA_DATA' , $roleAnggota_edit);
    $view_form->replace('BAND_OPTIONS', $band_options);
    $view_form->replace('ROLEANGGOTA_OPTIONS', $roleAnggota_options);
    $view_form->write();


    $anggota->close();
    $band->close();
    $roleAnggota->close();

?>