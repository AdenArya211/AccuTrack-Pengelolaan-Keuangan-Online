<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Pengelola Keuangan</title>
    <style>
        body {
            background-color: #00b9ff;
            font-family: Arial, sans-serif;
            color: #ffffff; 
            margin: 0;
            padding: 0;
        }

        h1 {
            font-size: 2.5em;
            color: #ffffff; 
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

        input[type="text"], input[type="password"] {
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
            background-color: #808080; 
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

        #toast {
            visibility: hidden; 
            min-width: 250px;
            margin: 0 auto;
            background-color: #ff3333; 
            color: #fff;
            text-align: center;
            border-radius: 5px;
            padding: 16px;
            position: fixed;
            z-index: 1000; 
            left: 50%;
            top: 30px; 
            transform: translateX(-50%);
            opacity: 0;
            transition: opacity 0.5s, top 0.5s;
        }

        #toast.show {
            visibility: visible;
            opacity: 1;
            top: 50px; 
        }

        /* Snackbar untuk login sukses */
        #toast-success {
            visibility: hidden;
            min-width: 250px;
            margin: 0 auto;
            background-color: #4caf50; /* Warna hijau untuk sukses */
            color: #fff;
            text-align: center;
            border-radius: 5px;
            padding: 16px;
            position: fixed;
            z-index: 1000;
            left: 50%;
            top: 30px;
            transform: translateX(-50%);
            opacity: 0;
            transition: opacity 0.5s, top 0.5s;
        }

        #toast-success.show {
            visibility: visible;
            opacity: 1;
            top: 50px;
        }
    </style>
</head>
<body>
    <center>
        <h1>Login ke Akun Anda</h1>
        <form action="login-proses.php" method="post">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username"><br><br>

            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password"><br><br>

            <input type="submit" value="Login">
        </form>

        <p>Belum punya akun? <a href="register.php">Daftar di sini</a></p>
        
    </center>

    <script>
        const toast = document.getElementById('toast');
        if (toast) {
            // Tampilkan toast jika ada pesan error
            toast.classList.add('show');
            setTimeout(function() {
                toast.classList.remove('show');
            }, 3000);
        }
    </script>
</body>
</html>