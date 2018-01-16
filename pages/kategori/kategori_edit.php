<?php
include_once("koneksi.php");
$q="UPDATE `tb_kategori` SET `kategori`='$_POST[kategori]',`menu_kategori`='$_POST[kategori_menu]' WHERE `id_kategori`='$_POST[id_kategori]'";
mysqli_query($conn, $q);
//Header("Location:index.php?pg=admin");
echo "<script>
	window.location='index.php?pg=kategori';
</script>";
?>
