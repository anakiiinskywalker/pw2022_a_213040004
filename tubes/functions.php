<?php

// koneksi ke databases
$conn = mysqli_connect("localhost", "root", "", "tubes_pw2022_a_213040004");


function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


function tambah($data)
{
    global $conn;

    $judul_musik = htmlspecialchars($data["judul_musik"]);
    $genre = htmlspecialchars($data["genre"]);
    $tahun_rilis = htmlspecialchars($data["tahun_rilis"]);
    $penyanyi = htmlspecialchars($data["penyanyi"]);

    // UPLOAD GAMBAR 
    $album = upload();
    if (!$album) {
        return false;
    }

    // query insert DATA
    $query = "INSERT INTO musik
                VALUES
                ('', '$judul_musik', '$genre', '$tahun_rilis', '$penyanyi', '$album')
                ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload()
{
    $namaFile = $_FILES['album']['name'];
    $ukuranFile = $_FILES['album']['size'];
    $error = $_FILES['album']['error'];
    $tmpName = $_FILES['album']['tmp_name'];

    // Cek apakah tidak ada gambar yang di upload
    if ($error === 4) {
        echo "<script>
              alert('pilih gambar terlebih dahulu!');  
            </script>";
        return false;
    }

    // untuk cek yang diupload adalah gambar.
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
              alert('yang anda upload bukan gambar!');  
            </script>";
        return false;
    }
    //cek jika ukurannya terlalu besar
    if ($ukuranFile > 1000000) {
        echo "<script>
              alert('Ukuran gambar terlalu besar!');  
            </script>";
        return false;
    }

    // lolos pengecekan gambar siap diupload
    //generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;


    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;
}


function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM musik WHERE id = $id");
    return mysqli_affected_rows($conn);
}



function ubah($data)
{
    global $conn;

    $id = $data["id"];
    $judul_musik = htmlspecialchars($data["judul_musik"]);
    $genre = htmlspecialchars($data["genre"]);
    $tahun_rilis = htmlspecialchars($data["tahun_rilis"]);
    $penyanyi = htmlspecialchars($data["penyanyi"]);
    $albumLama = htmlspecialchars($data["albumLama"]);

    //cek pakah user pilih gambar baru atau tidak
    if ($_FILES['album']['error'] === 4) {
        $album = $albumLama;
    } else {
        $album = upload();
    }



    // query insert DATA
    $query = "UPDATE musik SET
                judul_musik = '$judul_musik',
                genre = '$genre',
                tahun_rilis = '$tahun_rilis',
                penyanyi = '$penyanyi',
                album = '$album'
                WHERE id = $id
                ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function cari($keyword)
{
    $query = "SELECT * FROM musik
                WHERE
                judul_musik LIKE '%$keyword%' OR
                genre LIKE '%$keyword%' OR
                tahun_rilis LIKE '%$keyword%' OR
                penyanyi LIKE '%$keyword%'
                ";
    return query($query);
}


function registrasi($data)
{
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user 
        WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('username sudah terdaftar!');
              </script>";
        return false;
    }


    // cek konfirmasi password
    if ($password !== $password2) {
        echo "<script>
                alert('konfirmasi password tidak sesuai!');
              </script>";
        return false;
    }
    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);


    // tambahkan user baru ke databases
    mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");

    return mysqli_affected_rows($conn);
}
