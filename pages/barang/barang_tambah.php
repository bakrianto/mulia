<?php
include_once("koneksi.php");
$q="INSERT INTO `tb_menu`(`id_menu`, `id_kategori`, `nama_menu`, `harga`) VALUES (NULL,'$_POST[id_kategori]','$_POST[nama_menu]','$_POST[harga]')";
mysqli_query($conn, $q);

echo "<script>
	window.location='index.php?pg=barang';
</script>";
?>
