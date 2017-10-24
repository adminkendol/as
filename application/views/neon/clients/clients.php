<div class="panel panel-gradient">
    <div class="panel-heading">
        <div class="panel-title"><h4 class="title">Clients Stats</h4></div>
        <div class="panel-options">
            <a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
        </div>
    </div>
    <div class="panel-body">
        <div class="form-group">
            <div>
                <a type="button" href="<?php echo base_url().'core/addclient/'; ?>" class="btn btn-blue pull-right">Add Client</a>
            </div>
        </div>
    </div>
    <table class="table table-bordered table-responsive">
        <thead>
            <tr>
                <th>Client Name</th>
                <th>Phone Number</th>
                <th>Address</th>
                <th>e-mail</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php 
            if(sizeof($customer)>0){
                foreach($customer as $s){ ?>
            <tr>
                <td><?php echo $s->client_name; ?></td>
                <td><?php echo $s->phone_number; ?></td>
                <td><?php echo $s->address; ?></td>
                <td><?php echo $s->email; ?></td>
                <td>
                    <a type="button" href="<?php echo base_url().'core/editclient/'.$s->client_id; ?>" class="btn-sm btn-primary">Edit</a>
                    <a type="button" href="<?php echo base_url().'core/remclient/'.$s->client_id; ?>" class="btn-sm btn-danger">Remove</a>
                </td>
            </tr>
            <?php 
                }
            } else{?>
            <tr><td colspan="5" align="center">Data is empty</td></tr>
            <?php } ?>
        </tbody>
    </table>
    <div class="panel-footer"><?=$pagination?></div>
</div>