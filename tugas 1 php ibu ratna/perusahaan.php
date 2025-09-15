<?php
$upah_perhari = 125000;
$jam_perhari = 8;
$hari_perminggu = 7;
$jumlah_lembur = 2;
$upah_lembur_perjam = 35000;
$jam_lembur_perkali = 3;

$upah_harian = $upah_perhari * $hari_perminggu;
$upah_mingguan = $upah_harian * $hari_perminggu;

$total_lembur_mingguan = $jumlah_lembur * $jam_lembur_perkali * $upah_lembur_perjam;

$total_permingguan = $upah_mingguan + $total_lembur_mingguan;

$total_bulanan = $total_permingguan * 4;

echo "<h2>Perhitungan Upah Pekerja</h2>";

echo "sebuah perusahaan memperkerjakan, pekerja dengan perminggu upah perhari 125rb perjam selama 8 jam dalam seminggu terdapat 2× lembur dengan durasi waktu 3 jam tambahan waku lembur, upah lembur perjam 35rb, buat program untuk
 menentukan total upah yang di terima oleh pekerja tersebut selama seminggu dan sebulan<br><br>";

echo "Upah harian: Rp $upah_harian<br>";
echo "Upah mingguan: Rp $upah_mingguan<br>";
echo "Total lembur mingguan: Rp $total_lembur_mingguan<br>";
echo "Total upah mingguan (termasuk lembur): Rp $total_permingguan<br>";
echo "Total upah bulanan: Rp $total_bulanan<br>";
?>