<?php
include_once("koneksi.php");
$q=mysqli_query($conn, "SELECT DISTINCT `no_faktur` FROM `tb_transaksi`");
?>
<div class="row">
    <div class="col-md-12">
        <div class="pull-left">
            <h1>Daftar Admin</h1>
        </div>
        <div class="pull-right">
            <p id="realtgl" class="datetime"></p>
            <p id="realwaktu" class="datetime"></p>
        </div>
    </div>
</div>
<hr style="margin-top: 0px; ">
<div class="row">
    <div class="col-md-12">
        
        <div class="panel panel-default">
            <div class="panel-heading">
                <div align="center" ><a class="btn btn-info" href="?pg=transaksi_form"><i class="fa fa-plus fa-fw"></i> Tambah</a></div>
            </div>
            <div class="panel-body">
                <table class="table">
                  <tr>
                    <th>No</th>
                    <th>No Faktur</th>
                    <th>Tgl Transaksi</th>
                    <th>Total Bayar</th>
                    <th>Aksi</th>
                  </tr>
                <?php
                while ($faktur=mysqli_fetch_assoc($q)){ 
                $i++;
                $get_data = mysqli_query($conn,"SELECT `no_faktur`,`tgl_transaksi`,SUM(harga) AS total FROM `tb_transaksi` LEFT JOIN `tb_menu` ON `tb_menu`.`id_menu`=`tb_transaksi`.`id_menu` WHERE `no_faktur`='$faktur[no_faktur]'");
                $data = mysqli_fetch_assoc($get_data);
                ?>
                  <tr>
                    <td><?=$i?></td>
                    <td><?=$data["no_faktur"]?></td>
                    <td><?=$data["tgl_transaksi"]?></td>
                    <td><?=$data["total"]?></td>
                    <td><a class="btn btn-info" href="?pg=makanan_form&act=edit&id_menu=<?=$data["id_menu"]?>"><i class="fa fa-pencil fa-fw"></i> Detail</a>&nbsp;
                <a class="btn btn-danger" href="?pg=makanan_hapus&id_menu=<?=$data["id_menu"]?>"><i class="fa fa-trash-o fa-fw"></i>Hapus</a></td>
                  </tr>
                <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>