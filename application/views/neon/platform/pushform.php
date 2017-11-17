<?php
//if(sizeof($rec)==0){
    $campaign_name=set_value('campaign_name');
    //$umb_id=set_value('umb_id');
    
//}
?>
<form method="post" action="<?php echo base_url().'core/sendpush';?>" class="form-horizontal form-groups">
    <?php
    if(validation_errors()){ ?>
    <div class="alert alert-danger">
        <button type="button" aria-hidden="true" class="close">×</button>
        <span><?php echo validation_errors();?></span>
    </div>
    <?php   }   ?>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-gradient">
                <div class="panel-heading">
                    <div class="panel-title">Add Campaign Details</div>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Campaign Name</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="campaign_name" value="<?php echo $campaign_name; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Campaign Category</label>
                        <div class="col-sm-5">
                            <select class="form-control" name="campaign_category_id" id="campaign_category_id">
                                <option value=""></option>
                                        <?php foreach($campcat as $cc){  ?>
                                <option value="<?php echo $cc->campaign_category_id; ?>"><?php echo $cc->campaign_category_name; ?></option>
                                        <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Start</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control tgl" name="start_push" value="">
                        </div>
                    
                        <label class="col-sm-1 control-label">End</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control tgl" name="end_push" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Daily Budget</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="daily_budget" value="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-gradient">
                <div class="panel-heading">
                    <div class="panel-title">Traffic Source</div>
                </div>
                <div class="panel-body">
                    <!--<div class="form-group">
                        <input class="icheck-11" type="radio" name="trafficApp" id="trafficApp" value="application">
			<label for="minimal-radio-1-11" class="col-sm-3 control-label">Application</label>
                    </div>-->
                    <div class="form-group">
                        <input class="icheck-11" type="radio" name="trafficAppSrc" value="android">
                        <label class="col-sm-3 control-label">Android</label>
                    </div>
                    <div class="form-group">
                        <input class="icheck-11" type="radio" name="trafficAppSrc" value="ios">
                        <label class="col-sm-3 control-label">iOS</label>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-blue">Send</button>
			</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>