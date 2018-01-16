<?php
include_once("koneksi.php");
$q="DELETE FROM `tb_kategori` WHERE id_kategori='$_GET[id_kategori]'";
mysqli_query($conn, $q);
//Header("Location:index.php?pg=admin");
echo "<script>
	window.location='index.php?pg=kategori';
</script>";
?>
