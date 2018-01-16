<?php
date_default_timezone_set('Asia/Jakarta');
include_once("koneksi.php");
$tgl_transaksi=date('Ymd');
$no_faktur=$_POST['no_faktur'];

$menu = $_POST['menu'];
$jumlah = $_POST['jumlah'];

// print_r($menu);
// echo "<br>";
// print_r($jumlah);
// die();
  if(empty($menu))
  {
    echo "<script>
 		alert('cek');window.location='index.php?pg=transaksi';
 	</script>";
  }
  else
  {
    $N = count($menu);
    // echo("You selected $N door(s): ");
    for($i=0; $i < $N; $i++)
    {
		$q="INSERT INTO `tb_transaksi`(`id_transaksi`,`id_menu`,`no_faktur`,`tgl_transaksi`,`jumlah`) VALUES (NULL,'".$menu[$i]."','".$no_faktur."','".$tgl_transaksi."','".$jumlah[$i]."')";
		mysqli_query($conn, $q);
    }
  }

echo "<script>
	window.location='index.php?pg=transaksi';
</script>";
?>
