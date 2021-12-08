<?php

    include("config.php");

    // kalau tidak ada id di query string
    if( !isset($_GET['id']) ){
        header('Location: list-siswa.php');
    }

    //ambil id dari query string
    $id = $_GET['id'];

    // buat query untuk ambil data dari database
    $sql = "SELECT * FROM calon_siswa WHERE id=$id";
    $query = mysqli_query($db, $sql);
    $siswa = mysqli_fetch_assoc($query);

    // jika data yang di-edit tidak ditemukan
    if( mysqli_num_rows($query) < 1 ){
        die("data tidak ditemukan...");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Formulir Edit Siswa</title>
</head>
<body>
    <?php  include('navbar.php'); ?>
    <div class="container mt-4 mb-4">
        <div class="row justify-content-center">
            <form class="col-6" action="proses-edit.php" method="POST">

                <fieldset>

                <input type="hidden" name="id" value="<?php echo $siswa['id'] ?>" />

                <div class="row mt-3">
                    <label for="nama" class="form-label">Nama: </label>
                    <input type="text" name="nama" placeholder="Nama Lengkap" class="form-control" value="<?php echo $siswa['nama'] ?>" required />
                </div>
                <div class="row mt-3">
                    <label for="alamat" class="form-label">Alamat: </label>
                    <textarea name="alamat" class="form-control" required><?php echo $siswa['alamat'] ?></textarea>
                </div>
                <div class="row mt-3">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin: </label>
                    <?php $jk = $siswa['jenis_kelamin']; ?>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki-laki" value="laki-laki" <?php echo ($jk == 'laki-laki') ? "checked": "" ?>>
                        <label class="form-check-label" for="laki-laki">
                            Laki-laki
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="perempuan" <?php echo ($jk == 'perempuan') ? "checked": "" ?>>
                        <label class="form-check-label" for="perempuan">
                            Perempuan
                        </label>
                    </div>
                </div>
                <div class="row mt-3">
                    <label for="agama" class="form-label">Agama: </label>
                    <?php $agama = $siswa['agama']; ?>
                    <select name="agama" class="form-select" aria-label="Default select example" required>
                        <option selected>Agama</option>
                        <option value="Islam" <?php echo ($agama == 'Islam') ? "selected": "" ?>>Islam</option>
                        <option value="Kristen" <?php echo ($agama == 'Kristen') ? "selected": "" ?>>Kristen</option>
                        <option value="Katolik" <?php echo ($agama == 'Katolik') ? "selected": "" ?>>Katolik</option>
                        <option value="Hindu" <?php echo ($agama == 'Hindu') ? "selected": "" ?>>Hindu</option>
                        <option value="Budha" <?php echo ($agama == 'Budha') ? "selected": "" ?>>Budha</option>
                        <option value="Konghucu" <?php echo ($agama == 'Konghucu') ? "selected": "" ?>>Konghucu</option>
                    </select>
                </div>
                <div class="row mt-3">
                    <label for="sekolah_asal" class="form-label">Sekolah Asal: </label>
                    <input type="text" name="sekolah_asal" placeholder="Nama Sekolah" class="form-control" value="<?php echo $siswa['sekolah_asal'] ?>" required />
                </div>
                <div class="row mt-3 d-grid gap-2">
                    <button class="btn btn-primary" type="submit" name="simpan">Simpan</button>
                    <button class="btn btn-secondary" type="button" name="simpan" onclick="window.location.href='./list-siswa.php'">Batal</button>
                </div>

                </fieldset>

            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>