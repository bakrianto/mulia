<?php
include_once("koneksi.php");
$q="UPDATE `setting` SET `minsupport`='$_POST[minsupport]',`minconfiden`='$_POST[minconfiden]' WHERE `id_setting`='$_POST[id_setting]'";
mysqli_query($conn, $q);
//window.location='index.php?pg=setting&act=setting&id_setting=1';
echo "<script>
	window.location='index.php?pg=setting&act=setting&id_setting=1';
</script>";
?>
