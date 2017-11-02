<?php
if(sizeof($rec)==0){
    $idRec=set_value('idRec');
    $name=set_value('name');
    $username=set_value('username');
    $role_id=set_value('role_id');
    $client_id=set_value('client_id');
    $client_name=set_value('client_name');
}else{
    $idRec=$rec[0]->id;
    $name=$rec[0]->nama;
    $username=$rec[0]->username;
    $role_id=$rec[0]->role_id;
    $client_id=$rec[0]->client_id;
    $client_name=$rec[0]->client_name;
}
?>
<div class="row">
    <div class="col-sm-8">
        <div class="panel panel-gradient">
            <div class="panel-heading">
                <div class="panel-title">Form user</div>
                <div class="panel-options">
                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                    <a href="#" data-rel="close" class="bg"><i class="entypo-cancel"></i></a>
                </div>
            </div>
            <div class="panel-body">
                <form method="post" action="<?php echo base_url().'core/saveuser';?>" class="form-horizontal form-groups">
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
                        <label class="col-sm-3 control-label">Nama</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                            <input type="hidden" name="idRec" value="<?php echo $idRec; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Username</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Password</label>
                        <div class="col-sm-5">
                            <input type="password" class="form-control" name="password" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Role</label>
                        <div class="col-sm-5">
                            <select class="form-control" name="role_id" id="role_id">
                                <option value=""></option>
                                        <?php foreach($role as $r){ 
                                            if($r->role_id==$role_id){
                                                $selected="selected";
                                            }else{
                                                $selected="";
                                            }
                                            ?>
                                <option value="<?php echo $r->role_id; ?>" <?php echo $selected; ?>><?php echo $r->role_name; ?></option>
                                        <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group" id="div_client_id" style="display: none">
                        <label class="col-sm-3 control-label">Client</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="client" id="client" value="<?php echo $client_name; ?>">
                            <input type="hidden" name="client_id" id="client_id" value="<?php echo $client_id; ?>">
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