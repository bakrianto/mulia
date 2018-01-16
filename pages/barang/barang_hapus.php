<?php
include_once("koneksi.php");
$q="DELETE FROM `tb_menu` WHERE id_menu='$_GET[id_menu]'";
mysqli_query($conn, $q);

echo "<script>
	window.location='index.php?pg=barang';
</script>";
?>
