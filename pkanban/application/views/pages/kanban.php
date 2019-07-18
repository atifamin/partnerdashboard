<?php
    //echo "<pre>"; print_r($dashboard_user_id);exit();
 ?>
<style type="text/css">
#row1 {
	margin-top: 12px;
}
#col1 {
	margin-top: 4px;
	padding-left: 5px;
	padding-top: 4px;
}
#col2 {
	margin-top: 8px;
	padding-left: 60px;
}
.circle {
	height: 30px;
	width: 30px;
 border-style:;
	text-align: center;
	vertical-align: middle;
	border-radius: 50%; /* may require vendor prefixes */
	background: #DBDBDB;
}
.circle1 {
	height: 23px;
	display: inline-grid;
	width: 25px;
	text-align: center;
	vertical-align: middle;
	border-radius: 50%; /* may require vendor prefixes */
	background: #DBDBDB;
}
.Comment_css1 {
 color:;
	height: auto;
	background-color: white;
	border: solid;
	border-color: #d9d9d9;
}
.strong_comment {
	width: 467px;
	margin-left: 35px;
	border: solid;
	border-color: #d9d9d9;
	background-color: white;
}
.comment_name {
	width: 40px;
	height: 40px;
	border-radius: 25px;
	background-color: lightgrey;
	padding: 50%;
	text-align: center;
	font-weight: bold;
}
.comment_row {
	background-color: #fafafa;
	margin-top: 2%;
	padding: 3% 0;
}
#editTaskTodoUl2 {
	background-color: white;
}
.comment_heading {
	font-size: 12px;
}
.comment_body {
	background-color: white;
	border-radius: 5px;
	padding: 2%;
	font-size: 12px;
}
.comment_reply_btn {
	color: black;
}
.task_comment_textarea:focus {
	-moz-box-shadow: inset 0 0 0px rgba(0,0,0,0.0);
	-webkit-box-shadow: inset 0 0 0px rgba(0, 0, 0, 0.0);
	box-shadow: inner 0 0 0px rgba(0, 0, 0, 0.0);
	-webkit-border-radius: 0px;
	-moz-border-radius: 0px;
}
#request_modal_heading {
	border: 1px solid;
	font-size: 20px;
	border-radius: 10px;
	padding: 3px;
	color: #8aa0bf;
}
#request_modal_heading:after {
	left: 0.5em;
	margin-right: -79.5%;
}
#request_modal_heading:after {
	background-color: #929bbf;
	content: "";
	display: inline-block;
	height: 2px;
	position: relative;
	vertical-align: middle;
	width: 80%;
}
#file_docs_cus_btn {
	background-color: #48AAC6;
	margin-top: 6%;
	color: #ffff;
}
</style>
<script type="text/javascript" src="<?php echo base_url(); ?>template/js/jquery-dateformat.js"></script>
<div class="row">
  <?php if (count($data['containers']) < 1): ?>
  <a href="<?php echo base_url(); ?>home/settings/<?php echo $data['board_id']; ?>#tab_containers"><?php echo e('no containers', true); ?></a>
  <?php endif; ?>
  <?php $numItems = count($data['containers']);
    $i = 0; ?>
  <?php foreach ($data['containers'] as $container): ?>
  <?php $division = round(12 / $numItems, 0, PHP_ROUND_HALF_DOWN); ?>
  <?php if ($numItems == 7) $division = 1; ?>
  <?php $column_value = (count($data['containers']) > 2) ? $division : 4; ?>
  <?php if (++$i === $numItems && ($division * $numItems) < 12) $column_value = round(12 - ($division * ($numItems - 1)), 0, PHP_ROUND_HALF_UP); ?>
  <div class="column sortable col-md-<?php echo $column_value; ?>" rel="<?php echo $container['container_id']; ?>" style="background-color:<?php echo "rgba({$container['container_rgb']}, {$data['configs']['conf_background_opacity']})"; ?>;">
    <div class="column-header-total" style="background-color:<?php echo unserialize(CONTAINER_COLORS)[$container['container_color']]; ?>;"> <?php echo '$'.number_format(get_container_total($container['container_id'])) ; ?> </div>
    <div class="column-header nodrag" style="background-color:<?php echo unserialize(CONTAINER_COLORS)[$container['container_color']]; ?>;"><?php echo $container['container_name']; ?>
      <?php if ($this->session->userdata('user_session')['user_permissions'] <= 10): ?>
      <!-- <img src="<?php echo base_url(); ?>images/plus_icon.png" class="plus_button"
       data-toggle="modal"
       data-target="#addTaskModal"
       data-container_name="<?php echo $container['container_name']; ?>"
       data-container_id="<?php echo $container['container_id']; ?>"/> -->
      <?php endif; ?>
    </div>
    <?php foreach ($data['tasks'][$container['container_id']] as $task): ?>
    <?php
    $this->load->model("Sec");
    $DETAIL = $this->sec->get_task_content($task['task_id']);
    //echo "<pre>"; print_r($DETAIL['logo']);
    ?>
    <div class="portlet task_element" <?php if ($task['task_color']): ?>style="border-left: solid 4px <?php echo unserialize(TASK_COLORS)[$task['task_color']]; ?>;<?php endif; ?>" id="<?php echo $task['task_id']; ?>" data-toggle="modal" data-target="#editTaskModal" data-task_id="<?php echo $task['task_id']; ?>">
      <div class="portlet-border"></div>
      
      <div class="portlet-header"> 
        <span class="task_title"><?php echo $task['task_title']; ?></span> <span class="portlet-date">
        <?php if ($task['task_description']): ?>
        <span class='ui-icon ui-icon-plusthick portlet-toggle nodrag'></span>
        <?php endif; ?>
        <span class="<?php if (date('Y-m-d', strtotime($task['task_due_date'])) < date('Y-m-d')): ?>danger_date<?php endif; ?>"> <?php echo ($task['task_due_date'] != 0) ? print_date($task['task_due_date']) : null; ?> </span> <?php echo ($task['task_time_estimate'] != "00:00:00") ? "Est.: " . $task['task_time_estimate'] : null; ?> <?php echo ($task['task_time_spent'] != "00:00:00") ? "Spent: " . $task['task_time_spent'] : null; ?>
        <div> <span>
          <?php if($task['task_funding_amount_requested']!=0){ echo '$' .nice_number($task['task_funding_amount_requested'],'format'); } ?>
          </span> </div>
        </span>
        <div class="action_button hidden-xs">
          <?php if ($this->session->userdata('user_session')['user_permissions'] <= 10): ?>
          <img class="time_tracker_action" rel="<?php echo $task['task_id']; ?>"
                                      src="<?php echo base_url(); ?>images/icon_start.png"/>
          <?php endif; ?>
        </div>
      </div>
      <?php if ($task['task_description']): ?>
      <div class="portlet-content" style="display:none"><?php echo nl2br($task['task_description']); ?></div>
      <?php endif; ?>
    </div>
    <?php endforeach; ?>
  </div>
  <?php endforeach; ?>
