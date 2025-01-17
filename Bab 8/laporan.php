<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Keuangan</title>
    <link rel="stylesheet" href="laporan.css">
</head>
<body>

    <!-- Navbar -->
    <nav>
        <div class="wrapper">
            <div class="logo"><a href="kelolauang.php">ACCUTRACK</a></div>
            <div class="menu">
                <ul>
                    <li><a href="dashboard.php">Beranda</a></li>
                    <li><a href="laporanuang.php">Laporan Keuangan</a></li>
                    <li><a href="kelola/kelolauang.php">Kelola Keuangan</a></li>
                    <li><a href="pendapatan/pendapatan.php">Pendapatan</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h2>Laporan Keuangan</h2>

        <div class="form-section">
            <h1>Tambah Transaksi</h1>
            <form id="form">
                <label for="description">Deskripsi:</label>
                <input type="text" id="description" placeholder="Deskripsi transaksi" required>
                
                <label for="amount">Jumlah:</label>
                <input type="number" id="amount" placeholder="Jumlah transaksi" required>
                
                <button type="submit">Tambah</button>
            </form>
        </div>

        <div class="transaction-section">
            <h1>Daftar Transaksi</h1>
            <ul id="transaction-list"></ul>
        </div>

        <div class="total-section">
            <h1>Total Transaksi</h1>
            <p id="total-balance">Rp 0</p>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const form = document.getElementById("form");
            const descriptionInput = document.getElementById("description");
            const amountInput = document.getElementById("amount");
            const transactionList = document.getElementById("transaction-list");
            const totalBalance = document.getElementById("total-balance");

            // Initialize local storage
            let transactions = JSON.parse(localStorage.getItem("transactions")) || [];

            // Display transactions from localStorage
            displayTransactions();

            // Form submit event
            form.addEventListener("submit", function (e) {
                e.preventDefault();

                const description = descriptionInput.value;
                const amount = +amountInput.value; // Convert to number

                if (description && amount) {
                    const transaction = {
                        id: Date.now(),
                        description: description,
                        amount: amount
                    };

                    transactions.push(transaction);
                    localStorage.setItem("transactions", JSON.stringify(transactions));

                    addTransactionToList(transaction);
                    updateTotalBalance();
                    form.reset();
                }
            });

            // Function to add transaction to list
            function addTransactionToList(transaction) {
                const li = document.createElement("li");
                li.innerHTML = `
                    ${transaction.description}
                    <span>Rp ${transaction.amount.toLocaleString()}</span>
                `;
                transactionList.appendChild(li);
            }

            // Function to display all transactions
            function displayTransactions() {
                transactionList.innerHTML = "";
                transactions.forEach(addTransactionToList);
                updateTotalBalance();
            }

            // Function to calculate and update total balance
            function updateTotalBalance() {
                const total = transactions.reduce((acc, transaction) => acc + transaction.amount, 0);
                totalBalance.textContent = `Rp ${total.toLocaleString()}`;
            }

            // Fetch example data asynchronously (Asynchronous)
            async function fetchData() {
                try {
                    const response = await fetch("https://api.exchangerate-api.com/v4/latest/USD"); // Contoh data
                    const data = await response.json();
                    console.log("Exchange rates:", data.rates);
                } catch (error) {
                    console.error("Error fetching data:", error);
                }
            }

            // Fetch data on load
            fetchData();
        });
    </script>
</body>
</html>
