<!-- BEGIN Portlet PORTLET-->

<div class="portlet box green">
  <div class="portlet-title">
    <div class="caption">STATE SPEND</div>
    <div class="tools"> <a href="javascript:;" class="collapse"> </a> </div>
  </div>
  <div class="portlet-body">
    <div class="row">
      <div class="col-xs-6 col-sm-6">
        <div id="placeholder" class="chart" style="height:152px;"> </div>
      </div>
      <div class="col-xs-6 col-sm-6">
        <h5 style="color:#71b545;"><b>$12.3B Overall Spend</b></h5>
        <h5 style="color:#4b9126;"><b>$<?php echo nice_number(total_State_Spend(),'format'); ?> Small Business Spend</b></h5>
      </div>
    </div>
    <div class="clearfix"></div>
  </div>
</div>
<!-- END Portlet PORTLET-->