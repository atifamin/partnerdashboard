$base_url = $("#base_url").val();
$pkanban_url = $("#pkanban_url").val();
$user_id = $("#user_id").val();

load_content($user_id);
function load_content(user_id){
    $.post(""+$pkanban_url+"file_manager/index", {user_id:user_id}).done(function(e){
        $("#main_content").html(e);
    });
}

function create_folder(){
    var parent_id = $("#parent_id").val();
    var business_folder_type_id = $("#business_folder_type_id").val();
    var user_id = $("#user_id").val();
    var folder_name = $("#folder_name").val();
    if(business_folder_type_id==0){
        $.post(""+$pkanban_url+"file_manager/load_main_folders_inputs").done(function(e){
            $("#load_main_folders_inputs").html(e);
        });
        $("#create_folder_modal").modal('show');
        return false;
    }
    create_folder_request(parent_id, business_folder_type_id, user_id, "New Folder");
}

function create_folder_request(parent_id, business_folder_type_id, user_id, folder_name){
    var data = {
        parent_id       :   parent_id,
        type            :   "folder",
        business_folder_type_id :   business_folder_type_id,
        user_id         :   user_id,
        folder_name     :   folder_name
    }
    $.post(""+$pkanban_url+"file_manager/create_folder",data).done(function(e){
        $("#main_content").html(e);
    });
}

function checkMainFolder(){
    var id = $("input[name=folder_type]:checked").val();
    $("#business_folder_type_id").val(id);
    $("#create_folder_modal").modal("hide");
    create_folder();
}

function open_folder(folder_id){
    var data = {
        folder_id:folder_id,
    }
    $.post(""+$pkanban_url+"file_manager/open_folder",data).done(function(e){
        $("#main_content").html(e);
    });
}



$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
    checkboxClass: 'icheckbox_minimal-blue',
    radioClass   : 'iradio_minimal-blue'
});