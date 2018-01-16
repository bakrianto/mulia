<?php
date_default_timezone_set('Asia/Jakarta');
include_once("koneksi.php");
$tgl_transaksi=date('Ymd');
$no_faktur=$_POST['no_faktur'];

$menu = $_POST['menu'];
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
		$q="INSERT INTO `tb_transaksi`(`id_transaksi`, `id_menu`, `no_faktur`, `tgl_transaksi`) VALUES (NULL,'".$menu[$i]."','".$no_faktur."','".$tgl_transaksi."')";
		mysqli_query($conn, $q);
    }
  }

echo "<script>
	window.location='index.php?pg=transaksi';
</script>";
?>
