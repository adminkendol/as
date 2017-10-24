<?php
if(sizeof($rec)==0){
    $idRec=set_value('idRec');
    $vendor_name=set_value('vendor_name');
}else{
    $idRec=$rec[0]->vendor_id;
    $vendor_name=$rec[0]->vendor_name;
}
?>
<div class="row">
    <div class="col-sm-8">
        <div class="panel panel-gradient">
            <div class="panel-heading">
                <div class="panel-title">Form Vendor</div>
                <div class="panel-options">
                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                    <a href="#" data-rel="close" class="bg"><i class="entypo-cancel"></i></a>
                </div>
            </div>
            <div class="panel-body">
                <form method="post" action="<?php echo base_url().'core/savevendor';?>" class="form-horizontal form-groups">
                        <?php
                        if(validation_errors()){ ?>
                            <div class="alert alert-danger">
                                <button type="button" aria-hidden="true" class="close">×</button>
                                <span><?php echo validation_errors();?></span>
                            </div>
                        <?php    
                        }
                        ?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Vendor Name</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="vendor_name" value="<?php echo $vendor_name; ?>">
                            <input type="hidden" name="idRec" value="<?php echo $idRec; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-blue">Simpan</button>
			</div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>