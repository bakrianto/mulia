<?php
include_once("koneksi.php");
?>
<div class="row">
    <div class="col-md-12">
        <div class="pull-left">
            <h1>Transaksi</h1>
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
        <form action="?pg=transaksi_tambah" method="post">    
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php 
                        $carikode = mysqli_query($conn,"select max(no_faktur) from tb_transaksi") or die (mysqli_error());
                        // menjadikannya array
                        $datakode = mysqli_fetch_array($carikode);
                        // jika $datakode
                        if ($datakode) {
                           $nilaikode = substr($datakode[0], 1);
                           // menjadikan $nilaikode ( int )
                           $kode = (int) $nilaikode;
                           // setiap $kode di tambah 1
                           $kode = $kode + 1;
                           $kode_otomatis ="1".str_pad($kode, 4, "0", STR_PAD_LEFT);
                        } else {
                            $kode_otomatis = "0001";
                        }
                    ?>
                    <div class="form-inline">
                      <div class="form-group">
                        <label for="exampleInputName2">No Faktur </label>
                        <input type="text" class="form-control" name="no_faktur" value="<?php echo $kode_otomatis; ?>" readonly>
                      </div>   
                    </div>
                </div>
                <div class="panel-body">
                    <div class="col-md-6">
                    <?php 
                        $makanan=mysqli_query($conn, "SELECT * FROM `tb_kategori` WHERE kategori='makanan'");
                        while ( $m = mysqli_fetch_array($makanan)) {
                    ?>
                        <h4>Menu <?php echo $m['menu_kategori']; ?></h3>
                        <hr style="margin: 10px 0 10px;">
                        <?php
                            $no=1; 
                            $menu_makan = mysqli_query($conn,"SELECT * FROM `tb_menu` WHERE `id_kategori`='".$m['id_kategori']."'");
                            while ($mm=mysqli_fetch_array($menu_makan)) {
                                echo "<div class=\"checkbox\"> <label> 
                                    <input type=\"checkbox\" name=\"menu[]\" value=\"$mm[id_menu]\">$no.&nbsp;$mm[nama_menu]
                                </label></div>";
                            $no++;
                            }
                        ?>
                        <hr style="margin: 10px 0 10px;">
                    <?php } ?>
                    </div>
                    
                    <div class="col-md-6">
                    <?php 
                        $minuman=mysqli_query($conn, "SELECT * FROM `tb_kategori` WHERE kategori='minuman'");
                        while ( $mi = mysqli_fetch_array($minuman)) {
                    ?>
                        <h4>Menu <?php echo $mi['menu_kategori']; ?></h3>
                        <hr style="margin: 10px 0 10px;">
                        <?php
                            $no=1; 
                            $menu_minum = mysqli_query($conn,"SELECT * FROM `tb_menu` WHERE `id_kategori`='".$mi['id_kategori']."'");
                            while ($mi_m=mysqli_fetch_array($menu_minum)) {
                                echo "<div class=\"checkbox\"> <label> 
                                    <input type=\"checkbox\" name=\"menu[]\" value=\"$mi_m[id_menu]\">$no.&nbsp;$mi_m[nama_menu]
                                </label> </div>";
                            $no++;
                            }
                        ?>
                        <hr style="margin: 10px 0 10px;">
                    <?php } ?>
                    </div>
                </div>
                <div class="panel-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="reset" class="btn btn-warning">Ulangi</button>
                </div>
            </div>
        </form>
    </div>
</div>