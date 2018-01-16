<div class="row">
<div class="col-md-12">
        <div class="panel-body">
            <table class="table">
              <tr>
                <th>No</th>
                <th>Rule</th>
                <th>Support</th>
                <th>Confiden</th>
              </tr>
            <?php
            $confiden3=mysqli_query($conn,"SELECT * FROM tb_suport2 WHERE confiden >='$_GET[c]' ORDER BY confiden DESC, suport DESC");
            while ($c3=mysqli_fetch_assoc($confiden3)){ 
            $k++;
            ?>
              <tr>
                <td><?=$k?></td>
                <td>Menu <?=$c3["itemset_1"]?> ==> Menu <?=$c3["itemset_2"]?></td>
                <td><?=$c3["suport"]?> %</td>
                <td><?=$c3["confiden"]?> %</td>
              </tr>
            <?php } ?>
            </table>
        </div>
    </div>
</div>
</div>
<div class="row" style="margin-bottom: -15px;">
    <div class="panel-footer">
        <a href="?pg=apriori&get=apriori&s=<?php echo $minsupport; ?>&c=<?php echo $minconfiden; ?>" class="btn btn-primary">Kembali</a>
    </div>    
</div>