<!-- PHP -->

<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';
$musik = query("SELECT * FROM musik");

// tombol cari ditekan
if (isset($_POST["cari"])) {
    $musik = cari($_POST["keyword"]);
}

?>
<!-- AKHIR PHP -->

<!-- HTML -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gilang Ramadhan</title>

    <!-- AOS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">


</head>

<body style="background-color: #111111;">
<div class="mt-1 text-end">
    <a href="Logout.php" name="logout" class="btn badge btn-danger">Logout⠀⠀⠀</a>
    </div>

    <h1 class="text-center text-light" data-aos="zoom-in" data-aos-duration="1500">𝗣𝗹𝗮𝘆𝗹𝗶𝘀𝘁 𝗠𝘂𝘀𝗶𝗰</h1>

    <div class="text-center">
    <a href="tambah.php" name="tambah" class="btn badge btn-success" data-aos="zoom-in" data-aos-duration="1500">Tambah Data Musik</a>
    </div>
    <br><br>

    <div class="text-center shadow">
    <form action="" method="post">

        <input type="text" name="keyword" size="70" autofocus placeholder="Artis,Lagu,Genre, dan Lainnya" autocomplete="off">
        <button type="submit" name="cari">𝗖𝗮𝗿𝗶</button>

    </form>
    </div>
    <br>

    <div class="container text-center">
    <table border="1" cellpadding="20" cellspacing="0">

        <!-- 1 -->

        <tr>
            <th style="color: #fff;">No.</th>
            <th style="color: #fff;">Album</th>
            <th style="color: #fff;">Judul Lagu</th>
            <th style="color: #fff;">Genre</th>
            <th style="color: #fff;">Tahun Rilis</th>
            <th style="color: #fff;">Penyanyi</th>
            <th style="color: #fff;">Setting</th>
        </tr>

        <!-- bagian 1  -->

        <!-- bagian 2 -->
        <?php $i = 1; ?>
        <?php foreach ($musik as $row) : ?>
            <tr>
                <td class="text-light"><?= $i; ?></td>
                <td data-aos="flip-left" data-aos-duration="650"><img src="img/<?= $row["album"]; ?>" width="100"></td>
                <td class="text-light"><?= $row["judul_musik"]; ?></td>
                <td class="text-light"><?= $row["genre"]; ?></td>
                <td class="text-light"><?= $row["tahun_rilis"]; ?></td>
                <td class="text-light"><?= $row["penyanyi"]; ?></td>
                <td>
                    <a href="ubah.php?id=<?= $row["id"]; ?>" name="ubah" class="btn badge btn-primary" >ubah</a> 
                    <a href="hapus.php?id=<?= $row["id"]; ?>" name="hapus" class="btn badge btn-danger" onclick="return confirm('apakah anda yakin ingin menghapus data?');">hapus</a>
                </td>
            </tr>
            <?php $i++ ?>
        <?php endforeach; ?>
        </div>

        <!-- bagian 2 -->

    </table>

    <!-- AOS -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
    

</body>

</html>

<!-- TUTUP HTML  -->