﻿<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Pengelola Keuangan</title>
    <style>
        body {
            background-color: #00b9ff; /* Warna biru laut yang cerah */
            font-family: Arial, sans-serif;
            color: #ffffff; /* Warna teks */
            margin: 0;
            padding: 0;
        }

        h1 {
            font-size: 2.5em;
            color: #ffffff; /* Biru laut tua untuk judul */
            margin: 20px 0;
        }

        form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin: 20px auto;
        }

        label {
            font-size: 1.1em;
            color: #004d40;
        }

        input[type="text"], input[type="password"], input[type="email"] {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #00796b;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #00b9ff;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            transition: background-color 0.3s ease;
        }

            input[type="submit"]:hover {
                background-color: #808080; /* Perubahan warna saat di-hover */
            }

        p {
            font-size: 1em;
        }

        a {
            color: #00796b;
            text-decoration: none;
        }

            a:hover {
                text-decoration: underline;
            }

        center {
            margin-top: 10%;
        }
    </style>
</head>
<body>
    <center>
        <h1>Daftar Akun Baru</h1>
        <form action="login.php" method="POST">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" required><br><br>

            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br><br>

            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required><br><br>
            <input type="submit" value="Daftar">
        </form>
    <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
    </center>
</body>
</html>
