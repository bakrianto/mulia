<div class="row">
    <div class="col-md-12">
        <div class="panel-body">
            <table class="table table-bordered">
              <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Item 1, 2</th>
                <th>Frekuensi(jumlah)</th>
                <th>Support</th>
              </tr>
            <?php
            $suport2=mysqli_query($conn,"SELECT * FROM tb_suport2 ");
            while ($s2=mysqli_fetch_assoc($suport2)){ 
            $j++;
            ?>
              <tr>
                <td><?=$j?></td>
                <td><?=$s2["id_kategori"]?></td>
                <td><?=$s2["itemset_1"]?>, <?=$s2["itemset_2"]?></td>
                <td><?=$s2["frekuensi"]?></td>
                <td><?=$s2["suport"]?> %</td>
              </tr>
            <?php } ?>
            </table>
        </div>
    </div>
</div>
<div class="pull-left">
    <a href="?pg=apriori&get=apriori_3&s=<?php echo $minsupport; ?>&c=<?php echo $minconfiden; ?>" class="btn btn-primary">General rule</a>
</div>