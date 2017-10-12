<?php
if(sizeof($rec)==0){
    $idRec=set_value('idRec');
    $customer=set_value('customer');
    $ktp=set_value('ktp');
    $alamat=set_value('alamat');
    $phone1=set_value('phone1');
    $phone2=set_value('phone2');
    $email=set_value('email');
}else{
    $idRec=$rec[0]->id;
    $customer=$rec[0]->customer;
    $ktp=$rec[0]->ktp;
    $alamat=$rec[0]->alamat;
    $phone1=$rec[0]->phone1;
    $phone2=$rec[0]->phone2;
    $email=$rec[0]->email;
 }
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-gradient">
            <div class="panel-heading">
                <div class="panel-title">Form Customer</div>
                <div class="panel-options">
                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                    <a href="#" data-rel="close" class="bg"><i class="entypo-cancel"></i></a>
                </div>
            </div>
            <div class="panel-body">
                <form method="post" action="<?php echo base_url().'core/savecustomer';?>" id="form_jual" class="form-horizontal form-groups">
                        <?php
                        if(validation_errors()){ ?>
                            <div class="alert alert-danger">
                                <button type="button" aria-hidden="true" class="close">×</button>
                                <span><?php echo validation_errors();?></span>
                            </div>
                        <?php } ?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Customer</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="customer" id="customer" value="<?php echo $customer; ?>">
                            <input type="hidden" id="idRec" name="idRec" value="<?php echo $idRec;?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">KTP / SIM</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="ktp" id="ktp" value="<?php echo $ktp; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Alamat Customer</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="alamat" id="alamat" value="<?php echo $alamat; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Telepon 1</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="phone1" id="phone1" value="<?php echo $phone1; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Telepon 2</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="phone2" id="phone2" value="<?php echo $phone2; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Email Customer</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="email" id="email" value="<?php echo $email; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" id="simpan" class="btn btn-blue pull-left">Simpan</button>
                        </div>
                        <!--<div class="col-sm-1">
                            <a href="<?php echo base_url().'core/customer';?>" type="button" id="cancel" class="btn btn-danger pull-left">Batal</a>
                        </div>-->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>