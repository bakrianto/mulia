<?php
include_once("koneksi.php");
$detail=mysqli_query($conn,"SELECT * FROM `tb_transaksi` LEFT JOIN `tb_menu` ON `tb_menu`.`id_menu`=`tb_transaksi`.`id_menu` WHERE `no_faktur`='$_POST[faktur]'");
?>               
<!-- <div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Menu</th>
                <th>Harga</th>
                 <th>Username</th> -->
          <!--   </tr>
        </thead>
        <tbody> -->
        <?php
        $no=1; 
        while ($det=mysqli_fetch_array($detail)) {
            echo "
                <tr>
                    <td>$no</td>
                    <td>$det[nama_menu]</td>
                    <td>$det[harga]</td>
                    <td>$det[jumlah]</td>
                </tr>
            ";
            $no++;
        } die();
        ?>
 <!--        </tbody>
    </table>
</div> -->