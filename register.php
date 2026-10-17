<?php

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if (empty($username) || empty($password)) {
    die("Username dan password wajib diisi.");
}

$file = __DIR__ . DIRECTORY_SEPARATOR . "data.csv";

/* Jika file belum ada, buat file dan header */
if (!file_exists($file)) {

    $fp = fopen($file, "w");

    if ($fp === false) {
        die("Gagal membuat data.csv. Pastikan folder project bisa ditulis.");
    }

    fputcsv($fp, ["Username", "Password"]);

    fclose($fp);
}

/* Buka file untuk menambahkan data */
$fp = fopen($file, "a");

if ($fp === false) {
    die("Gagal membuka data.csv. Pastikan file tidak sedang dibuka di Excel atau program lain.");
}

/* Simpan data */
fputcsv($fp, [
    $username,
    $password
]);

fclose($fp);

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register Berhasil</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #eee;
            text-align: center;
            padding-top: 100px;
        }

        .box {
            background: white;
            width: 400px;
            margin: auto;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.2);
        }

        h1 {
            color: #705a4d;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background: #705a4d;
            color: white;
            text-decoration: none;
            border-radius: 6px;
        }
    </style>
</head>

<body>

    <div class="box">

        <h1>Registrasi Berhasil!</h1>

        <p>Data berhasil disimpan ke data.csv.</p>

        <a href="register.html">
            Kembali ke Register
        </a>

    </div>

</body>
</html>