<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Layanan Laundry</title>
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

        .struk {
            max-width: 400px;
            margin: 0 auto;
            background-color: var(--white);
            padding: 25px 30px;
            border-radius: 12px;
            box-shadow: 0 8px 15px rgba(70, 130, 180, 0.3);
            color: var(--sky-blue-dark);
            font-size: 16px;
        }

        .struk h3 {
            text-align: center;
            margin-bottom: 20px;
            text-shadow: 1px 1px 2px rgba(70, 130, 180, 0.7);
        }

        .struk p {
            margin: 8px 0;
        }

        .struk strong {
            display: block;
            margin-top: 15px;
            font-size: 20px;
            color: #1a3e72;
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Layanan Laundry</h2>

    <form method="post">
        <label for="nama">Nama Pelanggan:</label>
        <input type="text" id="nama" name="nama" required>

        <label for="layanan">Jenis Layanan:</label>
        <select id="layanan" name="layanan" required>
            <option value="Laundry Kiloan">Laundry Kiloan (Rp 7.000/kg)</option>
            <option value="Laundry Express">Laundry Express (Rp 10.000/kg)</option>
            <option value="Laundry Satuan">Laundry Satuan (Rp 5.000/pcs)</option>
        </select>

        <label for="jumlah">Jumlah (kg/pcs):</label>
        <input type="number" id="jumlah" name="jumlah" min="1" required>

        <button type="submit">Hitung Biaya</button>
    </form>

    <hr>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama    = htmlspecialchars($_POST['nama']);
        $layanan = $_POST['layanan'];
        $jumlah  = (int)$_POST['jumlah'];

        if ($layanan == "Laundry Kiloan") {
            $tarif = 7000;
        } elseif ($layanan == "Laundry Express") {
            $tarif = 10000;
        } else {
            $tarif = 5000;
        }

        $total = $tarif * $jumlah;

        if ($layanan != "Laundry Satuan") {
            if ($jumlah >= 10) {
                $diskon = 0.2 * $total;
            } elseif ($jumlah >= 5) {
                $diskon = 0.1 * $total;
            } else {
                $diskon = 0;
            }
        } else {
            $diskon = 0;
        }

        $bayar = $total - $diskon;

        echo '<div class="struk">';
        echo "<h3>Struk Laundry</h3>";
        echo "<p><strong>Nama Pelanggan:</strong> $nama</p>";
        echo "<p><strong>Jenis Layanan:</strong> $layanan</p>";
        echo "<p><strong>Jumlah:</strong> $jumlah " . ($layanan == "Laundry Satuan" ? "pcs" : "kg") . "</p>";
        echo "<p><strong>Tarif:</strong> Rp" . number_format($tarif, 0, ',', '.') . " per " . ($layanan == "Laundry Satuan" ? "pcs" : "kg") . "</p>";
        echo "<p><strong>Total Harga:</strong> Rp" . number_format($total, 0, ',', '.') . "</p>";
        echo "<p><strong>Diskon:</strong> Rp" . number_format($diskon, 0, ',', '.') . "</p>";
        echo "<strong>Total Bayar: Rp" . number_format($bayar, 0, ',', '.') . "</strong>";
        echo '</div>';
    }
    ?>
</body>
</html>