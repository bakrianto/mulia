<?php
include_once("koneksi.php");
$q="UPDATE `tb_menu` SET `id_kategori`='$_POST[id_kategori]',`nama_menu`='$_POST[nama_menu]',`harga`='$_POST[harga]' WHERE `id_menu`='$_POST[id_menu]'";
mysqli_query($conn, $q);

echo "<script>
	window.location='index.php?pg=barang';
</script>";
?>
