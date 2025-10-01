<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Parkir Kendaraan</title>
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

        .karcis {
            max-width: 400px;
            margin: 0 auto;
            background-color: var(--white);
            padding: 25px 30px;
            border-radius: 12px;
            box-shadow: 0 8px 15px rgba(70, 130, 180, 0.3);
            color: var(--sky-blue-dark);
            font-size: 16px;
        }

        .karcis h3 {
            text-align: center;
            margin-bottom: 20px;
            text-shadow: 1px 1px 2px rgba(70, 130, 180, 0.7);
        }

        .karcis p {
            margin: 8px 0;
        }

        .karcis strong {
            display: block;
            margin-top: 15px;
            font-size: 20px;
            color: #1a3e72;
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Parkir Kendaraan</h2>

    <form method="post">
        <label for="plat">Plat Nomor:</label>
        <input type="text" id="plat" name="plat" required>

        <label for="jenis">Jenis Kendaraan:</label>
        <select id="jenis" name="jenis" required>
            <option value="Motor">Motor (Rp 2.000/jam)</option>
            <option value="Mobil">Mobil (Rp 5.000/jam)</option>
            <option value="Bus">Bus (Rp 10.000/jam)</option>
        </select>

        <label for="lama">Lama Parkir (jam):</label>
        <input type="number" id="lama" name="lama" min="1" required>

        <button type="submit">Hitung Biaya Parkir</button>
    </form>

    <hr>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $plat  = htmlspecialchars($_POST['plat']);
        $jenis = $_POST['jenis'];
        $lama  = (int)$_POST['lama'];

        if ($jenis == "Motor") {
            $tarif = 2000;
        } elseif ($jenis == "Mobil") {
            $tarif = 5000;
        } else {
            $tarif = 10000;
        }

        $total = $tarif * $lama;

        if ($lama > 10) {
            $diskon = 0.1 * $total; 
        } else {
            $diskon = 0;
        }

        $bayar = $total - $diskon;

        echo '<div class="karcis">';
        echo "<h3>Karcis Parkir</h3>";
        echo "<p><strong>Plat Nomor:</strong> $plat</p>";
        echo "<p><strong>Jenis Kendaraan:</strong> $jenis</p>";
        echo "<p><strong>Lama Parkir:</strong> $lama jam</p>";
        echo "<p><strong>Tarif per Jam:</strong> Rp" . number_format($tarif, 0, ',', '.') . "</p>";
        echo "<p><strong>Total Tarif:</strong> Rp" . number_format($total, 0, ',', '.') . "</p>";
        echo "<p><strong>Diskon:</strong> Rp" . number_format($diskon, 0, ',', '.') . "</p>";
        echo "<strong>Total Bayar: Rp" . number_format($bayar, 0, ',', '.') . "</strong>";
        echo '</div>';
    }
    ?>
</body>
</html>