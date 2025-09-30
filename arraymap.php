<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Form Data 10 Siswa</title>
    <style>
        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #a1c4fd, #c2e9fb);
            padding: 40px 20px;
            display: flex;
            justify-content: center;
            min-height: 100vh;
        }
        .container {
            background: #fff;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 900px;
            max-height: 90vh;
            overflow-y: auto;
        }
        h3 {
            color: #0d47a1;
            margin-bottom: 24px;
            font-weight: 700;
            text-align: center;
            text-shadow: 0 1px 3px rgba(13, 71, 161, 0.3);
        }
        label {
            display: block;
            font-weight: 600;
            margin-bottom: 6px;
            color: #1565c0;
        }
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px 14px;
            border: 2px solid #90caf9;
            border-radius: 10px;
            font-size: 16px;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
            outline: none;
            margin-bottom: 14px;
            background: #e3f2fd;
            color: #0d47a1;
            font-weight: 500;
        }

        input[type="text"]:focus,
        input[type="number"]:focus {
            border-color: #0d47a1;
            box-shadow: 0 0 10px #0d47a1aa;
            background: #bbdefb;
        }

        button[type="submit"] {
            width: 100%;
            padding: 14px 0;
            background-color: #1976d2;
            border: none;
            border-radius: 12px;
            color: white;
            font-size: 20px;
            font-weight: 700;
            cursor: pointer;
            margin-top: 20px;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 6px 15px rgba(25, 118, 210, 0.5);
        }

        button[type="submit"]:hover {
            background-color: #0d47a1;
            box-shadow: 0 8px 20px rgba(13, 71, 161, 0.7);
        }

        .result {
            margin-top: 30px;
            background: #e3f2fd;
            padding: 25px 30px;
            border-radius: 14px;
            color: #0d47a1;
            font-size: 16px;
            line-height: 1.6;
            box-shadow: inset 0 0 15px #90caf9;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 12px;
            font-weight: 600;
            color: #0d47a1;
        }

        table th,
        table td {
            border: 1px solid #90caf9;
            padding: 10px 12px;
            text-align: left;
        }

        table th {
            background-color: #bbdefb;
        }

        fieldset {
            border: 2px solid #90caf9;
            border-radius: 14px;
            margin-bottom: 25px;
            padding: 20px 25px;
            background: #f0f7ff;
            box-shadow: 0 4px 12px rgba(25, 118, 210, 0.1);
        }

        legend {
            font-weight: 700;
            color: #1565c0;
            padding: 0 10px;
            font-size: 18px;
            text-shadow: 0 1px 2px rgba(21, 101, 192, 0.3);
        }

        /* Responsive */
        @media (max-width: 480px) {
            .container {
                padding: 20px 25px;
            }

            button[type="submit"] {
                font-size: 18px;
                padding: 12px 0;
            }
        }
    </style>
</head>
<body>
<div class="container">
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $siswa_list = [];

    for ($i = 0; $i < 10; $i++) {
        $inputs = [
            "panggilan"      => $_POST["panggilan"][$i] ?? '',
            "nama_panggilan" => $_POST["nama_panggilan"][$i] ?? '',
            "nama_asli"      => $_POST["nama_asli"][$i] ?? '',
            "umur"           => $_POST["umur"][$i] ?? ''
        ];
        $data = array_map("trim", $inputs);
        $siswa_list[] = $data;
    }

    echo '<div class="result">';
    echo "<h3>Data 10 Siswa</h3>";
    echo "<table>";
    echo "<tr><th>No</th><th>Panggilan</th><th>Nama Panggilan</th><th>Nama Asli</th><th>Umur</th></tr>";
    $no = 1;
    foreach ($siswa_list as $siswa) {
        echo "<tr>";
        echo "<td>" . $no++ . "</td>";
        echo "<td>" . htmlspecialchars($siswa["panggilan"]) . "</td>";
        echo "<td>" . htmlspecialchars($siswa["nama_panggilan"]) . "</td>";
        echo "<td>" . htmlspecialchars($siswa["nama_asli"]) . "</td>";
        echo "<td>" . htmlspecialchars($siswa["umur"]) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    echo '</div>';
}
?>

<form method="post" novalidate>
    <?php for ($i = 0; $i < 10; $i++): ?>
    <fieldset>
        <legend>Siswa <?php echo $i + 1; ?></legend>
        <label for="panggilan-<?php echo $i; ?>">Panggilan:</label>
        <input type="text" id="panggilan-<?php echo $i; ?>" name="panggilan[]" required>

        <label for="nama_panggilan-<?php echo $i; ?>">Nama Panggilan:</label>
        <input type="text" id="nama_panggilan-<?php echo $i; ?>" name="nama_panggilan[]" required>

        <label for="nama_asli-<?php echo $i; ?>">Nama Asli:</label>
        <input type="text" id="nama_asli-<?php echo $i; ?>" name="nama_asli[]" required>

        <label for="umur-<?php echo $i; ?>">Umur:</label>
        <input type="number" id="umur-<?php echo $i; ?>" name="umur[]" min="1" max="150" required>
    </fieldset>
    <?php endfor; ?>
    <button type="submit">Simpan Semua</button>
</form>
</div>
</body>
</html>
