<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index - Pengelola Keuangan</title>
    <style>
        body {
            background-color: #00b9ff; 
            font-family: Arial, sans-serif;
            color: #ffffff; 
            margin: 0;
            padding: 0;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        h1 {
            font-family: "Lexend Giga";
            font-size: 3em;
            color: #ffffff; 
            margin: 20px 0;
        }

        h2 {
            font-family: "Lexend Giga";
            font-size: 1.5em;
            color: #ffffff;
            margin-bottom: 10px;
        }

        p {
            font-family: "Lexend Giga";
            font-size: 1.2em;
            margin: 10px 0;
        }
        
        a.tbl-atas{
            background: #2977d5;
            border-radius: 20px;
            margin-top: 20px;
            padding: 15px 20px;
            color: #ffffff;
            cursor: pointer;
            font-weight: bold;
        }

        a.tbl-atas:hover{
            background: #276e87;
            text-decoration:none;
        }

        a {
            text-decoration: none;
            color: #00796b;
            font-weight: bold;
            padding: 10px 20px;
            background-color: #b2dfdb;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #ffffff; 
        }

        center {
            margin-top: 10%;
        }

        /* Style untuk mode malam */
        .night-mode {
            background-color: #2c2c2c;
            color: #cccccc;
        }

        /* Tombol Mode Malam */
        .night-toggle {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 10px 20px;
            background-color: #ffcc00;
            color: #000;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            transition: background-color 0.3s ease;
        }

        .night-toggle:hover {
            background-color: #e6b800;
        }
    </style>
</head>
<body>
    <center>
        <h1>ACCUTRACK</h1>
        <h2>Pengelola Keuangan Online Akurat dan Cepat</h2>
        <p>Kelola Keuanganmu Secara Online dengan Cepat dan Mudah!!</p>
        <br>
        <p><a href="dashboard.php" class="tbl-atas">Pelajari Lebih Lanjut</a></p>
    </center>

    <button class="night-toggle" id="toggleNightMode">Mode Malam</button>

    <script>
        const toggleButton = document.getElementById('toggleNightMode');
        
        toggleButton.addEventListener('click', function() {
            
            document.body.classList.toggle('night-mode');

            if(document.body.classList.contains('night-mode')) {
                toggleButton.textContent = 'Mode Siang';
            } else {
                toggleButton.textContent = 'Mode Malam';
            }
        });
    </script>
</body>
</html>