$base_url = $("#base_url").val();
$pkanban_url = $("#pkanban_url").val();
$user_id = $("#user_id").val();

function load_content(user_id){
    $.post(""+$pkanban_url+"file_manager/index", {user_id:user_id}).done(function(e){
        $("#main_content").html(e);
    });
}

function load_other_folder(user_id, parent_id){
    $.post(""+$pkanban_url+"file_manager/load_other_folder", {user_id:user_id, parent_id:parent_id}).done(function(e){
        $("#main_content").html(e);
    });
}

function create_folder(){
    var parent_id = $("#parent_id").val();
    var business_folder_type_id = $("#business_folder_type_id").val();
    var user_id = $("#user_id").val();
    var folder_name = "New Folder";
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

function open_folder(folder_id){
    var data = {
        folder_id:folder_id,
    }
    $.post(""+$pkanban_url+"file_manager/open_folder",data).done(function(e){
        $("#main_content").html(e);
    });
}

function open_other_folder(){
    window.location.href = $("#base_url").val()+'tabs/bizVault.php?type=other_folder';
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
