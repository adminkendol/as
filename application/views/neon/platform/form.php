<?php
//if(sizeof($rec)==0){
    $phone=set_value('phone');
    $umb_id=set_value('umb_id');
    
//}
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-gradient">
            <div class="panel-heading">
                <div class="panel-title">Form USSD</div>
                <div class="panel-options">
                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                    <a href="#" data-rel="close" class="bg"><i class="entypo-cancel"></i></a>
                </div>
            </div>
            <div class="panel-body">
                <form method="post" action="<?php echo base_url().'core/sendussd';?>" class="form-horizontal form-groups">
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
                        <label class="col-sm-3 control-label">Phone Number</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="phone" value="<?php echo $phone; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">UMB</label>
                        <div class="col-sm-5">
                            <select class="form-control" name="umb_id" id="umb_id">
                                <option value=""></option>
                                        <?php foreach($umb as $u){  ?>
                                <option value="<?php echo $u->url; ?>"><?php echo $u->title; ?></option>
                                        <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-blue">Send</button>
			</div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>