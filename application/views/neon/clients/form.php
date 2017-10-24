<?php
if(sizeof($rec)==0){
    $idRec=set_value('idRec');
    $client_name=set_value('client_name');
    $phone_number=set_value('phone_number');
    $address=set_value('address');
    $email=set_value('email');
}else{
    $idRec=$rec[0]->client_id;
    $client_name=$rec[0]->client_name;
    $phone_number=$rec[0]->phone_number;
    $address=$rec[0]->address;
    $email=$rec[0]->email;
 }
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-gradient">
            <div class="panel-heading">
                <div class="panel-title">Form Client</div>
                <div class="panel-options">
                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                    <a href="#" data-rel="close" class="bg"><i class="entypo-cancel"></i></a>
                </div>
            </div>
            <div class="panel-body">
                <form method="post" action="<?php echo base_url().'core/saveclient';?>" id="form_jual" class="form-horizontal form-groups">
                        <?php
                        if(validation_errors()){ ?>
                            <div class="alert alert-danger">
                                <button type="button" aria-hidden="true" class="close">×</button>
                                <span><?php echo validation_errors();?></span>
                            </div>
                        <?php } ?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Client Name</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="client_name" id="client_name" value="<?php echo $client_name; ?>">
                            <input type="hidden" id="idRec" name="idRec" value="<?php echo $idRec;?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Phone Number</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="phone_number" id="phone_number" value="<?php echo $phone_number; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Address</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="address" id="address" value="<?php echo $address; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="email" id="email" value="<?php echo $email; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" id="simpan" class="btn btn-blue pull-left">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>