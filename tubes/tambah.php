<!-- PHP -->
<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

// koneksi ke DBMS
$conn = mysqli_connect("localhost", "root", "", "tubes_pw2022_a_213040004");

// untuk melihat tombol submit sudah dipencet atau belum
if (isset($_POST["submit"])) {


    //cek hasil data yang berhasil ditambahkan
    if (tambah($_POST) > 0) {
        echo "
           <script> 
           alert('data berhasil ditambahkan');
           document.location.href = 'index.php';
           </script>
        ";
    } else {
        echo "
           <script> 
            alert('data gagal ditambahkan');
            document.location.href = 'index.php';
           </script>
        ";
    }
}

?>
<!-- AKHIR PHP -->

<!-- HTML -->
<!DOCTYPE html>
<html lang="en">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

<head>
    <title>Tambah data musik</title>
</head>

<body style="background-color: #111111;">
    <h1 class="text-light mb-4 mt-2">⠀𝗧𝗮𝗺𝗯𝗮𝗵 𝗗𝗮𝘁𝗮 𝗠𝘂𝘀𝗶𝗸</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <div class="text-light mb-1">
                <label for="judul_musik">Judul Lagu : ⠀</label>
                <input type="text" name="judul_musik" id="judul_musik" required>
            </div>

            <div class="text-light mb-1">
                <label for="genre">⠀⠀⠀Genre : ⠀</label>
                <input type="text" name="genre" id="genre" required>
            </div>

            <div class="text-light mb-1">
                <label for="tahun_rilis">Tahun Rilis : ⠀</label>
                <input type="text" name="tahun_rilis" id="tahun_rilis" required>
            </div>

            <div class="text-light mb-1">
                <label for="penyanyi">⠀Penyanyi : ⠀</label>
                <input type="text" name="penyanyi" id="penyanyi" required>
            </div>

            <div class="text-light mb-3">
                <label for="album">Album : </label>
                <input type="file" name="album" id="album" required>
            </div>

            <div class="mb-2">
                <button type="submit" name="submit">Manambahkan Data!</button>
            </div>

            <a href="index.php" name="index" class="btn badge btn-danger"><--- Back home</a>

        </ul>

    </form>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</html>
<!-- AKHIR HTML -->