</div>
<div class="drag_options" style="visibility:hidden">
  <div class="darg_options_container">
    <div class="icon icon_archive sortable pull-left" rel="archive"> </div>
    <div class="icon icon_bin sortable pull-right" rel="bin"> </div>
    <div class="clearfix"></div>
  </div>
</div>
<div class="board-footer hidden-xs" style="background-color:<?php echo unserialize(NAVBAR_COLORS)[$data['configs']['conf_navbar_color']]; ?>;"> <!-- <span><?php echo e('pKanban', false); ?> v<?php echo $this->config->item('version'); ?></span> <span class="separator">|</span> -->
  <?php foreach ($data['containers'] as $container): ?>
  <span class="col-title"><?php echo $container['container_name']; ?></span> <span
            style="color:<?php echo unserialize(CONTAINER_COLORS)[$container['container_color']]; ?>;"> <?php echo count($data['tasks'][$container['container_id']]); ?> </span> <span class="separator">|</span>
  <?php endforeach; ?>
  <!-- <span class="board-time-spent"><?php //echo e('TIME SPENT ON THIS BOARD', true); ?> <strong><?php //echo $data['board_time_spent_active']; ?></strong> (<?php //echo $data['board_time_spent_archived']; ?> Archived task)</span>--> </div>

<!------------------ ############################ MODALS ########################################## -->

<div class="modal fade" id="addTaskModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
        <h4 class="modal-title" id="exampleModalLabel"><?php echo e('Add Task', true); ?></h4>
      </div>
      <form class="formAjax" action="<?php echo base_url(); ?>ajax/save_task" method="post">
        <div class="modal-body">
          <input id="task_container" name="task_container" type="hidden" value=""/>
          <div class="form-group">
            <label for="task_title" class="form-control-label"><?php echo e('Title', true); ?>:</label>
            <input id="task_title" name="task_title" type="text" class="form-control">
          </div>
          <div class="form-group">
            <label for="task_description" class="form-control-label"><?php echo e('Description', true); ?> :</label>
            <textarea id="task_description" name="task_description" class="form-control"></textarea>
          </div>
          <div class="form-group to_do">
            <label for="task_todo" class="form-control-label"><?php echo e('ToDo List', true); ?>:</label>
            <div class="header">
              <input type="text" class="todoInput" id="AddTodoInput" placeholder="Title...">
              <span id="newTaskAddBtn" class="addBtn">Add</span> </div>
            <input type="hidden" name="task_todo" id="add_task_todo" value=""/>
            <ul id="newTaskTodoUl" class="todo_ul">
            </ul>
          </div>
          <div class="row">
            <div class="col-md-5 form-group">
              <label for="task_time_estimate"
                                   class="form-control-label"><?php echo e('Time estimate (hh:mm)', true); ?>:</label>
              <input id="task_title" name="task_time_estimate" type="text" class="form-control"
                                   value="00:00">
            </div>
            <div class="col-md-5 form-group">
              <label for="task_time_spent"
                                   class="form-control-label"><?php echo e('Time spent (hh:mm)', true); ?>:</label>
              <input id="task_time_spent" name="task_time_spent" type="text" class="form-control"
                                   value="00:00">
            </div>
            <div class="col-md-2 form-group">
              <label for="task_color" class="form-control-label"><?php echo e('Color', true); ?>:</label>
              <div class="form-group">
                <select id="task_color" class="colorPicker" name="task_color">
                  <option value=""></option>
                  <?php foreach (unserialize(TASK_COLORS) as $key => $color): ?>
                  <option value="<?php echo $key; ?>"
                                                data-color="<?php echo $color; ?>"><?php echo $color; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="task_time_spent" class="form-control-label"><?php echo e('Due date', true); ?> :</label>
            <div class='input-group date datetimepicker'>
              <input id="task_due_date" name="task_due_date" type='text' class="form-control"/>
              <span class="input-group-addon"> <span class="glyphicon glyphicon-calendar"></span> </span> </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary close_button"
                            data-dismiss="modal"><?php echo e('Close', true); ?></button>
          <button type="submit" class="btn btn-primary"><?php echo e('Save task', true); ?></button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- *************************** E D I T MODAL ********************************** -->
