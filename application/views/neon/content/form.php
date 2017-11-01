<?php
if(sizeof($rec)==0){
    $idRec=set_value('idRec');
    $content_name=set_value('content_name');
    $size_id=set_value('size_id');
    $type_id=set_value('type_id');
    $client_name=set_value('client');
    $client_id=set_value('client_id');
    $title1=set_value('title1');
    $title2=set_value('title2');
    $text=set_value('desc');
}else{
    $idRec=$rec[0]->content_id;
    $vendor_name=$rec[0]->ads_content_name;
    $size_id=$rec[0]->ads_size_id;
    $type_id=$rec[0]->ads_type_id;
    $client_name=$rec[0]->client_name;
    $client_id=$rec[0]->client_id;
    $title1=$rec[0]->title1;
    $title2=$rec[0]->title2;
    $text=$rec[0]->desc;
}
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-gradient">
            <div class="panel-heading">
                <div class="panel-title">Form Content</div>
                <div class="panel-options">
                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                    <a href="#" data-rel="close" class="bg"><i class="entypo-cancel"></i></a>
                </div>
            </div>
            <div class="panel-body">
                <form method="post" action="<?php echo base_url().'core/savecontent';?>" class="form-horizontal form-groups">
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
                        <label class="col-sm-3 control-label">Content Name</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="content_name" value="<?php echo $content_name; ?>">
                            <input type="hidden" name="idRec" value="<?php echo $idRec; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Type</label>
                        <div class="col-sm-5">
                            <select class="form-control" name="type_id" id="type_id">
                                <option value=""></option>
                                        <?php foreach($type as $t){ 
                                            if($t->ads_type_id==$type_id){
                                                $selected="selected";
                                            }else{
                                                $selected="";
                                            }
                                            ?>
                                <option value="<?php echo $t->ads_type_id; ?>" <?php echo $selected; ?>><?php echo $t->ads_type_name; ?></option>
                                        <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group" id="div_size_id">
                        <label class="col-sm-3 control-label">Size</label>
                        <div class="col-sm-5">
                            <select class="form-control" name="size_id" id="size_id">
                                <option value=""></option>
                                        <?php foreach($size as $s){ 
                                            if($s->ads_size_id==$size_id){
                                                $selected="selected";
                                            }else{
                                                $selected="";
                                            }
                                            ?>
                                <option value="<?php echo $s->ads_size_id; ?>" <?php echo $selected; ?>><?php echo $t->ads_size_name; ?></option>
                                        <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Client</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="client" id="client" value="<?php echo $client_name; ?>">
                            <input type="hidden" name="client_id" id="client_id" value="<?php echo $client_id; ?>">
                        </div>
                    </div>
                    <div class="form-group" id="div_title1">
                        <label class="col-sm-3 control-label">Title 1</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="title1" id="title1" value="<?php echo $title1; ?>">
                        </div>
                    </div>
                    <div class="form-group" id="div_title2">
                        <label class="col-sm-3 control-label">Title 2</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="title2" id="title2" value="<?php echo $title2; ?>">
                        </div>
                    </div>
                    <div class="form-group" id="div_desc">
                        <label class="col-sm-3 control-label">Description</label>
                        <div class="col-sm-5">
                            <textarea class="form-control" name="desc" id="desc"><?php echo $text; ?></textarea>
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