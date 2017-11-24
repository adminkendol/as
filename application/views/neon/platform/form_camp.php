<?php
//if(sizeof($rec)==0){
    //$phone=set_value('phone');
    //$umb_id=set_value('umb_id');
    
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
                <form method="post" action="<?php echo base_url().'core/sendussdcamp';?>" class="form-horizontal form-groups" enctype='multipart/form-data'>
                        <?php
                        if(validation_errors()){ ?>
                            <div class="alert alert-danger">
                                <button type="button" aria-hidden="true" class="close">×</button>
                                <span><?php echo validation_errors();?></span>
                            </div>
                        <?php    
                        }
                        if(($this->session->userdata('success'))||($this->session->userdata('fail'))) { ?>
                            <div class="alert alert-success">
                                <button type="button" aria-hidden="true" class="close">×</button>
                                <span>Success sent: <?php echo $this->session->userdata('success'); ?></span><br>
                                <span>Fail sent: <?php echo $this->session->userdata('fail'); ?></span>
                            </div>
                        <?php }
                        ?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Upload Phone Number</label>
                        <div class="col-sm-5">
                            <input type="file" class="form-control" name="filephone" value="">
                        </div>
                    </div>
                    <!--<div class="form-group">
                        <label class="col-sm-3 control-label">Header</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="header" value="">
                        </div>
                    </div>-->
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Link</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="link" value="">
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