<div class="modal fade" id="editTaskModal" tabindex="1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
        <h4 class="modal-title" id="exampleModalLabel"><?php echo e('Deal', true); ?>: <span class="task_header"></span> <span style="float:right;margin-right:20px;display:none;" id="loan_amount_span">Funding Amount
          <label class="label label-success" style="background-color:#ebf1de;color:#4f622f;"></label>
          </span> </h4>
        <small><?php echo e('Created by', true); ?>: <span class="task_user_name"></span></small> </div>
      <div class="modal-body">
        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#tab_edit"><?php echo e('Edit Deal', true); ?></a> </li>
          <li><a data-toggle="tab" href="#tab_attachments"><?php echo e('Attachments', true); ?></a></li>
          <li><a data-toggle="tab" href="#tab_bizvault_files_document"><?php echo e('bizVAULT™ Files and Documents', true); ?></a></li>
          <li><a data-toggle="tab" href="#tab_periods"><?php echo e('Working periods', true); ?></a></li>
        </ul>
        <div class="tab-content bck">
          <div id="tab_edit" class="tab-pane fade in active">
            <form class="formAjax" action="<?php echo base_url(); ?>ajax/edit_task/" method="post">
            <input class="task_id" type="hidden" name="task_id" value=""/>
            <div class="form-group">
              <label for="task_title" class="form-control-label"><?php echo e('Title', true); ?> :</label>
              <input name="task_title" type="text" class="task_title form-control">
            </div>
            <div class="form-group">
              <label for="task_description"
                                       class="form-control-label"><?php echo e('Description', true); ?>:</label>
              <textarea name="task_description" class="task_description form-control"
                                          rows="3"></textarea>
            </div>
            <form id="addComments" enctype="multipart/form-data" method="POST">
              <div class="form-group to_do"> &nbsp;&nbsp;<i class="fa fa-comment-o">&nbsp;&nbsp;&nbsp;&nbsp;</i>
                <label for="Add_comment" class="form-control-label"><?php echo e('Add Comment', true); ?> </label>
                <br>
                <div class="row" id="row1">
                  <div class="col-md-1 circle" id="col1">
                    <?php
                   $dashboardUserDetail = $this->partnerDB->where("user_id", $_SESSION['user_session']['dashboard_user_id'])->get("user")->row();
                  ?>
                    <?=substr($dashboardUserDetail->user_fname, 0,1).substr($dashboardUserDetail->user_lname, 0,1); ?>
                  </div>
                  <div class="col-sm-4" id="col2">
                    <label for="Comment_Title" class="form-control-label"><?php echo e('Comment Title', true); ?>:</label>
                  </div>
                  <div class="col-sm-7" align="center">
                    <textarea name="Comment_Title" id="editTodoInput1" class="form-control todoInput task_comment_textarea" rows="1" placeholder="Comment Title" style="border: 0px;resize: none;"></textarea>
                    <div id="commentTitleError" style="color:red;display:none">This field is required.</div>
                  </div>
                </div>
                <br>
                <!--    <label for="Comment_Title" class="form-control-label"><?php// echo e('Comment Title', true); ?>
                                    :</label>    
                                <textarea name="Comment_Title" id="editTodoInput1" class="form-control todoInput "
                                          rows="1" placeholder="Comment Title"></textarea>   -->
                <div class="header" style="padding-bottom:3%;"> 
                  <!-- <script src="<?php //echo base_url(); ?>ckeditor/ckeditor.js" type="text/javascript"></script> -->
                  <div style="background-color: white;margin: 2%;">
                    <div style="text-align:left;color:grey;font-size: 12px;" id="reply_section"> </div>
                    <input type="hidden" id="replyId" name="replyId" value="0">
                    <textarea name="task_comment" id="editTodoInput2" style="border: 0px;resize: none;" class="task_comment form-control todoInput task_comment_textarea"
                                          rows="3" placeholder="Write a comment"></textarea>
                    <div style="text-align:right;margin-right: 10px;padding-bottom:5px;"><a href="javascript:;" id="comment_attach_a">
                      <p id="uploaded_file_name"></p>
                      <img src="<?php echo base_url("images/paperclip.png"); ?>" width="15" /></a></div>
                  </div>
                  <div id="commentMessageError" style="color:red;display:none">This field is required.</div>
                  <input type="file" name="comment_file" style="display:none" />
                  <!--<span id="editTaskAddBtn2" class="addBtn">Add</span>-->
                  <input type="button" class="addBtn" id="editTaskAddBtn2" value="Add" style="float:right;margin-right:12px;" />
                </div>
                <input type="hidden" name="Add_comment" id="edit_task_todo" value=""/>
                <!--<ul id="editTaskTodoUl2" class="todo_ul todo_ul_edit_mode">
                </ul>-->
                
                <div class="row" id="editTaskTodoUl2"> </div>
                <br />
              </div>
              
              <!--     <div class="form-group to_do">
                                <label for="task_comment" class="form-control-label"><?php //echo e('Add Comment', true); ?>
                                    :</label>
