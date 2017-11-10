<div class="panel panel-gradient">
    <div class="panel-heading">
        <div class="panel-title"><h4 class="title">Report</h4></div>
        <div class="panel-options">
            <a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
        </div>
    </div>
    <div class="panel-body">
        <div class="form-group">
            <div>
                
            </div>
        </div>
    </div>
    <table class="table table-bordered table-responsive">
        <thead>
            <tr>
                <th>No</th>
                <th>Msisdn</th>
                <th>Type</th>
                <th>Content</th>
                <th>Push Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            if(sizeof($transac)>0){
                $no=0;
                foreach($transac as $t){ 
                    $no++;
                    ?>
            <tr>
                <td><?php echo $t->transaction_id; ?></td>
                <td><?php echo $t->msisdn; ?></td>
                <td><?php echo $t->ads_type_name; ?></td>
                <td><?php echo $t->content; ?></td>
                <td><?php echo $t->push_date; ?></td>
                <td><?php echo $t->status; ?></td>
            </tr>
            <?php 
                }
            } else{?>
            <tr><td colspan="5" align="center">Data is empty</td></tr>
            <?php } ?>
        </tbody>
    </table>
    <div class="panel-footer"><?=$pagination?></div>
</div>