<?php
include_once("koneksi.php");
?>
<?php if ($_SESSION['userid']==1) {?>
<div class="row">
    <div class="col-md-12">
        <div class="pull-left">
            <h1>Laporan</h1>
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
        <!-- <form action="?pg=transaksi_tambah" method="post">     -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div align="center">
                        <form class="form-inline" action="rekap_laporan.php" method="post">
                            <div class="form-group">
                                
                                <div class="input-group">
                                    <div class="input-group-addon">Tgl Awal</div>
                                    <input type="date" class="form-control" name="awal">
                                </div>
                            </div>
                            -
                            <div class="form-group">
                                
                                <div class="input-group">
                                    <div class="input-group-addon">Tgl Akhir</div>
                                    <input type="date" class="form-control" name="akhir">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Lihat</button>
                        </form>
                    </div>
                </div>
                <!-- <div class="panel-body">
                    
                </div> -->
            </div>
        <!-- </form> -->
    </div>
</div>
<?php } ?>