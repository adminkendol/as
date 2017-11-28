<div class="panel panel-gradient">
    <div class="panel-heading">
        <div class="panel-title"><h4 class="title">Report</h4></div>
        <div class="panel-options">
            <a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
        </div>
    </div>
    <div class="panel-body">
        <form method="post" action="<?php echo base_url().'core/rep_transac';?>">
            <div class="form-group">
                <div>
                    <label class="col-sm-2 control-label">Push date</label>
                    <div class="col-md-2">
                        <input type="text" class="form-control tgl" name="start" id="start" value="">
                    </div>
                    <div class="col-md-1">To</div>
                    <div class="col-md-2">
                        <input type="text" class="form-control tgl" name="end" id="end" value="">
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="search" id="search" value="<?php echo $search; ?>" placeholder="search missdn">
                    </div>
                    <div class="col-md-2">
                        <button id="show" type="submit" class="btn btn-info">
                            <span class="glyphicon glyphicon-plus"></span> Show
                        </button>
                    </div>
                </div>
            </div>
        </form>
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