<script src="<?php //echo base_url(); ?>ckeditor/ckeditor.js" type="text/javascript"></script>
                                <div class="header">
                                    <textarea name="task_comment" class="task_comment form-control ckeditor"
                                          rows="4"></textarea>
                                    <span id="" class="addBtn">Save</span>
                                </div>
                                <input type="hidden" name="task_todo" id="edit_task_todo" value=""/>
                                <ul id="editTaskTodoUl" class="todo_ul todo_ul_edit_mode">

                                </ul>
                            </div> -->
              
              <div class="form-group to_do">
                <label for="task_todo" class="form-control-label"><?php echo e('ToDo List', true); ?> :</label>
                <div class="header">
                  <input type="text" id="editTodoInput" class="todoInput" placeholder="Title...">
                  <span id="editTaskAddBtn" class="addBtn">Add</span> </div>
                <input type="hidden" name="task_todo" id="edit_task_todo" value=""/>
                <ul id="editTaskTodoUl" class="todo_ul todo_ul_edit_mode">
                </ul>
              </div>
              <div class="row">
                <div class="col-md-5 form-group">
                  <label for="task_time_estimate"
                                           class="form-control-label"><?php echo e('Time estimate', true); ?>:</label>
                  <input name="task_time_estimate" type="text"
                                           class="task_time_estimate form-control">
                </div>
                <div class="col-md-5 form-group">
                  <label for="task_time_spent"
                                           class="form-control-label"><?php echo e('Time spent', true); ?>:</label>
                  <input name="task_time_spent" type="text" class="task_time_spent form-control">
                </div>
                <div class="col-md-2 form-group">
                  <label for="task_color" class="form-control-label"><?php echo e('Color', true); ?> :</label>
                  <div class="form-group">
                    <select id="task_color" class="colorPicker" name="task_color">
                      <option value="" selected="selected"><?php echo e('None', true); ?></option>
                      <?php foreach (unserialize(TASK_COLORS) as $key => $color): ?>
                      <option value="<?php echo $key; ?>"
                                                        data-color="<?php echo $color; ?>"><?php echo $color; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="task_time_spent"
                                       class="form-control-label"><?php echo e('Due date', true); ?>:</label>
                <div class='input-group date datetimepicker'>
                  <input name="task_due_date" type='text' class="task_due_date form-control"/>
                  <span class="input-group-addon"> <span class="glyphicon glyphicon-calendar"></span> </span> </div>
              </div>
              <div class="form-group">
                <label for="task_time_spent"
                                       class="form-control-label"><?php echo e('Move to column', true); ?>:</label>
                <select class="form-control form-control-lg task_container" name="task_container">
                  <?php foreach ($data['containers'] as $container): ?>
                  <option
                                            value="<?php echo $container['container_id']; ?>"><?php echo $container['container_name']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary close_button" data-dismiss="modal"> <?php echo e('Close', true); ?> </button>
                <!--
                <button type="button" class="btn btn-danger" id="delete_task"
                                        rel=""><?php //echo e('Delete Deal', true); ?> </button>
                !-->
                <button type="submit"
                                        class="btn btn-primary"><?php echo e('Save Deal', true); ?></button>
              </div>
            </form>
          </div>
          <div id="tab_attachments" class="tab-pane fade in">
            <table class="table">
              <thead>
                <tr>
                  <th></th>
                  <th><?php echo e('Filename', true); ?></th>
                  <th><?php echo e('User', true); ?></th>
                  <th><?php echo e('Date', true); ?></th>
                  <th><?php echo e('Action', true); ?></th>
                </tr>
              </thead>
              <tbody class="attachments_body">
              </tbody>
            </table>
            <?php if ($this->session->userdata('user_session')['user_permissions'] <= 10): ?>
            <div class="dropzone_error"></div>
            <form action="/upload-target" class="dropzone" id="dropzone_form">
              <div class="fallback">
                <input class="upload_task_id" type="hidden" name="task_id" value=""/>
              </div>
            </form>
            <?php endif; ?>
          </div>
          <div id="tab_bizvault_files_document" class="tab-pane fade in">
            <div class="row" style="background-color: #93CCDD;padding: 3% 0">
              <div class="col-md-2"> <img src="<?php echo base_url().'images/placeholder.png'; ?>" style="width: 70px"> </div>
              <div class="col-md-6">
                <p>First Name Last Name</p>
                <p>Business Name</p>
              </div>
              <div class="col-md-4 text-center" style="background-color: #34849F;border-radius: 13px;height: 50px;width: 32%"> <a href="javascript:bizvault_access_request()" style="color: #000000"><span style="padding: 2%"><b>REQUEST bizVAULT™ ACCESS</b></span></a> </div>
            </div>
            <div class="row" style="background-color: #33859B;color: #ffff">
              <div class="col-md-12">
                <h4>BASIC BUSINESS FILES AND DOCUMENTS</h4>
              </div>
            </div>
            <table class="table table-striped">
              <tbody>
                <tr style="background-color: #DBEEF4">
                  <td style="border: none; "><img src="<?php echo base_url().'images/placeholder.png'; ?>"> 
                    <!-- <a href=""><i class="far fa-file-pdf"></i></a> --></td>
                  <td style="text-align: center;"><div style="font-size: 20px; color: #17266f;background-color: #B8DEE9"> <span>2017 Cash Flow Stmt</span> </div></td>
                  <td class="text-center" style="width: 22%"><div id="file_docs_cus_btn" > <a href="" style="color: #ffff">View</a> </div>
                    <div id="file_docs_cus_btn"> <a href="" style="color: #ffff">Download</a> </div></td>
                  <td style="text-align: center; border: none;"><span><strong>ACCCESS EXPIRES</strong></span><br>
                    <span>July 19, 2019</span><br>
                    <span style=" color: red;font-style: italic;">(3 Days Left)</span></td>
                </tr>
                <tr style="background-color: #8FB3E3">
                  <td style="border: none; "><img src="<?php echo base_url().'images/placeholder.png'; ?>"></td>
                  <td style="text-align: center;"><div style="font-size: 20px; color: #17266f;background-color: #B8DEE9"> <span>2017 Cash Flow Stmt</span> </div></td>
                  <td class="text-center" style="width: 22%"><div id="file_docs_cus_btn"> <a href="" style="color: #ffff">View</a> </div>
                    <div id="file_docs_cus_btn"> <a href=""style="color: #ffff">Download</a> </div></td>
                  <td style="text-align: center; border: none;"><span><strong>ACCCESS EXPIRES</strong></span><br>
                    <span>July 19, 2019</span><br>
                    <span style=" color: red;font-style: italic;">(3 Days Left)</span></td>
                </tr>
                <tr style="background-color: #DBEEF4">
                  <td style="border: none; "><img src="<?php echo base_url().'images/placeholder.png'; ?>"></td>
                  <td style="text-align: center;"><div style="font-size: 20px; color: #17266f;background-color: #B8DEE9"> <span>2017 Cash Flow Stmt</span> </div></td>
                  <td class="text-center" style="width: 22%"><div id="file_docs_cus_btn"> <a href="" style="color: #ffff">View</a> </div>
                    <div id="file_docs_cus_btn"> <a href="" style="color: #ffff">Download</a> </div></td>
                  <td style="text-align: center; border: none;"><span><strong>ACCCESS EXPIRES</strong></span><br>
                    <span>July 19, 2019</span><br>
                    <span style=" color: red;font-style: italic;">(3 Days Left)</span></td>
                </tr>
                <tr style="background-color: #8FB3E3">
                  <td style="border: none; "><img src="<?php echo base_url().'images/placeholder.png'; ?>"></td>
                  <td style="text-align: center;"><div style="font-size: 20px; color: #17266f;background-color: #B8DEE9"> <span>2017 Cash Flow Stmt</span> </div></td>
                  <td class="text-center" style="width: 22%"><div id="file_docs_cus_btn"> <a href="" style="color: #ffff">View</a> </div>
                    <div id="file_docs_cus_btn"> <a href="" style="color: #ffff">Download</a> </div></td>
                  <td style="text-align: center; border: none;"><span><strong>ACCCESS EXPIRES</strong></span><br>
                    <span>July 19, 2019</span><br>
                    <span style=" color: red;font-style: italic;">(3 Days Left)</span></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div id="tab_periods" class="tab-pane fade in">
            <div class="row">
              <div class="col-md-4 text-center">
                <h4><?php echo e('Date Creation', true); ?></h4>
                <span class="label label-success task_date_creation"></span> </div>
              <div class="col-md-4 text-center">
                <h4><?php echo e('Date Closed', true); ?></h4>
                <span class="label label-danger task_date_closed"></span> </div>
              <div class="col-md-4 text-center">
                <h4><?php echo e('Time Spent', true); ?></h4>
                <span class="label label-info total_time_spent"></span> </div>
            </div>
            <div class="row" style="margin-top:20px">
              <div class="col-md-12">
                <table class="table">
                  <thead>
                    <tr>
                      <th><?php echo e('User', true); ?></th>
                      <th><?php echo e('From', true); ?></th>
                      <th><?php echo e('To', true); ?></th>
                      <th><?php echo e('Total time', true); ?></th>
                    </tr>
                  </thead>
                  <tbody class="periods_body">
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="bizvault_access_request_modal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body" style="height: 550px;overflow-y: auto;">
        <div class="row">
          <button type="button" class="close" data-dismiss="modal" style="margin-right: 10px">&times;</button>
          <div class="col-md-12" style="margin-top: 12px"> <span id="request_modal_heading"><b>Basic Business Files and Documents</b></span> </div>
          <div class="col-md-8" style="background-color: #1A365D;color: #ffff;margin: 4% 0px 3px 13px;"> <span style="font-size: 18px">Required Business Documents</span> </div>
          <table class="table table-bordered">
            <tbody>
              <tr>
                <td class="file-cell" style="text-align: center;font-size: 30px;border: 10px solid #ffff;background-color: #B0D5E5"><i class="fa fa-file" style="color: #FBD5B5;"></i></td>
                <td class="file-cell" style="border: 10px solid #ffff;background-color: #B0D5E5;font-size: 20px;vertical-align: middle;">2017 Balance Sheet</td>
                <td><div style="background-color:#47AEC3;text-align: center;font-size: 18px"> <a href="" style="color: #ffff;">ACCESS</a> </div>
                  <div style="text-align: center;background-color:#92D14F;font-size: 18px;"> <a href="" style="color: #000">VIEW ONLY</a> </div></td>
              </tr>
              <tr>
                <td class="file-cell" style="text-align: center;font-size: 30px;border: 10px solid #ffff;background-color: #B0D5E5"><i class="fa fa-file" style="color: #FBD5B5;"></i></td>
                <td class="file-cell" style="border: 10px solid #ffff;background-color: #B0D5E5;font-size: 20px;vertical-align: middle;">2017 Balance Sheet</td>
                <td><div style="background-color:#47AEC3;text-align: center;font-size: 18px"> <a href="" style="color: #ffff;">ACCESS</a> </div>
                  <div style="text-align: center;background-color:#92D14F;font-size: 18px;"> <a href="" style="color: #000">VIEW AND DOWNLOAD</a> </div></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="row">
          <div class="col-md-12" style="margin-top: 12px"> <span id="request_modal_heading"><b>Detailed Business Files and Documents</b></span> </div>
          <div class="col-md-8" style="background-color: #1A365D;color: #ffff;margin: 4% 0px 3px 13px;"> <span style="font-size: 18px">Required Business Documents</span> </div>
          <table class="table table-bordered">
            <tbody>
              <tr>
                <td class="file-cell" style="text-align: center;font-size: 30px;border: 10px solid #ffff;background-color: #B0D5E5"><i class="fa fa-file" style="color: #FBD5B5;"></i></td>
                <td class="file-cell" style="border: 10px solid #ffff;background-color: #B0D5E5;font-size: 20px;vertical-align: middle;">2017 Balance Sheet</td>
                <td><div style="background-color:#47AEC3;text-align: center;font-size: 18px"> <a href="" style="color: #ffff;">ACCESS</a> </div>
                  <div style="text-align: center;background-color:#92D14F;font-size: 18px;"> <a href="" style="color: #000">VIEW AND DOWNLOAD</a> </div></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="row">
          <div class="col-md-12" style="margin-top: 12px"> <span id="request_modal_heading"><b>Basic Personal Financial</b></span> </div>
          <div class="col-md-8" style="background-color: #1A365D;color: #ffff;margin: 4% 0px 3px 13px;"> <span style="font-size: 18px">Required Business Documents</span> </div>
          <table class="table table-bordered">
            <tbody>
              <tr>
                <td class="file-cell" style="text-align: center;font-size: 30px;border: 10px solid #ffff;background-color: #B0D5E5"><i class="fa fa-file" style="color: #FBD5B5;"></i></td>
                <td class="file-cell" style="border: 10px solid #ffff;background-color: #B0D5E5;font-size: 20px;vertical-align: middle;">2017 Balance Sheet</td>
                <td><div style="background-color:#47AEC3;text-align: center;font-size: 18px"> <a href="" style="color: #ffff;">ACCESS</a> </div>
                  <div style="text-align: center;background-color:#92D14F;font-size: 18px;"> <a href="" style="color: #000">VIEW ONLY</a> </div></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<?php if ($data['task_standby'] && $this->config->item('demo_mode') == FALSE): ?>
