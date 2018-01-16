<?php
include 'koneksi.php';

$sql = "SELECT * FROM setting";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$minsuport=$row['minsupport'];
		$minconfiden=$row['minconfiden'];
		}
} else {
    echo "0 results";
}

$cek_suport1=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM tb_suport1"));
if ($cek_suport1>0) {
	mysqli_query($conn, "DELETE FROM tb_suport1");
}
$cek_suport2=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM tb_suport2"));
if ($cek_suport2>0) {
	mysqli_query($conn, "DELETE FROM tb_suport2");
}

$tran_sql= "SELECT GROUP_CONCAT(tb_menu.nama_menu SEPARATOR ',') AS gabungan, no_faktur
    FROM tb_transaksi LEFT JOIN tb_menu 
	 ON (tb_transaksi.id_menu = tb_menu.id_menu)
	 GROUP BY tb_transaksi.no_faktur";

	//$cobasql = "SELECT DISTINCT no_faktur FROM `tb_transaksi` ORDER BY no_faktur";
	$tran_query = mysqli_query($conn, $tran_sql);
	$transaksi = array();
	while ($tran = mysqli_fetch_array($tran_query)) {
		$tran_ar= explode(",", $tran['gabungan']);
		$transaksi[$tran['no_faktur']]=$tran_ar;
	}

$countdata=count($transaksi);

// ==========================================================
// 
$faktur = 10000;
$tot_fak=$faktur+$countdata;

$menu2 = mysqli_query($conn,"SELECT * FROM tb_menu");
$menu_array=array();
while ($m_a= mysqli_fetch_array($menu2)) {
	$menu_array[]=$m_a['nama_menu'];
	$kategori[]=$m_a['id_kategori'];
}

for ($j=0; $j < count($menu_array); $j++) { 
	$jum = 0;
	for ($i=$faktur; $i <= $tot_fak; $i++) { 
		if (in_array($menu_array[$j],$transaksi[$i])) {
			$jum = $jum+1;
		}
	}
	$persen=round($jum/$countdata * 100,2);
	// seleksi minsuport
	if ($persen>=$minsuport) {
		// echo $menu_array[$j]." = ".$jum."-".$persen." %<br>";
		$ins_sup_1="INSERT INTO `tb_suport1`(`itemset_1`, `id_kategori`, `frekuensi`, `suport`) VALUES ('$menu_array[$j]','$kategori[$j]','$jum','$persen')";
		$ins_sup_1_query=mysqli_query($conn,$ins_sup_1);
	}
	// echo $menu_array[$j]." = ".$jum."-".$persen." %<br>";
}

$item1 = count($menu_array) - 1; // minus 1 from count
$item2 = count($menu_array);
$itemset_2=array();
// MENDAPAT JUMLAH GABUNGAN
for($i = 0; $i < $item1; $i++) {
    for($j = $i+1; $j < $item2; $j++) {
    	$jum2=0;
    	$conf2=0;

    	for ($k=$faktur; $k <= $tot_fak; $k++) { 
    		// item1 , item2
			if (in_array($menu_array[$i],$transaksi[$k]) AND in_array($menu_array[$j],$transaksi[$k])) {
				$jum2 = $jum2+1;

			}
			// item1
			if (in_array($menu_array[$i],$transaksi[$k])) {
				$conf2 = $conf2+1;
			}
		}
		$persen2=round($jum2/$countdata * 100,2);
        $confiden2=round($jum2/$conf2 * 100,2);
		// seleksi minsuport
		//if ($persen2>=$minsuport AND $confiden2>=$minconfiden) {
		if ($persen2>=$minsuport) {
			// $item_pair = $menu_array[$i].'-'.$menu_array[$j];
			// print_r( $item_pair." = ".$jum2."-".$persen2." % -".$confiden2." %<br>");
			//$itemset_2[$i]=array($menu_array[$i],$menu_array[$j]);
			
			$ins_sup_2="INSERT INTO `tb_suport2`(`id_kategori`, `itemset_1`, `itemset_2`, `frekuensi`, `suport`, `confiden`) VALUES ('$kategori[$j]','$menu_array[$i]','$menu_array[$j]','$jum2','$persen2','$confiden2')";
			$ins_sup_2_query=mysqli_query($conn,$ins_sup_2);
		}

    }
}

echo "<script>
	window.location='index.php?pg=apriori&get=apriori&s=$minsuport&c=$minconfiden';
</script>";
?>