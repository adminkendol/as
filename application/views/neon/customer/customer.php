<div class="panel panel-gradient">
    <div class="panel-heading">
        <div class="panel-title"><h4 class="title">Customer Stats</h4></div>
        <div class="panel-options">
            <a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
        </div>
    </div>
    <div class="panel-body">
        <div class="form-group">
            <div>
                <a type="button" href="<?php echo base_url().'core/addcustomer/'; ?>" class="btn btn-blue pull-right">Tambah Customer</a>
            </div>
        </div>
    </div>
    <table class="table table-bordered table-responsive">
        <thead>
            <tr>
                <th>Nama Customer</th>
                <th>KTP</th>
                <th>Phone 1</th>
                <th>Phone 2</th>
                <th>e-mail</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($customer as $s){ ?>
            <tr>
                <td><?php echo $s->customer; ?></td>
                <td><?php echo $s->ktp; ?></td>
                <td><?php echo $s->phone1; ?></td>
                <td><?php echo $s->phone2; ?></td>
                <td><?php echo $s->email; ?></td>
                <td>
                    <a type="button" href="<?php echo base_url().'core/editcustomer/'.$s->id; ?>" class="btn-sm btn-primary">Edit</a>
                    <a type="button" href="<?php echo base_url().'core/remcustomer/'.$s->id; ?>" class="btn-sm btn-danger">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <div class="panel-footer"><?=$pagination?></div>
</div>