$base_url = $("#base_url").val();
$pkanban_url = $("#pkanban_url").val();
$user_id = $("#user_id").val();
$parent_id = $('#parent_id').val();

function load_content(user_id){
    $.post(""+$pkanban_url+"file_manager/index", {user_id:user_id}).done(function(e){
        $("#main_content").html(e);
    });
}

function load_other_folder(user_id, parent_id, folder_id){
    $.post(""+$pkanban_url+"file_manager/load_other_folder", {user_id:user_id, parent_id:parent_id}).done(function(e){
        $("#main_content").html(e);
    });
}

function load_folder(user_id, folder_id){
    $.post(""+$pkanban_url+"file_manager/load_folder", {user_id:user_id, folder_id:folder_id}).done(function(e){
        $("#main_content").html(e);
    });
}

function create_folder(){
    var parent_id = $("#parent_id").val();
    var bizvault_files_and_folders_id = $("#bizvault_files_and_folders_id").val();
    var user_id = $("#user_id").val();
    var folder_name = "NewFolder";
    var data = {
        parent_id       :   parent_id,
        type            :   "folder",
        bizvault_files_and_folders_id :   bizvault_files_and_folders_id,
        user_id         :   user_id,
        folder_name     :   folder_name
    }
    $.post(""+$pkanban_url+"file_manager/create_folder",data).done(function(e){
        $("#no-content").remove();
        $("#folders_area").prepend(e);
    });
}

function open_other_inner_folder(folder_id, slug){
    var data = {
        folder_id:folder_id,
        slug:slug,
    }
    $.post(""+$pkanban_url+"file_manager/open_other_inner_folder",data).done(function(e){
        $("#main_content").html(e);
    });
}

function open_other_folder(){
    window.location.href = $("#base_url").val()+'tabs/bizVault.php?type=other_folder';
}

function open_folder(id){
    window.location.href = $("#base_url").val()+'tabs/bizVault.php?folder='+id;
}

function open_home_page(){
    window.location.href = $("#base_url").val()+'tabs/bizVault.php';
}



$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
    checkboxClass: 'icheckbox_minimal-blue',
    radioClass   : 'iradio_minimal-blue'
});

$('document').ready(function() {
    $('.bizVaultNav').css({'height': $('.bizVaultArticle').outerHeight()});
});



function remove_folder(folder_id){
  $.post(""+$pkanban_url+"file_manager/remove_folder", {folder_id:folder_id}).done(function(e){
  //$("#main_content").html(e);
    location.reload();
  });
}

function remove_file(file_id){
  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this file!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      $("#file_id_"+file_id+"").remove();
      $.post(""+$pkanban_url+"file_manager/remove_file", {file_id:file_id}).done(function(e){});
      swal("Your file has been deleted!", {
        icon: "success",
      });
    } else {
      swal("Your file is safe!");
    }
  });

  
}


// $('#upload_file').on('change',function(e){
//     // e.preventDefault();
//     //var parent_id = $("#parent_id").val();
    
//     var formData = new FormData($('#file_upload_form')[0]);
//     formData.append('parent_id',$parent_id);
//     $.ajax({
//       type: "POST",
//       url: ""+pkanban_url+"file_manager/upload_file",
//       data: formData,
//       cache: false,
//       contentType: false,
//       processData: false,
//       success:function(data){
//         $('#files_area').html(data);
//       }
//     });
//     // $.post(""+pkanban_url+"file_manager/upload_file",{names:names}).done(function(data){
//     //   console.log(data);
//     // });
//   });
function upload_files(){
  var parent_id = $("#parent_id").val();
  var formData = new FormData($('#file_upload_form')[0]);
  formData.append('parent_id',parent_id);
  // $.ajax({
  //   type: "POST",
  //   url: ""+pkanban_url+"file_manager/upload_file",
  //   data: formData,
  //   cache: false,
  //   contentType: false,
  //   processData: false,
  //   success:function(data){
  //     $("#folders_area").append(data);
  //   }
  // });

  $.ajax({
    url: ""+pkanban_url+"file_manager/upload_file",
    type: 'POST',
    xhr: function () {
        $('#progress-row').show();
        var xhr = new window.XMLHttpRequest();
        xhr.upload.addEventListener("progress", function (evt) {
          if (evt.lengthComputable) {
            var percentComplete = evt.loaded / evt.total;
            percentComplete = parseInt(percentComplete * 100);
            $('#progress-row > div > .progress > .progress-bar').css('width', percentComplete + '%');
            if(percentComplete==100)
              setTimeout(function(){
                $('#progress-row').fadeOut();
                $('#progress-row > div > .progress > .progress-bar').css('width', '0%');
              }, 1000);
          }
        }, false);
        return xhr;
    },
    success: function (data) {
      $("#folders_area").append(data);
    },
    data: formData,
    cache: false,
    contentType: false,
    processData: false
  });
}

  $(document).ready(function(){
    pkanban_url = $("#pkanban_url").val();
    var user_id = $("#user_id").val();
    $.post(""+pkanban_url+"file_manager/load_company_logo", {user_id:user_id}).done(function(e){
        $("#company_logo_content").html(e);
    }); 
  });
  
  function refresh_folder_content(){
    location.reload(); 
  }

  function notification(){
    $('#notification_model').modal('show');
  }

  function access_activity(){
    $('#access_activity_model').modal('show');
  }

  function activity(){
    $('#acitivity_model').modal('show');
  }



function edit_folder(id){


    $('#folder_'+id).attr('contenteditable',true).focus();


}


function change_folder_name(id,name){

    $("#folder_"+id+"").attr("contenteditable", false);
      $.post(""+$pkanban_url+"file_manager/change_folder_name", {id:id, name:name}).done(function(e){       
    });


}

function load_summary(percent, total_missing_files){
    var uploadHtml = '<div class="row text-center" style="background-color: #8dea7b"><div class="col-md-12"><span class="text-white" style="font-size: 20px;">UPLOADED</span></div>';
    if(total_missing_files!=0){
        uploadHtml = '<div class="row text-center" style="background-color: #C0504E"><div class="col-md-12"><span class="text-white" style="font-size: 20px;">PLEASE UPLOAD<br> MISSING FILES</span></div>';
    }
    var html = '<div class="row text-center" style="background-color: #4E80C6;"><div class="col-md-12"><span class="text-white" style="font-size: 40px;">'+total_missing_files+'</span><span style="font-size: 35px; color: #A9D8F4"> FILES MISSING</span></div></div>'+uploadHtml+'</div><div class="row" style="background-color:#F2F2F2;padding:12% 0;" align="center"><div class="col-md-12"><div id="greencircle" data-percent="'+percent+'" class="big green" style="background-color:unset;"></div></div></div>';
    $("#summary_preview").html(html);
    $(function(){$("[id$='circle']").percircle();});
    $("#summary_preview").show();
}

function delete_file(id){
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          swal("Your file has been deleted!", {
            icon: "success",
          }).then((value)=>{
              window.location.href = $pkanban_url+'file_manager/delete_file/'+id+'';
          });
        } else {
          swal("Your file is safe!");
        }
      });
}

function view_file(id){
  window.open($base_url+'tabs/view_file.php?h='+id+'', '_blank');
}

function home_breadcrumb(){
  window.location.replace($base_url+'/tabs/bizVault.php?type=other_folder');
}
