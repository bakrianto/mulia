<?php
include_once("koneksi.php");
$q = mysqli_query($conn, "SELECT `no_faktur`, tgl_transaksi ,COUNT(nama_menu) AS jml_data, jumlah, harga, SUM(jumlah*harga) AS total FROM `tb_transaksi` 
    LEFT JOIN `tb_menu` ON `tb_menu`.`id_menu`=`tb_transaksi`.`id_menu` 
    GROUP BY `no_faktur`");
/*$q = mysqli_query($conn, "SELECT * FROM tb_transaksi JOIN tb_menu USING (id_menu) WHERE no_faktur='$_GET[no_faktur]'");*/
?>
<?php if ($_SESSION['userid']==1) {?>
<div class="row">
    <div class="col-md-12">
        <div class="text-center">
            <h1>Data Transaksi</h1>
        </div>
        <div class="pull-right">
            <p id="realtgl" class="datetime"></p>
            <p id="realwaktu" class="datetime"></p>
        </div>
    </div>
</div>
<hr style="margin-top: 0px; ">
<div class="container">
    <div class="row">
        <div class="panel-heading">
            <a class="btn btn-info text-center" href="?pg=transaksi_form"><i class="fa fa-plus fa-fw"></i> Tambah</a>
        </div>
    </div>
        <div class="panel panel-default">
            <table class="table table-bordered">
              <tr>
                <th>No</th>
                <th>Tanggal Transaksi</th>
                <th>Kode Transaksi</th>
                <th>Jumlah Barang</th>
                <th>Total Dibayar</th>
                <th>Aksi</th>
              </tr>
            <?php
            while ($data=mysqli_fetch_assoc($q)){ 
            $i++;
            ?>
              <tr>
                <td><?=$i?></td>
                <td><?=$data["tgl_transaksi"]?></td>
                <td><?=$data["no_faktur"]?></td>
                <td><?=$data["jml_data"]?></td>
                <td>Rp. <?=$data["total"]?>, 00</td>
                <td><a class="btn btn-info" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" id="detail" data-data="transaksi_detail.php" data-id="<?=$data["no_faktur"]?>"><i class="fa fa-info fa-fw"></i> Detail</a>&nbsp;
            <a class="btn btn-danger" href="?pg=transaksi_hapus&no_faktur=<?=$data["no_faktur"]?>"><i class="fa fa-trash-o fa-fw"></i>Hapus</a></td>
              </tr>
            <?php } ?>
            </table>
        </div>
    </div>
</div>
<?php } else { ?>
<div class="row">
    <div class="col-md-12">
        <div class="text-center">
            <h1>Data Transaksi</h1>
        </div>
        <div class="pull-right">
            <p id="realtgl" class="datetime"></p>
            <p id="realwaktu" class="datetime"></p>
        </div>
    </div>
</div>
<hr style="margin-top: 0px; ">
<div class="container">
    <div class="row">
            <table class="table table-bordered">
              <tr>
                <th>No</th>
                <th>Tanggal Transaksi</th>
                <th>Kode Transaksi</th>
                <th>Jumlah Barang</th>
                <th>Total Dibayar</th>
                <th>Aksi</th>
              </tr>
            <?php
            while ($data=mysqli_fetch_assoc($q)){ 
            $i++;
            ?>
              <tr>
                <td><?=$i?></td>
                <td><?=$data["tgl_transaksi"]?></td>
                <td><?=$data["no_faktur"]?></td>
                <td><?=$data["jml_data"]?></td>
                <td>Rp. <?=$data["total"]?>, 00</td>
                <td><a class="btn btn-info" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" id="detail" data-data="transaksi_detail.php" data-id="<?=$data["no_faktur"]?>"><i class="fa fa-info fa-fw"></i> Detail</a></td>                
              </tr>
            <?php } ?>
            </table>
        </div>
    </div>
</div>
<?php } ?>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Detail Pesanan</h4>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Menu</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody id="data-det">
                        
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
