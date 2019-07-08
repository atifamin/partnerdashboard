<style type="text/css">
 a:hover, a:active, a:focus {
    outline: none;
    text-decoration: none;
     color: inherit;
   }
</style>

<div class="row">
  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"> <a class="dashboard-stat dashboard-stat-v2 kpi1" href="#">
    <div class="visual"></div>
    <div class="details">
      <div class="number"> <span data-counter="counterup" data-value="<?php echo total_Departments_Agencies();?>"></span><?php echo total_Departments_Agencies();?></div>
      <div class="desc">Total Departments<br />
        and Agencies</div>
    </div>
    </a> 
  </div>
  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"> <a class="dashboard-stat dashboard-stat-v2 kpi2" href="#">
    <div class="visual"></div>
    <div class="details">
      <div class="number"> $ <span data-counter="counterup" data-value="<?php echo nice_number(total_State_Spend()); ?>"><?php echo nice_number(total_State_Spend(),'format'); ?></span></div>
      <div class="desc">Total State<br />
        Spend</div>
    </div>
    </a> 
  </div>
  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"> <a class="dashboard-stat dashboard-stat-v2 kpi3" href="#">
    <div class="visual"></div>
    <div class="details">
      <div class="number"> <span data-counter="counterup" data-value="<?php echo nice_number(total_Contracts(),'NoDecimal');?>"></span><?php echo nice_number(total_Contracts(),'format'); ?></div>
      <div class="desc">Total<br />
        Contracts</div>
    </div>
    </a> 
  </div>
  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"> <a class="dashboard-stat dashboard-stat-v2 kpi4" href="#">
    <div class="visual"></div>
    <div class="details">
      <div class="number"> <span data-counter="counterup" data-value="<?php echo nice_number(total_Small_Business(),'NoDecimal');?>"></span><?php echo nice_number(total_Small_Business(),'format'); ?></div>
      <div class="desc">Total<br />
        Small Businesses</div>
    </div>
    </a> 
  </div>
</div>
