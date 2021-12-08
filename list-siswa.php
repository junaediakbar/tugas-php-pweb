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
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Menu</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="./index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./form-daftar.php">Daftar Baru</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="./list-siswa.php">Pendaftar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <?php if(isset($_GET['status'])): ?>
            <p>
                <?php
                    if($_GET['status'] == 'sukses') {
                        echo "<div class=\"alert alert-success mt-4\" role=\"alert\">";
                        echo "Pendaftaran siswa baru berhasil!";
                        echo "</div>";
                    } else {
                        echo "<div class=\"alert alert-danger mt-4\" role=\"alert\">";
                        echo "Pendaftaran gagal";
                        echo "</div>";
                    }
                ?>
            </p>
        <?php endif; ?>
    </div>

    <div class="container mt-4">
        <p>
            <a href="./form-daftar.php"><i class="fa-solid fa-circle-plus text-success"></i> Tambah Baru</a>
        </p>

        <br>

        <table class="table table-striped">
           
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Agama</th>
                    <th scope="col">Sekolah Asal</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Tindakan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT * FROM calon_siswa";
                    $query = mysqli_query($db, $sql);
                    $i=1;
                    while($siswa = mysqli_fetch_array($query)) {
                        echo "<tr>";

                        echo "<td>".$i++."</td>";
                        echo "<td>".$siswa['nama']."</td>";
                        echo "<td>".$siswa['alamat']."</td>";
                        echo "<td>".$siswa['jenis_kelamin']."</td>";
                        echo "<td>".$siswa['agama']."</td>";
                        echo "<td>".$siswa['sekolah_asal']."</td>";
                        echo "<td><img src=\"gambar/".$siswa['foto']. "\" width=\"35px\"></td>";
                        echo "<td>";
                        echo "<a href='form-edit.php?id=".$siswa['id']."'><i class=\"fa-solid fa-pen-to-square text-info\"></i></a> ";
                        echo "<a href='hapus.php?id=".$siswa['id']."' data-bs-toggle=\"modal\" data-bs-target=\"#deleteModal\"><i class=\"fa-solid fa-trash text-danger\"></i></a>";
                        echo "</td>";

                        echo "</tr>";

                        echo "
                        <!-- Modal -->
                        <div class=\"modal fade\" id=\"deleteModal\" tabindex=\"-1\" aria-labelledby=\"deleteModalLabel\" aria-hidden=\"true\">
                            <div class=\"modal-dialog\">
                                <div class=\"modal-content\">
                                <div class=\"modal-header\">
                                    <h5 class=\"modal-title\" id=\"deleteModalLabel\">Delete Data</h5>
                                    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
                                </div>
                                <div class=\"modal-body\">
                                    Apakah kamu yakin ingin menghapus data?
                                </div>
                                <div class=\"modal-footer\">
                                    <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Close</button>
                                    <a href='hapus.php?id=".$siswa['id']."'><button type=\"button\" class=\"btn btn-danger\">Delete</button></a>
                                </div>
                                </div>
                            </div>
                        </div>
                        ";
                    }
                ?>
            </tbody>
        </table>

        

        <div class="text-right">Total Records: <span class="badge bg-primary"><?php echo mysqli_num_rows($query) ?> </span></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>