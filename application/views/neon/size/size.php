<div class="panel  panel-gradient">
    <div class="panel-heading">
        <div class="panel-title"><h4 class="title">Size Stats</h4></div>
        <div class="panel-options">
            <a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
        </div>
    </div>
    <div class="panel-body">
        <div class="form-group">
            <div>
                <a type="button" href="<?php echo base_url().'core/addsize/'; ?>" class="btn btn-blue pull-right">Add Size</a>
            </div>
        </div>
    </div>
    <table class="table table-bordered table-responsive">
        <thead>
            <tr>
                <th>Size name</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php 
            if(sizeof($size)>0){
                foreach($size as $s){ ?>
            <tr>
                <td><?php echo $s->ads_size_name; ?></td>
                <td>
                    <a type="button" href="<?php echo base_url().'core/editsize/'.$s->ads_size_id; ?>" class="btn-sm btn-primary">Edit</a>
                    <a type="button" href="<?php echo base_url().'core/remsize/'.$s->ads_size_id; ?>" class="btn-sm btn-danger">Remove</a>
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