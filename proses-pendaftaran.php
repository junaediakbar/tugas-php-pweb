<?php

    include("config.php");

    // cek apakah tombol daftar sudah diklik atau blum?
    if (isset($_POST['daftar'])) {

        // ambil data dari formulir
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $jk = $_POST['jenis_kelamin'];
        $agama = $_POST['agama'];
        $sekolah = $_POST['sekolah_asal'];
        
        $rand = rand();
        $ekstensi =  array('png','jpg','jpeg','gif');
        $filename = $_FILES['foto']['name'];
        $ukuran = $_FILES['foto']['size'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);

        if(!in_array($ext,$ekstensi) ) {
            header("location:index.php?alert=gagal_ekstensi");
        }else{
            if($ukuran < 1044070){		
                $xx = $rand.'_'.$filename;
                move_uploaded_file($_FILES['foto']['tmp_name'], 'gambar/'.$rand.'_'.$filename);
                // buat query
                $sql = "INSERT INTO calon_siswa (nama, alamat, jenis_kelamin, agama, sekolah_asal, foto) VALUE ('$nama', '$alamat', '$jk', '$agama', '$sekolah','$xx')";
                $query = mysqli_query($db, $sql);

                // apakah query simpan berhasil?
                if ( $query ) {
                    // kalau berhasil alihkan ke halaman index.php dengan status=sukses
                    header('Location: list-siswa.php?status=sukses');
                } else {
                    // kalau gagal alihkan ke halaman indek.php dengan status=gagal
                    header('Location: list-siswa.php?status=gagal');
                }

            }else{
                header("location:index.php?alert=gagal_ukuran");
            }
        }

       


    } else {
        die("Akses dilarang...");
    }

?>