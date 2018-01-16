<?php
include_once("koneksi.php");
?>
<div class="row">
    <div class="col-md-12">
        <div class="text-center">
            <h1>Transaksi</h1>
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
    <div class="col-md-12">
        <form action="?pg=transaksi_tambah" method="post">    
            <div class="no-faktur container">
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
                  <label style="padding: 10px;" for="exampleInputName2">Kode Transaski </label>
                  <input type="text" class="form-control" name="no_faktur" value="<?php echo $kode_otomatis; ?>" readonly>
                </div>   
              </div>
            </div>

            <div class="makanan">
              <div class="col-md-6">
                <div class="panel panel-default">
                  <?php 
                      $B101=mysqli_query($conn, "SELECT * FROM `tb_kategori` WHERE kategori='B101'");
                      while ( $m = mysqli_fetch_array($B101)) {
                  ?>
                  <div class="panel-heading" id="show-menu">                
                    <h4><?php echo $m['menu_kategori']; ?></h4>
                  </div>
                  <hr style="margin: 10px 0 10px;">
                  <div class="panel-body" id="hide-menu">
                    <?php
                      $no=1; 
                      $menu_makan = mysqli_query($conn,"SELECT * FROM `tb_menu` WHERE `id_kategori`='".$m['id_kategori']."'");
                      while ($mm=mysqli_fetch_array($menu_makan)) {
                          $menu_ma = str_replace(" ", "_", $mm['nama_menu']);
                          echo "<div class=\"checkbox\"> 
                          <label style=\"width:200px\"> 
                              <input type=\"checkbox\" name=\"menu[]\" value=\"$mm[id_menu]\" data=\"$menu_ma\">$no.&nbsp;$mm[nama_menu]
                          </label>&nbsp;
                          <input type=\"number\" name=\"jumlah[]\" min=\"1\" id=\"jml\" class=\"$menu_ma\" disabled style=\"width: 80px;\">
                          </div>";
                      $no++;
                      } ?>
                    <hr style="margin: 10px 0 10px;">
                    <?php } ?>
                  </div>
                </div>  
              </div>
            </div>

            <div class="minuman">  
              <div class="col-md-6">
                <div class="panel panel-default">  
                  <?php 
                      $B102=mysqli_query($conn, "SELECT * FROM `tb_kategori` WHERE kategori='B102'");
                      while ( $mi = mysqli_fetch_array($B102)) {
                  ?>
                  <div class="panel-heading" id="show-menu2">
                    <h4><?php echo $mi['menu_kategori']; ?></h4>
                  </div>
                  <hr style="margin: 10px 0 10px;">

                  <div class="panel-body" id="hide-menu2">

                    <?php
                        $no=1; 
                        $menu_minum = mysqli_query($conn,"SELECT * FROM `tb_menu` WHERE `id_kategori`='".$mi['id_kategori']."'");
                        while ($mi_m=mysqli_fetch_array($menu_minum)) {
                             $menu_mi = str_replace(" ", "_", $mi_m['nama_menu']);
                            echo "<div class=\"checkbox\">
                            <label style=\"width:200px\"> 
                                <input type=\"checkbox\" name=\"menu[]\" data=\"$menu_mi\" value=\"$mi_m[id_menu]\">$no.&nbsp;$mi_m[nama_menu]
                            </label>&nbsp;
                            <input type=\"number\" name=\"jumlah[]\" min=\"1\" id=\"jml\" class=\"$menu_mi\" disabled style=\"width: 80px;\"> 
                            </div>";
                        $no++;
                        } ?>
                    <hr style="margin: 10px 0 10px;">
                  <?php } ?>

                  </div>
                </div>
              </div>  
            </div>

            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-warning">Ulangi</button>
            </div>
        </form>
    </div>
</div>
