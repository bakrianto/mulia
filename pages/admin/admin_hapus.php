<?php
include_once("koneksi.php");
$q="delete from tb_admin
 where id_admin='$_GET[id_admin]'";
mysqli_query($conn, $q);
//Header("Location:index.php?pg=admin");
echo "<script>
	window.location='index.php?pg=admin';
</script>";
?>
