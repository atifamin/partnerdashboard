<?php foreach($result as $row): ?>

<div class="col-md-12 comment_row" id="comment_row_<?php echo $row->task_comment_id; ?>">
  <div class="col-md-1">
    <p class="comment_name"><?php echo substr($row->dashboardUserFirstName, 0, 1).substr($row->dashboardUserLastName, 0, 1); ?></p>
  </div>
  <div class="col-md-11">
    <div class="col-md-12">
    <p class="comment_heading"><strong><?php echo $row->task_comment_title; ?></strong> <span><?php echo $row->task_created_at; ?></span></p>
    <?php if(isset($row->repliedComment->task_comment_id)){ ?>
    <div class="card" style="background-color: #f3f1f1;">
      <div class="card-body" style="font-style: italic;">
        <div class="card-text" style="padding:4% 2% 0% 2%">
          <p><?php echo $row->repliedComment->task_comment_message; ?>
          <?php if($row->repliedComment->task_comment_is_attach==1): ?>
          <br /><br />
          <a href="<?php echo base_url().$row->repliedComment->task_comment_full_path; ?>" download><?php echo $row->repliedComment->task_comment_file_fullname; ?></a>
          <?php endif; ?>
          </p>
        </div>
      </div>
      <hr style="margin-bottom:0px;">
      <h5 class="card-header" style="padding: 2%;border-radius: 5px;font-size: 12px;"><?php echo $row->repliedComment->dashboardUserFirstName." ".$row->repliedComment->dashboardUserLastName; ?>, <?php echo $row->repliedComment->task_created_at ?></h5>
    </div>
    <?php } ?>
    <p class="comment_body"><?php echo $row->task_comment_message; ?>
    <?php if($row->task_comment_is_attach==1): ?>
    <br /><br />
    <a href="<?php echo base_url().$row->task_comment_full_path; ?>" download><?php echo $row->task_comment_file_fullname; ?></a>
    <?php endif; ?>
    </p>
    </div>
    <div class="col-md-12"><u><a href="javascript:;" class="comment_reply_btn comment_heading" onclick="reply_comment(<?php echo $row->task_comment_id; ?>, <?php echo $row->task_comment_user_id; ?>, '<?php echo $row->dashboardUserFirstName.' '.$row->dashboardUserLastName; ?>')">Reply</a></u></div>
  </div>
</div>
<?php endforeach; ?>
