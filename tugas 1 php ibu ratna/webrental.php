<?php
$hari = $_POST['hari'];
$biaya_mobil = 350000;
$biaya_supir = 150000;
$biaya_asuransi = 30000;
$total_biaya = ($biaya_mobil + $biaya_supir) * $hari + $biaya_asuransi;

echo "Total biaya sewa mobil selama $hari hari adalah Rp. $total_biaya";
?>