<div class="modal fade" id="resumeWorkTaskModal" tabindex="-1" role="dialog"
         aria-labelledby="resumeWorkTaskModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
        <h4 class="modal-title" id="resumeWorkTaskModalLabel"><?php echo e('Resume work?', true); ?></h4>
      </div>
      <div class="modal-body"> <?php echo e('Hi, in your recent work you have left open the tracking of a task.', true); ?>
        <ul>
          <li><strong><?php echo e('Task title', true); ?> :</strong> <?php echo $data['task_standby']['task_title']; ?></li>
          <li><strong><?php echo e('Time spent', true); ?> :</strong> <?php echo $data['task_standby']['task_time_spent']; ?> </li>
        </ul>
        <p><?php echo e('Last tracking is', true); ?>: <strong><?php echo $data['task_standby']['last_tracking']; ?></strong></p>
        <h2><?php echo e('What do you want to do', true); ?>?</h2>
        <center>
          <a href="<?php echo base_url(); ?>datab/delete/task_periods/task_periods_id/<?php echo $data['task_standby']['task_periods_id']; ?>"
                           class="btn btn-secondary"><?php echo e('Dismiss tracking', true); ?></a>
          <button type="button" class="btn btn-danger"
                                OnClick="$('.time_tracker_action[rel=<?php echo $data['task_standby']['task_id']; ?>]').trigger('click');$('#resumeWorkTaskModal').modal('hide');"
                                id="delete_task" rel=""><?php echo e('Resume work', true); ?> </button>
        </center>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>
