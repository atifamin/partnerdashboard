<link rel="stylesheet" href="<?php echo base_url; ?>bower_components/select2/dist/css/select2.min.css">
<div id="create_project_updates" class="modal fade" role="dialog" >
   <div class="modal-dialog">
       <!-- Modal content-->
       <div class="modal-content" style="color:#204d74!important;background-color:#bdd8df!important;border-color:#84c6d6!important;">
           <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
               <br>
               <div style="text-align:center;background-color:#5397c0!important;padding:1px;">
               <h1>Create Project Update</h1>
               </div>
           </div>
           <div class="modal-body" >
           <table>
           <form action="<?php echo base_url; ?>create_project_updates.php" method="POST">
           
           <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
         <tr>  <th>
           <label for="to">To</label></th>
           <td>
           <select  name="to" class="select2" style="width:100%;">
           <option>Select Recipient </option>
           <?php $result=exec_sqlQuery("SELECT * FROM user");
           while($row = mysqli_fetch_assoc($result)){?>

           <option value="<?php echo $row['user_id']; ?>"><?php echo $row['user_fname'];?></option>
           <?php } ?>
           </select></td></tr>
          <tr>
          <th>
           <label  for="title">TITLE</label></th>
           <td>
           <input  name="title"></td></tr>
          
          <tr>
           <th>
           <label  for="updatestatus">UPDATE STATUS</label></th>
           <td>
           <select  name="updatestatus" style="width:100%;">
           <option>Select Project Status</option>
           <option value="Pending">Pending</option>
           <option value="Completed">Completed</option>
           <option value="In Progress">In Progress</option>
           <option value="Postponed">Postponed</option>
           <option value="Awaiting Feedback">Awaiting Feedback</option>
           <option value="Cancelled">Cancelled</option>
           </select></td></tr>
          <tr>
          <th>
           <label  for="completionpercentage">COMPLETION PERCENTAGE</label>
           </th>
           <td>
           <input  name="completionpercentage" >
          </td></tr>
          <tr>
          <th>
           <label  for="completionvalue">COMPLETION VALUE</label>
           </th>
          <td>
           <input name="completionvalue" >
           </td></tr>
           </table>
           <br>
           <textarea id="editor12"  name="editor12" rows="10" cols="80" ></textarea>
           </div>
           <div class="pull-right" style="margin-top:10px;">
           <p style="background-color: #3c8dbc; color:white;padding:4px;">Total Characters: <span id="letterCountprojup"></span><br>
          Remaining Characters: <span id="remainingprojup"></span></p>
           </div>
          
           <button style="margin-left:1%" type="button" class=" btn btn-primary btn-sm" >Maximum Characters 2048</button><br><br>
             
             <br>
           
           <div class="modal-footer">
               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               <input class="btn btn-primary"  type="submit" value="save">
           </div>
           </form>
       </div>
   </div>
</div>
<script src="<?PHP echo base_url; ?>bower_components/select2/dist/js/select2.full.min.js"></script>
   <script>
   $('.select2').select2()
   </script>