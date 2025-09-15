<?php
$saldo_awal = $_POST['saldo_awal'];
$bunga = $_POST['bunga'];
$biaya_administrasi = $_POST['biaya_admin'];

$total_tabungan = $saldo_awal + ($saldo_awal * $bunga/100) - $biaya_administrasi;

echo "Total besaran tabungan per bulan adalah $total_tabungan";
?>