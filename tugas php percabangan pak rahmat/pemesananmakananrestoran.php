<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pemesanan Makanan Restoran</title>
    <style>
        :root {
            --sky-blue: #87ceeb;
            --sky-blue-dark: #4682b4;
            --white: #ffffff;
            --gray-light: #f0f8ff;
            --gray-dark: #555555;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, var(--sky-blue) 0%, var(--gray-light) 100%);
            margin: 0;
            padding: 20px;
            color: var(--gray-dark);
        }

        h2 {
            text-align: center;
            color: var(--sky-blue-dark);
            margin-bottom: 30px;
            text-shadow: 1px 1px 2px rgba(70, 130, 180, 0.7);
        }

        form {
            max-width: 400px;
            margin: 0 auto 40px auto;
            background-color: var(--white);
            padding: 25px 30px;
            border-radius: 12px;
            box-shadow: 0 8px 15px rgba(70, 130, 180, 0.3);
            transition: box-shadow 0.3s ease;
        }

        form:hover {
            box-shadow: 0 12px 25px rgba(70, 130, 180, 0.5);
        }

        label {
            font-weight: 600;
            display: block;
            margin-bottom: 8px;
            color: var(--sky-blue-dark);
        }

        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 20px;
            border: 2px solid var(--sky-blue);
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        select:focus {
            border-color: var(--sky-blue-dark);
            outline: none;
            box-shadow: 0 0 8px var(--sky-blue-dark);
        }

        button {
            width: 100%;
            background-color: var(--sky-blue-dark);
            color: var(--white);
            font-size: 18px;
            font-weight: 700;
            padding: 12px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            box-shadow: 0 5px 10px rgba(70, 130, 180, 0.4);
        }

        button:hover {
            background-color: #315f8a;
        }

        hr {
            max-width: 400px;
            margin: 40px auto;
            border: 0;
            border-top: 2px solid var(--sky-blue);
            opacity: 0.6;
        }

        .nota {
            max-width: 400px;
            margin: 0 auto;
            background-color: var(--white);
            padding: 25px 30px;
            border-radius: 12px;
            box-shadow: 0 8px 15px rgba(70, 130, 180, 0.3);
            color: var(--sky-blue-dark);
        }

        .nota h3 {
            text-align: center;
            margin-bottom: 20px;
            text-shadow: 1px 1px 2px rgba(70, 130, 180, 0.7);
        }

        .nota p {
            font-size: 16px;
            margin: 8px 0;
        }

        .nota strong {
            display: block;
            margin-top: 15px;
            font-size: 20px;
            color: #1a3e72;
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Pemesanan Makanan Restoran</h2>

    <form method="post">
        <label for="nama">Nama Pelanggan:</label>
        <input type="text" id="nama" name="nama" required>

        <label for="menu">Menu Makanan:</label>
        <select id="menu" name="menu" required>
            <option value="Nasi Goreng">Nasi Goreng (Rp 20.000)</option>
            <option value="Mie Ayam">Mie Ayam (Rp 15.000)</option>
            <option value="Soto">Soto (Rp 18.000)</option>
            <option value="Bakso">Bakso (Rp 12.000)</option>
        </select>

        <label for="jumlah">Jumlah Porsi:</label>
        <input type="number" id="jumlah" name="jumlah" min="1" required>

        <button type="submit">Pesan Makanan</button>
    </form>

    <hr>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama   = htmlspecialchars($_POST['nama']);
        $menu   = $_POST['menu'];
        $jumlah = (int)$_POST['jumlah'];

        if ($menu == "Nasi Goreng") {
            $harga = 20000;
        } elseif ($menu == "Mie Ayam") {
            $harga = 15000;
        } elseif ($menu == "Soto") {
            $harga = 18000;
        } else {
            $harga = 12000;
        }

        $total = $harga * $jumlah;

        if ($jumlah >= 10) {
            $diskon = 0.25 * $total;
        } elseif ($jumlah >= 5) {
            $diskon = 0.15 * $total;
        } else {
            $diskon = 0;
        }

        $bayar = $total - $diskon;

        echo '<div class="nota">';
        echo "<h3>Nota Pembelian</h3>";
        echo "<p><strong>Nama Pelanggan:</strong> $nama</p>";
        echo "<p><strong>Menu:</strong> $menu</p>";
        echo "<p><strong>Jumlah Porsi:</strong> $jumlah</p>";
        echo "<p><strong>Harga Satuan:</strong> Rp" . number_format($harga, 0, ',', '.') . "</p>";
        echo "<p><strong>Total Harga:</strong> Rp" . number_format($total, 0, ',', '.') . "</p>";
        echo "<p><strong>Diskon:</strong> Rp" . number_format($diskon, 0, ',', '.') . "</p>";
        echo "<strong>Total Bayar: Rp" . number_format($bayar, 0, ',', '.') . "</strong>";
        echo '</div>';
    }
    ?>
</body>
</html>