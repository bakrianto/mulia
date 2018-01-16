<?php
include_once("koneksi.php");
$q="DELETE FROM `tb_transaksi` WHERE `no_faktur`='$_GET[no_faktur]'";
mysqli_query($conn, $q);
//Header("Location:index.php?pg=admin");
echo "<script>
	window.location='index.php?pg=transaksi';
</script>";
?>