<script>
  //ck editor
  //  CKEDITOR.replace( 'editTodoInput2');
   // CKEDITOR.instances["editTodoInput2"].on('change', function() {
     //   $("#editTodoInput2").val(this.getData());
    //});

    /****************************************************** TODO LIST ********************************************** */

    // Click on a close button to hide the current list itemvar close = document.getElementsByClassName("close");
    var i;
    for (i = 0; i < close.length; i++) {
        close[i].onclick = function () {
            var div = this.parentElement;
            div.style.display = "none";
        }
    }

    var todo_json = [];


    $('.todo_ul_edit_mode').on("click", "li", function (e) {

        if ($(this).hasClass("checked")) {
            new_value = 0;
        } else {
            new_value = 1;
        }
        $(this).toggleClass("checked");
        current_todo_id = $(this).data('todoid');
        $.ajax({
            url: base_url + "ajax/update_field/tasks_todo/status/" + new_value + "/id/" + current_todo_id,
            dataType: 'json',
            cache: false,
            success: function (data) {

            }
        });
        e.preventDefault();
    });

    $('.todo_ul_edit_mode ').on("click", ".close", function (e) {
        e.preventDefault();
        parent_li = $(this).parent();
        current_todo_id = $(this).parent().data('todoid');
        $.ajax({
            url: base_url + "ajax/delete/tasks_todo/id/" + current_todo_id,
            dataType: 'json',
            cache: false,
            success: function (data) {
                parent_li.remove();
            }
        });
        e.stopPropagation();
    });

    $('#newTaskAddBtn').on('click', function () {
        var li = document.createElement("li");
        var inputValue = $('#AddTodoInput').val();
        var t = document.createTextNode(inputValue);
        li.appendChild(t);
        if (inputValue === '') {
            alert("You must write something!");
        } else {
            todo_json.push(inputValue);
            console.log(todo_json);
            $('#add_task_todo').val(JSON.stringify(todo_json));
            $('#newTaskTodoUl').append("<li>" + inputValue + "</li>");
            ;
        }
        $('#AddTodoInput').val("");

    });

    $('#editTaskAddBtn').on('click', function () {
        var li = document.createElement("li");
        var inputValue = $('#editTodoInput').val();
        var t = document.createTextNode(inputValue);
        li.appendChild(t);
        if (inputValue === '') {
            alert("You must write something!");
        } else {
            todo_json.push(inputValue);
            console.log(todo_json);
            $('#edit_task_todo').val(JSON.stringify(todo_json));
            $('#editTaskTodoUl').append("<li>" + inputValue + "</li>");
            ;
        }
        $('#editTodoInput').val("");

    });

  function remove_reply_section(){
    $("#reply_section").html('');
    $("#replyId").val(0);
  }
		
	function reply_comment(commentId, userId, user_name){
    $("#replyId").val(commentId);
    var ele = $("#comment_row_"+commentId+"");
    var datetime = ele.find(".comment_heading").find("span").html();
    var body = ele.find(".comment_body").html();
    $("#reply_section").html('<div class="card" style="background-color: #f3f1f1;"><div class="card-body" style="font-style: italic;"><div class="card-text" style="padding:4% 2% 0% 2%"> <a href="javascript:;" onclick="remove_reply_section()" style="float:right;color:grey;"><i class="fa fa-times"></i></a> <br><p>'+body+'</p></div></div><hr style="margin-bottom:0px;"><h5 class="card-header" style="padding: 2%;border-radius: 5px;font-size: 12px;">'+user_name+', '+datetime+'</h5></div>');
		//$("#editTodoInput2").val('').val("@"+user_name+" ").focus();
	}
	
	$("#comment_attach_a").on("click", function(){
    $("#uploaded_file_name").html('');
    $("input[name=comment_file]").val('').clone(true);
		$("input[name=comment_file]").click();
	});

  $("input[name=comment_file]").on("change", function(e){
    $("#uploaded_file_name").html(this.files[0].name);
  });

  $("#editTodoInput2").on("keyup", function(){
    $("#commentMessageError").hide();
  });

  $("#editTodoInput1").on("keyup", function(){
    $("#commentTitleError").hide();
  });

	
	$('#editTaskAddBtn2').on('click', function(e){
    $("#reply_section").html('');
		var formData = new FormData($(this).parents('form')[0]);
		
    var CommentInput = $("#editTodoInput2");
    var CommentTitle = $("#editTodoInput1");
		if(CommentInput.val()=='' || CommentTitle.val()==''){
      if(CommentInput.val()=='')
        $("#commentMessageError").show();
      
      if(CommentTitle.val()=='')
        $("#commentTitleError").show();
			return false;
		}
		
		$("#editTodoInput2").val('');
		$("#editTodoInput1").val('');
    $("#uploaded_file_name").html('');
		$("input[name=comment_file]").val('').clone(true);
		
		$('.progress').show();
        $.ajax({
            url: '<?php echo site_url("ajax/addComment"); ?>',
            type: 'POST',
			xhr: function () {
				var xhr = new window.XMLHttpRequest();
				xhr.upload.addEventListener("progress", function (evt) {
					if (evt.lengthComputable) {
						var percentComplete = evt.loaded / evt.total;
						percentComplete = parseInt(percentComplete * 100);
					}
				}, false);
				return xhr;
			},
      success: function (data) {
        $("#replyId").val(0);
				$("#editTaskTodoUl2").prepend(data);
				/*$(".progress").removeClass("progress-striped");
				$(".progress").addClass("progress-bar-default");
				setTimeout(function(){
					$(".progress").slideUp(1000);
					setTimeout(function(){
						$(".myprogress").text(0 + '%');
						$(".myprogress").css('width', 0 + '%');
						$(".progress").removeClass("progress-bar-default");
						$(".progress").addClass("progress-striped");
					}, 1000);
					$("#loader_files_spinner").hide();
					$("#files_div").append(data);
					get_recent_photos();
				}, 1000);*/
            },
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        });
        return false;
	});
	
	/*$("#editTaskAddBtn2").on("click", function(){
		var formData = new FormData($("#addComments")[0]);
		
	});*/
	
    /*$('#editTaskAddBtn2').on('click', function () {
        var li = document.createElement("li");
        var inputValue1 = $('#editTodoInput1').val();
        var inputValue = $('#editTodoInput2').val();
        var t1 = document.createTextNode(inputValue1);
        var t = document.createTextNode(inputValue);
        li.appendChild(t1);
        li.appendChild(t);
        if (inputValue == '' || inputValue1 == '') {
            alert("You must write something!");
        } else {
            todo_json.push(inputValue1);
            todo_json.push(inputValue);
            console.log(todo_json);
            $('#edit_task_todo').val(JSON.stringify(todo_json));
            $('#editTaskTodoUl2').append("<li class='Comment_css1'>" +'<strong class="circle1">'+inputValue1.charAt(0)+'</strong>'+'&nbsp;'+'&nbsp;'+'&nbsp;'+'<strong>'+inputValue1+'</strong>'+'&nbsp;'+'&nbsp;'+new Date()+'<br> '+'<div class="strong_comment">'+inputValue+'</div>'+ "</li>");
            //$('#editTaskTodoUl2').append("<li>" + inputValue + "</li>");
        }
        $('#editTodoInput2').val("");
        $('#editTodoInput1').val("");

    });*/

    function removeA(arr) {
        var what, a = arguments, L = a.length, ax;
        while (L > 1 && arr.length) {
            what = a[--L];
            while ((ax= arr.indexOf(what)) !== -1) {
                arr.splice(ax, 1);
            }
        }
        return arr;
    }

    /****************************************************** DROP ZONE UPLOAD ********************************************** */
    $(document).ready(function(){
      var myDropzone = new Dropzone("#dropzone_form", {
          url: "<?php echo base_url();?>ajax/upload_attachments",
          dictDefaultMessage: "",
          success: function(){
            popolate_attachment(JSON.parse(xhrmessage));
          }
      });
    });
    // myDropzone.on("error", function (file, error, errorxhr) {
    //     error_message = JSON.parse(errorxhr.response);
    //     $('.dropzone_error').html(error_message.error);
    // });
    // myDropzone.on("success", function (file, xhrmessage) {
    //     popolate_attachment(JSON.parse(xhrmessage))
    // });
    // myDropzone.on("complete", function (file, error, xhrmessage) {
    //     //$('.dropzone_error').html("");
    //     myDropzone.removeFile(file);
    // });

    

    /****************************************************** VARIOUS ********************************************** */

    $('.colorPicker').colorselector();

    $('#delete_task').on('click', function (event) {
        var result = confirm("Are you sure?");
        var task_id = $(this).attr("rel");
        if (result) {
            $.ajax({
                url: base_url + "ajax/delete/tasks/task_id/" + task_id,
                dataType: 'json',
                cache: false,
                success: function (data) {
                    window.location.reload();
                }
            });
        }
    })

    /****************************************************** MODALS  ********************************************** */

    $('#addTaskModal').on('show.bs.modal', function (event) {

        var button = $(event.relatedTarget) // Button that triggered the modal
        var container_name = button.data('container_name');
        var container_id = button.data('container_id');

        todo_json = [];
        $('#add_task_todo').val("");

        var modal = $(this)
        modal.find('.modal-title').text('Add Task in: ' + container_name)
        $('#task_container').val(container_id)

        modal.find('.todo_ul').html("");
        modal.find('.todo_ul').on("click", "li", function () {
            removeA(todo_json, $(this).html());
            $('#task_todo').val(JSON.stringify(todo_json));
            $(this).remove();

            /*var index = $.inArray("prova", todo_json);
            if (index >= 0) todo_json.splice(index, 1);*/

        });

    });

    function repliedCommentHtml(c){
      var attachHtml = '';
      if(c.task_comment_is_attach==1){
        attachHtml = '<br><br><a href="<?php echo base_url(); ?>'+c.task_comment_full_path+'" download>'+c.task_comment_file_fullname+'</a>';
      }
      return '<div class="card" style="background-color: #f3f1f1;"><div class="card-body" style="font-style: italic;"><div class="card-text" style="padding:4% 2% 0% 2%"><p>'+c.task_comment_message+' '+attachHtml+'</p></div></div><hr style="margin-bottom:0px;"><h5 class="card-header" style="padding: 2%;border-radius: 5px;font-size: 12px;">'+c.dashboardUserFirstName+' '+c.dashboardUserLastName+', '+c.task_created_at+'</h5></div>';
    }

    $('#editTaskModal').on('show.bs.modal', function (event) {

        var button = $(event.relatedTarget) // Button that triggered the modal
        var current_task_id = button.data('task_id');

        var modal = $(this)
        if (!current_task_id) {
            return false;
        }

        todo_json = [];
        $('#edit_task_todo').val("");

        $.ajax({
            url: base_url + "ajax/get_task_details/" + current_task_id,
            dataType: 'json',
            cache: false,
            success: function (data) {
				var html1 = '';
				$.each(data.comments, function(k, v){
          
          var repliedComment = '';
          if(v.repliedComment.task_comment_id){
            repliedComment = repliedCommentHtml(v.repliedComment);
          }
          
					var file_html = '';
					if(v.task_comment_is_attach==1){
						file_html = '<br><br><a href="<?php echo base_url(); ?>'+v.task_comment_full_path+'" download>'+v.task_comment_file_fullname+'</a>';
					}
					
					html1 += '<div class="col-md-12 comment_row" id="comment_row_'+v.task_comment_id+'"><div class="col-md-1"><p class="comment_name">'+v.dashboardUserFirstName.charAt(0)+v.dashboardUserLastName.charAt(0)+'</p></div><div class="col-md-11"><div class="col-md-12"><p class="comment_heading"><strong>'+v.task_comment_title+'</strong> <span>'+v.task_created_at+'</span></p>'+repliedComment+'<p class="comment_body">'+v.task_comment_message+''+file_html+'</p></div><div class="col-md-12"><u><a href="javascript:;" class="comment_reply_btn comment_heading" onclick="reply_comment('+v.task_comment_id+', '+v.task_comment_user_id+', \''+v.dashboardUserFirstName+' '+v.dashboardUserLastName+'\')">Reply</a></u></div></div></div>';
				});
				$("#editTaskTodoUl2").html(html1);
                $('.upload_task_id').val(data.task.task_id);
                modal.find('.task_id').val(data.task.task_id);
                modal.find('#delete_task').attr('rel', data.task.task_id);
                modal.find('.task_title').val(data.task.task_title);
                modal.find('.task_user_name').html(data.task.user_name + ' ' + data.task.user_last_name);
                modal.find('.task_header').html(data.task.task_title);
                modal.find('.task_description').val(data.task.task_description);
                modal.find('.task_time_estimate').val(data.task.task_time_estimate);
                modal.find('.task_time_spent').val(data.task.task_time_spent);
                modal.find('.colorPicker').colorselector("setValue", data.task.task_color);
                modal.find('.task_container').val(data.task.task_container);
                modal.find('#loan_amount_span').hide();
                if(data.task.task_funding_amount_requested!=0){
                  modal.find('#loan_amount_span').find('label').html('$'+data.task_funded_amount_formated);
                  modal.find('#loan_amount_span').show();
                }

                if (data.task.task_due_date != "0000-00-00 00:00:00")
                    modal.find('.task_due_date').val(data.task.task_due_date);
                else
                    modal.find('.task_due_date').val('');


                // Details tab
                modal.find('.task_date_creation').html(data.task.task_date_creation);
                modal.find('.task_date_closed').html(data.task.task_date_closed);

                // Working periods task
                $('.periods_body').html("");
                if (data.task_periods.length > 0) {
                    data.task_periods.forEach(function (p) {
                        $('.periods_body').append("<tr><td>" + p.user_name + " " + p.user_last_name + "</td><td>" + p.task_date_start + "</td><td>" + p.task_date_stop + "</td><td>" + p.total_time + "</td></tr>");
                    });
                    $('.total_time_spent').html(data.task_time_spent);
                } else {
                    $('.periods_body').append("<tr><td colspan='3'>No working periods found for this task.</td></tr>");
                }

                // Task Todo
                modal.find('.todo_ul').html("");
                if (data.task_todo.length > 0) {
                    data.task_todo.forEach(function (a) {
                        if (a.status == 0) {
                            modal.find('.todo_ul').append("<li data-todoid='" + a.id + "'>" + a.title + "<span class='close'>x</span></li>");
                        } else {
                            modal.find('.todo_ul').append("<li data-todoid='" + a.id + "' class='checked'>" + a.title + "<span class='close'>x</span></li>");
                        }
                    });
                }

                // Task Comment
                modal.find('.comment_ul').html("");
                if (data.task_comment.length > 0) {
                    data.task_comment.forEach(function (a) {
                        if (a.status == 0) {
                            modal.find('.task_comment').append("<li data-commentid='" + a.id + "'>" + a.title + "<span class='close'>x</span></li>");
                        } else {
                            modal.find('.task_comment').append("<li data-commentid='" + a.id + "' class='checked'>" + a.title + "<span class='close'>x</span></li>");
                        }
                    });
                }

                // Attachments
                $('.attachments_body').html("");
                if (data.task_attachments.length > 0) {
                    data.task_attachments.forEach(function (a) {
                        popolate_attachment(a)
                    });


                } else {
                    $('.attachments_body').append("<tr><td colspan='3'>No attachments found for this deal.</td></tr>");
                }


            },
        });




        $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

            var tab = $(e.target).attr('href');

            $.ajax({
                url: base_url + "ajax/get_task_details/" + current_task_id,
                dataType: 'json',
                cache: false,
                success: function (data) {
                    modal.find('.task_id').val(data.task_id);

                },
            });

        })

        event.stopPropagation();
    });

    function popolate_attachment(a) {
        $('.attachments_body').append("<tr><td><img width='25' src='<?php echo base_url();?>images/file.png' /></td><td><a href='<?php echo base_url();?>uploads/" + a.attachment_filename + "'>" + a.attachment_original_filename + "</a></td><td>" + a.user_name + "</td><td>" + a.attachment_creation_date + "</td><td><img class='delete_attachment' rel='" + a.attachment_id + "' width='25' alt='Delete file' title='Delete file' src='<?php echo base_url();?>images/delete.png'></tr>");
        $('.delete_attachment').on('click', function (event) {
            var result = confirm("Are you sure?");
            var attachment_id = $(this).attr("rel");
            if (result) {
                $.ajax({
                    url: base_url + "ajax/delete/attachments/attachment_id/" + attachment_id,
                    dataType: 'json',
                    cache: false,
                    success: function (data) {
                        window.location.reload();
                    }
                });
            }
        })
    }

    $(function () {

        <?php if ($data['task_standby']['task_title']): ?>
        $('#resumeWorkTaskModal').modal('show');
        <?php endif; ?>

        $('.datetimepicker').datetimepicker({
            format: 'YYYY-MM-DD H:mm'
        });

        /* Here we will store all data */
        var myArguments = {};

        function assembleData(object, arguments) {
            var data = $(object).sortable('toArray'); // Get array data
            var container_id = $(object).attr("rel"); // Get step_id and we will use it as property name
            var arrayLength = data.length; // no need to explain

            /* Create step_id property if it does not exist */
            if (!arguments.hasOwnProperty(container_id)) {
                arguments[container_id] = new Array();
            }

            /* Loop through all items */
            for (var i = 0; i < arrayLength; i++) {
                if (data[i]) {
                    var task_id = data[i];
                    /* push all image_id onto property step_id (which is an array) */
                    arguments[container_id].push(task_id);
                }
            }
            return arguments;
        }

        /* Sort task */
        var globalTimer;
        <?php if ($this->session->userdata('user_session')['user_permissions'] <= 10): ?>
        $(".sortable").sortable({
            connectWith: ".sortable",
            cancel: ".nodrag",
            opacity: 0.7,
            placeholder: "li-placeholder",
            /* That's fired first */
            start: function (event, ui) {
                $('.column').css('overflow-y','inherit');// fix for x scroll bug
                myArguments = {};
                /*$('.column').css('overflow', 'hidden');*/
                ui.item.addClass('rotate');
                globalTimer = setTimeout(function () {
                    //$('.drag_options').fadeIn(300);
                    $('.drag_options').css("visibility", "inherit");
                }, 800);
            },
            /* That's fired second */
            remove: function (event, ui) {
                /* Get array of items in the list where we removed the item */
                myArguments = assembleData(this, myArguments);
            },
            /* That's fired thrird */
            receive: function (event, ui) {
                /* Get array of items where we added a new item */
                myArguments = assembleData(this, myArguments);
            },
            update: function (e, ui) {
                if (this === ui.item.parent()[0]) {
                    /* In case the change occures in the same container */
                    if (ui.sender == null) {
                        myArguments = assembleData(this, myArguments);
                    }
                }
            },
            /* That's fired last */
            stop: function (event, ui) {
                clearTimeout(globalTimer);
                ui.item.removeClass('rotate');
                $('.column').css('overflow-y','auto');// fix for x scroll bug
                if ($(ui.item.parent()[0]).attr('rel') == 'archive' || $(ui.item.parent()[0]).attr('rel') == 'bin') {
                    ui.item.hide();
                }
                //$('.drag_options').fadeOut(100);
                $('.drag_options').css("visibility", "hidden");
                $('.bin_container').fadeOut(500);
                /* Send JSON to the server */
                console.log("Send JSON to the server:<pre>" + JSON.stringify(myArguments) + "</pre>");

                if ($(ui.item.parent()[0]).attr('rel') == 'bin') {
                    task_id = $(ui.item).attr('id');

                    $.ajax({
                        url: base_url + "ajax/delete/tasks/task_id/" + task_id,
                        type: 'post',
                        dataType: 'json',
                        data: myArguments,
                        cache: false
                    });
                } else if ($(ui.item.parent()[0]).attr('rel') == 'archive') {
                    task_id = $(ui.item).attr('id');

                    $.ajax({
                        url: base_url + "ajax/update_field/tasks/task_archived/1/task_id/" + task_id,
                        type: 'post',
                        dataType: 'json',
                        data: myArguments,
                        cache: false
                    });
                } else {
                    $.ajax({
                        url: base_url + "ajax/update_position",
                        type: 'post',
                        dataType: 'json',
                        data: myArguments,
                        cache: false
                    });
                }
            },
        });
        <?php  endif;?>


        $(".portlet").addClass("ui-helper-clearfix ui-corner-all");

        $(".portlet-toggle").on("click", function () {
            var icon = $(this);
            icon.toggleClass("ui-icon-minusthick ui-icon-plusthick");
            icon.closest(".portlet").find(".portlet-content").toggle();
            return false;
        });

        $(".column").on("tap", function () {

        });

        $('.time_tracker_action').on("click", function () {

            var task_id = $(this).attr("rel");

            if (current_task_tracking != null && task_id != current_task_tracking) {
                alert("You have already tracking now.");
                return false;
            }

            if (current_task_tracking == null) {

                current_task_tracking = task_id;

                // START TIMER
                $('#timer').runner('start');
                $.ajax({
                    url: base_url + "ajax/time_tracker/start/" + task_id,
                    type: 'get',
                    dataType: 'json',
                    cache: false,
                    success: function (data) {
                        $('.timer_task_title').html(data.task_title.substring(0, 10) + '...');

                    },
                });
                $('.timer_box').removeClass("hide");
                $('#timer_container').addClass("label label-warning")
                $('.pause_button').attr("rel", task_id);

                // Change button
                var src = $('.time_tracker_action[rel=' + current_task_tracking + ']').attr("src").replace('icon_start.png', 'icon_pause.png');
                $('.time_tracker_action[rel=' + current_task_tracking + ']').attr("src", src);


            } else {
                // STOP TIMER

                $('#timer').runner('reset');
                $('#timer').runner('stop');
                $.ajax({
                    url: base_url + "ajax/time_tracker/stop/" + task_id,
                    type: 'get',
                    dataType: 'json',
                    cache: false
                });
                $('.timer_box').addClass("hide");
                $('#timer_container').removeClass("label label-warning")
                $('.pause_button').attr("rel", null);
                $('.timer_task_title').html("");

                // Change button
                var src = $('.time_tracker_action[rel=' + current_task_tracking + ']').attr("src").replace('icon_pause.png', 'icon_start.png');
                $('.time_tracker_action[rel=' + current_task_tracking + ']').attr("src", src);

                current_task_tracking = null;
            }

            return false;
        });
    });
  
  function bizvault_access_request(){
    // alert();
    // return false;
    $('#bizvault_access_request_modal').modal('show');
    $('#editTaskModal').modal('hide');
  }

  function toggleShowDescription(id){
    $("#description_"+id+"").slideToggle();
  }
</script> 
