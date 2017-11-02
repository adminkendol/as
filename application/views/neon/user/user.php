<div class="panel  panel-gradient">
    <div class="panel-heading">
        <div class="panel-title"><h4 class="title">User Stats</h4></div>
        <div class="panel-options">
            <a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
        </div>
    </div>
    <div class="panel-body">
        <div class="form-group">
            <div>
                <a type="button" href="<?php echo base_url().'core/adduser/'; ?>" class="btn btn-blue pull-right">Add User</a>
            </div>
        </div>
    </div>
    <table class="table table-bordered table-responsive">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Username</th>
                <th>Role</th>
                <th>Client</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($user as $s){ ?>
            <tr>
                <td><?php echo $s->nama; ?></td>
                <td><?php echo $s->username; ?></td>
                <td><?php echo $s->role_name; ?></td>
                <td><?php echo $s->client_name; ?></td>
                <td>
                    <a type="button" href="<?php echo base_url().'core/edituser/'.$s->id; ?>" class="btn-sm btn-primary">Edit</a>
                    <a type="button" href="<?php echo base_url().'core/remuser/'.$s->id; ?>" class="btn-sm btn-danger">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>	