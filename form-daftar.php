<?php include("config.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Pendaftaran Siswa Baru</title>
</head>
<body>
    <?php  include('navbar.php'); ?>

    <div class="container mt-4 mb-4">
        <div class="row justify-content-center">
            <form class="col-4" action="proses-pendaftaran.php" method="POST" enctype="multipart/form-data">

                <fieldset>

                <div class="row mt-3">
                    <label for="nama" class="form-label">Nama: </label>
                    <input type="text" name="nama" placeholder="Nama Lengkap" class="form-control" required />
                </div>
                <div class="row mt-3">
                    <label for="alamat" class="form-label">Alamat: </label>
                    <textarea name="alamat" class="form-control" required></textarea>
                </div>
                <div class="row mt-3">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin: </label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki-laki" value="laki-laki">
                        <label class="form-check-label" for="laki-laki">
                            Laki-laki
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="perempuan">
                        <label class="form-check-label" for="perempuan">
                            Perempuan
                        </label>
                    </div>
                </div>
                <div class="row mt-3">
                    <label for="agama" class="form-label">Agama: </label>
                    <select name="agama" class="form-select" aria-label="Default select example" required>
                        <option selected>Agama</option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                        <option value="Konghucu">Konghucu</option>
                    </select>
                </div>
                <div class="row mt-3">
                    <label for="sekolah_asal" class="form-label">Sekolah Asal: </label>
                    <input type="text" name="sekolah_asal" placeholder="Nama Sekolah" class="form-control" required />
                </div>
                <div class="row mt-3">
                    <label for="sekolah_asal" class="form-label">Sekolah Asal: </label>
                    <input type="file" name="foto" placeholder="Foto" class="form-control" required />
                </div>
                <div class="row mt-3">
                    <button class="btn btn-info" type="submit" name="daftar">Daftar</button>
                </div>

                </fieldset>

            </form>
        </div>
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>