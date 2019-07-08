<link rel="stylesheet" href="<?php echo base_url; ?>bower_components/select2/dist/css/select2.min.css">
<div id="message_recepient" class="modal fade" role="dialog" >
   <div class="modal-dialog">
       <!-- Modal content-->
       <div class="modal-content" style="color:#204d74!important;background-color:#bdd8df!important;border-color:#84c6d6!important;">
           <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
               <br>
               <div style="text-align:center;background-color:#5397c0!important;padding:1px;"><h3>Create New Message</h3></div>
           </div>
           <div class="modal-body" >
           <div class="row">
           <form action="<?php echo base_url; ?>create_message.php" method="POST">
           <div class="col-md-6">
           <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
           <label class="col-md-3 col-xs-3" for="to">To</label>
           <select name="to" class="select2" style="width:57%;">
           <option >Select Recepient</option>
           <?php $result=exec_sqlQuery("SELECT * FROM user");
           while($row = mysqli_fetch_assoc($result)){ ?>

           <option value="<?php echo $row['user_id']; ?>"><?php echo $row['user_fname'];?></option>
           <?php } ?>
           </select>
           </div>
           <div class="pull-right">
           <label for="emailUpdate">CC:</label>
           <input type="text" name="emailUpdate">
           </div>
           </div>
           <div class="row">
           <div class="col-md-6"> 
           <label class="col-md-3 col-xs-3" for="title">Title</label>
           <input name="title" placeholder="Title">
          
           </div>
           </div>
           <div class="row">
           <div class="col-md-6"> 
           <label class="col-md-3 col-xs-3" for="source">Source</label>
           <input  name="source"  placeholder="Source" >
           </div>
           </div>
           <div class="row">
           <div class="col-md-6">
           <label class="col-md-3 col-xs-3" for="subject">Subject</label>
           <input  name="subject" placeholder="Subject" >
           </div>
           </div>
           <br>
           <textarea id="editor4"  name="editor4" rows="10" cols="80" ></textarea>
           
           <div class="pull-right" style="margin-top:10px;">
           <p style="background-color: #3c8dbc; color:white;padding:4px;">Total Characters: <span id="letterCount"></span><br>
          Remaining Characters: <span id="remaining"></span></p>
           </div>
           </div>
           <button style="margin-left:1%" type="button" class=" btn btn-primary btn-sm" >Maximum Characters 2048</button><br><br>
           <?php// echo calculateSumOfChar(); ?>
          
          <br>
           <div class="pull-right" style="background-color: #3c8dbc; color: white;padding:3px;margin-top: -11px;">
           <label for="readmore">Readmore Link</label>
           <input type="text" style="color:black;" name="readmore">
           </div>
          <br>
         
           <div class="modal-footer" style="margin-top:4px;">
           <input style="margin-left:1%;" class="btn btn-primary" type="submit" value="Save">
               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              
               
               
           </div>
           </form>
       </div>
   </div>
   </div>
   <script src="<?PHP echo base_url; ?>bower_components/select2/dist/js/select2.full.min.js"></script>
   <script>
   $('.select2').select2()
   </script>