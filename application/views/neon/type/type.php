<div class="panel  panel-gradient">
    <div class="panel-heading">
        <div class="panel-title"><h4 class="title">Ads Type Stats</h4></div>
        <div class="panel-options">
            <a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
        </div>
    </div>
    <div class="panel-body">
        <div class="form-group">
            <div>
                <a type="button" href="<?php echo base_url().'core/addtype/'; ?>" class="btn btn-blue pull-right">Add Type</a>
            </div>
        </div>
    </div>
    <table class="table table-bordered table-responsive">
        <thead>
            <tr>
                <th>Type name</th>
                <th>Vendor</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php 
            if(sizeof($type)>0){
                foreach($type as $s){ ?>
            <tr>
                <td><?php echo $s->ads_type_name; ?></td>
                <td><?php echo $s->vendor_name; ?></td>
                <td>
                    <a type="button" href="<?php echo base_url().'core/edittype/'.$s->ads_type_id; ?>" class="btn-sm btn-primary">Edit</a>
                    <a type="button" href="<?php echo base_url().'core/remtype/'.$s->ads_type_id; ?>" class="btn-sm btn-danger">Remove</a>
                </td>
            </tr>
            <?php 
                }
            }else{ ?>
            <tr><td colspan="3" align="center">Data is empty</td></tr>
            <?php } ?>
        </tbody>
    </table>
</div>	