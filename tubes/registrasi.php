<!-- PHP -->
<?php
require 'functions.php';

if (isset($_POST["register"])) {
    if (registrasi($_POST) > 0) {
        echo "
           <script> 
           alert('user berhasil ditambahkan!');
           </script>
        ";
    } else {
        echo mysqli_error($conn);
    }
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <title>Halaman Registrasi</title>
</head>

<body style="background-color: #111111;">
    <div class="text-center">
    <h1 class="text-light mb-2 mt-5">⠀𝙍𝙚𝙜𝙞𝙨𝙩𝙧𝙖𝙨𝙞</h1>
    <p class="text-center" style="color: #fff;">⠀⠀⠀𝘋𝘢𝘧𝘵𝘢𝘳 𝘶𝘯𝘵𝘶𝘬 𝘮𝘢𝘴𝘶𝘬 𝘬𝘦𝘥𝘢𝘭𝘢𝘮 𝘸𝘦𝘣𝘴𝘪𝘵𝘦</p>

    <form action="" method="post">
        <ul>
            <div class="mb-1">
                <label for="username"></label>
                <input type="text" placeholder="Username" name="username" id="username">
            </div>
            <div class="mb-1">
                <label for="password"></label>
                <input type="password" placeholder="Password" name="password" id="password">
            </div>
            <div class="mb-1">
                <label for="password2"></label>
                <input type="password" placeholder="Konfirmasi Password" name="password2" id="password2">
            </div>
            <div class="mb-2">
                <button type="submit" name="register" class="btn badge btn-primary">𝗦𝗜𝗚𝗡 𝗨𝗣!</button>
            </div>

            <a href="login.php" class="btn badge btn-danger">Login</a>
        </ul>

    </form>
    </div>

</body>

</html>
<!-- AKHIR HTML -->