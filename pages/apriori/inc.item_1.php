<div class="row">
    <div class="col-md-12">
        <div>
            <table class="table table-bordered">
              <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Frekuensi(jumlah)</th>
                <th>Support</th>
              </tr>
            <?php
            $suport1=mysqli_query($conn,"SELECT * FROM tb_suport1 ORDER BY suport DESC");
            while ($s1=mysqli_fetch_assoc($suport1)){ 
            $i++;
            ?>
              <tr>
                <td><?=$i?></td>
                <td><?=$s1["id_kategori"]?></td>
                <td><?=$s1["itemset_1"]?></td>
                <td><?=$s1["frekuensi"]?></td>
                <td><?=$s1["suport"]?> %</td>
              </tr>
            <?php } ?>
            </table>
        </div>
        <div class="pull-left">
            <a href="?pg=apriori&get=apriori_2&s=<?php echo $minsupport; ?>&c=<?php echo $minconfiden; ?>" class="btn btn-primary">Proses Itemset 2</a>
        </div>
    </div>
</div>