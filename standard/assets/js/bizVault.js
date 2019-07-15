$base_url = $("#base_url").val();
$pkanban_url = $("#pkanban_url").val();
$user_id = $("#user_id").val();

function load_content(user_id){
    var parent_id = $("#parent_id").val();
    $.post(""+$pkanban_url+"file_manager/index", {user_id:user_id,parent_id:parent_id}).done(function(e){
        $("#main_content").html(e);
    });
}

function load_other_folder(user_id, parent_id, folder_id){
    $.post(""+$pkanban_url+"file_manager/load_other_folder", {user_id:user_id, parent_id:parent_id}).done(function(e){
        $("#main_content").html(e);
    });
}

function load_business_folder(user_id, business_folder_type_id, files_type){
    $.post(""+$pkanban_url+"file_manager/load_business_folder", {user_id:user_id, business_folder_type_id:business_folder_type_id, files_type:files_type}).done(function(e){
        $("#main_content").html(e);
    });
}

function create_folder(){
    var parent_id = $("#parent_id").val();
    var business_folder_type_id = $("#business_folder_type_id").val();
    var user_id = $("#user_id").val();
    var folder_name = "NewFolder";
    var data = {
        parent_id       :   parent_id,
        type            :   "folder",
        business_folder_type_id :   business_folder_type_id,
        user_id         :   user_id,
        folder_name     :   folder_name
    }
    $.post(""+$pkanban_url+"file_manager/create_folder",data).done(function(e){
        $("#no-content").remove();
        $("#folders_area").prepend(e);
    });
}

function open_folder(folder_id, slug){
    var data = {
        folder_id:folder_id,
        slug:slug,
    }
    $.post(""+$pkanban_url+"file_manager/open_folder",data).done(function(e){
        $("#main_content").html(e);
    });
}

function open_other_folder(){
    window.location.href = $("#base_url").val()+'tabs/bizVault.php?type=other_folder';
}

function open_business_folder(files_type){
    window.location.href = $("#base_url").val()+'tabs/bizVault.php?type=business_folder&files_type='+files_type;
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


$('#upload_file').on('change',function(e){
    e.preventDefault();
    var names = [];
    for (var i = 0; i < $(this).get(0).files.length; ++i) {
        names.push($(this).get(0).files[i]);
    }
    var formData = new FormData($('#file_upload_form')[0]);

    // console.log(formData);
    // return false;
    $.ajax({
      type: "POST",
      url: ""+pkanban_url+"file_manager/upload_file",
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      success:function(data){
        console.log(data);
      }
    });
    // $.post(""+pkanban_url+"file_manager/upload_file",{names:names}).done(function(data){
    //   console.log(data);
    // });
  });


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
