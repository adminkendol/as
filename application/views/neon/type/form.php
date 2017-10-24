<?php
if(sizeof($rec)==0){
    $idRec=set_value('idRec');
    $type_name=set_value('type_name');
    $vendor_id=set_value('vendor_id');
}else{
    $idRec=$rec[0]->id;
    $type_name=$rec[0]->type_name;
    $vendor_id=$rec[0]->vendor_id;
}
?>
<div class="row">
    <div class="col-sm-8">
        <div class="panel panel-gradient">
            <div class="panel-heading">
                <div class="panel-title">Form Ads Type</div>
                <div class="panel-options">
                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                    <a href="#" data-rel="close" class="bg"><i class="entypo-cancel"></i></a>
                </div>
            </div>
            <div class="panel-body">
                <form method="post" action="<?php echo base_url().'core/savetype';?>" class="form-horizontal form-groups">
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
                        <label class="col-sm-3 control-label">Type Name</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="type_name" value="<?php echo $type_name; ?>">
                            <input type="hidden" name="idRec" value="<?php echo $idRec; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Vendor</label>
                        <div class="col-sm-5">
                            <select class="form-control" name="vendor_id" id="vendor_id">
                                <option value=""></option>
                                        <?php foreach($vendor as $ven){ 
                                            if($ven->id==$vendor_id){
                                                $selected="selected";
                                            }else{
                                                $selected="";
                                            }
                                            ?>
                                <option value="<?php echo $ven->vendor_id; ?>" <?php echo $selected; ?>><?php echo $ven->vendor_nama; ?></option>
                                        <?php } ?>
                            </select>
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