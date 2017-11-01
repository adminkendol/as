<div class="panel  panel-gradient">
    <div class="panel-heading">
        <div class="panel-title"><h4 class="title">Content Stats</h4></div>
        <div class="panel-options">
            <a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
        </div>
    </div>
    <div class="panel-body">
        <div class="form-group">
            <div>
                <a type="button" href="<?php echo base_url().'core/addcontent/'; ?>" class="btn btn-blue pull-right">Add Content</a>
            </div>
        </div>
    </div>
    <table class="table table-bordered table-responsive">
        <thead>
            <tr>
                <th>Content name</th>
                <th>Type</th>
                <th>Size</th>
                <th>Client</th>
                <th>Title</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php 
            if(sizeof($content)>0){
                foreach($content as $cont){ ?>
            <tr>
                <td><?php echo $cont->content_name; ?></td>
                <td><?php echo $cont->type; ?></td>
                <td><?php echo $cont->size; ?></td>
                <td><?php echo $cont->client; ?></td>
                <td><?php echo $cont->title1; ?></td>
                <td>
                    <a type="button" href="<?php echo base_url().'core/editcontent/'.$cont->content_id; ?>" class="btn-sm btn-primary">Edit</a>
                    <a type="button" href="<?php echo base_url().'core/remcontent/'.$cont->content_id; ?>" class="btn-sm btn-danger">Remove</a>
                </td>
            </tr>
            <?php 
                }
            }else{ ?>
            <tr><td colspan="6" align="center">Data is empty</td></tr>
            <?php } ?>
        </tbody>
    </table>
</div>	