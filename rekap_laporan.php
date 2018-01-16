<?php

include "pdf/class.ezpdf.php"; //class ezpdf yg di panggil
$pdf = new Cezpdf();

//Set margin dan font
$pdf->ezSetCmMargins(3, 3, 3, 3);
$pdf->selectFont('pdf/fonts/Courier.afm');

//Tampilkan gambar di dokumen PDF
$pdf->addJpegFromFile('sipi.jpg',31,778,90);

//Teks di tengah atas untuk judul header
$pdf->addText(187, 800, 18,'<b>REKAP DATA TRANSAKSI</b>');
$pdf->addText(205, 780, 14,'<b>WARUNG SEAFOOD YU GUN</b>');

//Garis atas untuk header
$pdf->line(31, 770, 565, 770);

//Garis bawah untuk footer
$pdf->line(31, 50, 565, 50);

//Teks kiri bawah
$pdf->addText(410,34,8,'Dicetak tgl:' . date( 'd-m-Y, H:i:s'));

// Baca input tanggal yang dikirimkan user
$dari = date_format(date_create($_POST['awal']), 'Y-m-d');
$sampai = date_format(date_create($_POST['akhir']), 'Y-m-d');
//echo "$mulai $selesai";exit;

//Menampilkan isi dari database
//Koneksi ke database dan tampilkan datanya
include 'koneksi.php';
// $angkatan=$_GET['angkatan'];
$tampil = "SELECT `no_faktur`, tgl_transaksi , jumlah, harga, SUM(jumlah*harga) AS total FROM `tb_transaksi` 
    LEFT JOIN `tb_menu` ON `tb_menu`.`id_menu`=`tb_transaksi`.`id_menu` 
    WHERE `tgl_transaksi` BETWEEN '$dari' AND '$sampai'
    GROUP BY `no_faktur`";
//echo $tampil;exit;
$sql = mysqli_query($conn,$tampil);

//Menghitung jumlah data pada database				
$jml = mysqli_num_rows($sql);
//echo $jml;exit;
if ($jml > 0){

$i = 1;
$total=0;
while($r = mysqli_fetch_array($sql)) {

//Format Menampilkan data di ezPdf
	$data[$i]=array('No'=>$i,
			       'No Faktur'=>"$r[no_faktur]",
				   'Tgl Transaksi'=>"$r[tgl_transaksi]",
				   'Bayar'=>"Rp. $r[total]"
				   // 'Umur'=>"$r[umur] Tahun",
				   // 'Angkatan'=>"$r[tahun_daftar]"
				   );
	$i++;
	$total=$total+$r['total'];
}

//Tampilkan Dalam Bentuk Table
$pdf->ezTable($data);

$pdf->ezText("\n\nRange Transaksi: $dari - $sampai. ");
$pdf->ezText("Total Bayar: Rp. $total. ");

// Penomoran halaman
$pdf->ezStartPageNumbers(564, 20, 8);
$pdf->ezStream();
}

else{

	echo "
	<script>
	alert('Data Transaksi Tidak Ada');
	window.location=\"index.php?page=laporan\";
	</script>
	";

}

?>