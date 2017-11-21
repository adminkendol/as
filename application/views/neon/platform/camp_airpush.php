<div class="panel  panel-gradient">
    <div class="panel-heading">
        <div class="panel-title"><h4 class="title">Campaign airpush</h4></div>
        <div class="panel-options">
            <a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
        </div>
    </div>
    <div class="panel-body">
        <div class="form-group">
            <div>
                <a type="button" href="<?php echo base_url().'core/addcamppush/'; ?>" class="btn btn-blue pull-right">New Campaign</a>
            </div>
        </div>
    </div>
    <table class="table table-bordered table-responsive">
        <thead>
            <tr>
                <th>Campaign name</th>
                <th>Campaign ID</th>
                <th>Type</th>
                <th>Status</th>
                <th>Daily Budget</th>
                <th>Impressions</th>
                <th>Clicks</th>
                <th>CTR</th>
                <th>Current Bid</th>
                <th>Avg. Bid</th>
                <th>Spent</th>
                <th>Conv</th>
                <th>Conv. Rate</th>
                <th>CPA</th>
                <th></th>
            </tr>
        </thead>
        <?php 
        if(sizeof($list)>0){
            foreach ($list as $l){ ?>
        <tbody>
            <tr>
                <td><?php echo $l->campaignname; ?></td>
                <td><?php echo $l->campaignid; ?></td>
                <td><?php echo $l->campaigntype; ?></td>
                <td><?php echo $l->campaignstatus; ?></td>
                <td>$<?php echo $l->dailybudget; ?></td>
                <td><?php echo $l->isfeed; ?></td>
                <td><?php echo $l->is_cpi; ?></td>
                <td><?php echo $l->ppm; ?></td>
                <td>$<?php echo $l->ppmbid; ?></td>
                <td>$<?php echo $l->budgetspent; ?></td>
                <td><?php echo $l->ppm; ?></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="4">Account total and avarages:</td>
            </tr>
        </tbody>
            <?php }
        } else { ?>
        <tbody>
            <tr><td colspan="15" align="center">Data is empty</td></tr>
        </tbody>
        <?php } ?>
    </table>
</div>	