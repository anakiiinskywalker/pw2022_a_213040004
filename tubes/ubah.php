<!-- PHP -->
<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

// ambil data di URL
$id = $_GET["id"];

// query data musik berdasarkan id
$msk = query("SELECT * FROM musik WHERE id = $id")[0];


// untuk melihat tombol submit sudah dipencet atau belum
if (isset($_POST["submit"])) {


    //cek hasil data yang berhasil diubah
    if (ubah($_POST) > 0) {
        echo "
           <script> 
           alert('data berhasil diubah');
           document.location.href = 'index.php';
           </script>
        ";
    } else {
        echo "
           <script> 
            alert('data gagal diubah');
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
    <title class=""></title>
</head>

<body style="background-color: #111111;">
    <h1 class="text-light mb-4 mt-2">⠀𝗨𝗯𝗮𝗵 𝗗𝗮𝘁𝗮 𝗠𝘂𝘀𝗶𝗸</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $msk["id"]; ?>">
        <input type="hidden" name="albumLama" value="<?= $msk["album"]; ?>">
        <ul>
            <div class="mb-1">
                <label class="text-light" for="judul_musik">Judul Lagu ⠀⠀⠀: ⠀</label>
                <input type="text" name="judul_musik" id="judul_musik" required value="<?= $msk["judul_musik"]; ?>">
            </div>

            <div class="mb-1">
                <label class="text-light" for="genre">Genre⠀⠀⠀ ⠀⠀⠀: ⠀</label>
                <input type="text" name="genre" id="genre" required value="<?= $msk["genre"]; ?>">
            </div>

            <div class="mb-1">
                <label class="text-light" for="tahun_rilis">Tahun Rilis ⠀⠀⠀: ⠀</label>
                <input type="text" name="tahun_rilis" id="tahun_rilis" required value="<?= $msk["tahun_rilis"]; ?>">
            </div>

            <div class="mb-3">
                <label class="text-light" for="penyanyi">Penyanyi⠀ ⠀⠀⠀: ⠀</label>
                <input type="text" name="penyanyi" id="penyanyi" required value="<?= $msk["penyanyi"]; ?>">
            </div>

            <div class="mb-2">
                <label class="text-light" for="album">Album : </label> <br>
                <img src="img/<?= $msk['album']; ?>" width="70" > <br>
                <input type="file" name="album" id="album" class="text-light">
            </div>

            <div class="mb-3">
                <button type="submit" name="submit">Ubah Data!</button>
            </div>

            <a href="index.php" name="index" class="btn badge btn-danger"><--- Back home</a>

        </ul>

    </form>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</html>
<!-- AKHIR HTML -->