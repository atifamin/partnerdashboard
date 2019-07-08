$(function () {

  'use strict';
  

  if($('.tblalerts').length > 0)
  {
  	 getalertslist();
  	 
  	    $('.tblalerts') .on('click','.btn-delete-alerts',function()
          {
            var r = confirm("Are sure to delete this alerts?");
			if (r == true) 
			{
            
            var alerts_id = $(this).attr("data-id");
            var url = "ajax.php?action=deletealerts&id=" + alerts_id;
            $.ajax({
                type: 'get',
                url: url,
                dataType: 'json',
                cache: false,
                success: function(data) {
                    if (data != null) {
                        if (data.success == true) {
                            window.location.reload(true);
                        }
                        else
                        {
							alert(data.message);
							
						}
                    }
                },
                error: function(request, rstatus, error) {
                    alert(rstatus + ", " + error);
                    
                }
            }); // end ajax  
            
            }
            
        });

			 $('.tblalerts') .on('click','.btn-alerts-active',function()
          {
           
            var r = confirm("Are You Sure You Want To Change This News Item To [Active/Inactive]");
			if (r == true) 
			{
            var btn = $(this);
            var alerts_id = $(this).attr("data-id");
            var active = $(this).attr("data-active");
            var url = "ajax.php?action=activealerts&id=" + alerts_id + "&active="+ active; 
             //btn.button('loading');
            $.ajax({
                type: 'get',
                url: url,
                dataType: 'json',
                cache: false,
                success: function(data) {
                   //  btn.button('reset');
                    if (data != null) {
                        if (data.success == true) {
                           // window.location.reload(true);
                           if(active == 1)
                           {
						   	  btn.removeClass('btn-primary');
						   	  btn.attr('data-active', 0);
						   	  btn.addClass('btn-danger');
						   	  btn.text('Inactive');
						   }
						   else
						   {
						   	  btn.removeClass('btn-danger');
						   	  btn.attr('data-active', 1);
						   	  btn.addClass('btn-primary');
						   	  btn.text('Active');
						   }
                        }
                        else
                        {
							alert(data.message);
							
						}
                    }
                },
                error: function(request, rstatus, error) {
                    alert(rstatus + ", " + error);
                   //  btn.button('reset');
                }
            }); // end ajax  
            
            }
            
        });

            $('.tblalerts') .on('click','input.rbactive',function() {
				
				 var r = confirm("Are You Sure You Want To Change This News Item To [Active/Inactive]");
				if (r == true) 
				{
				var btn = $(this);
				var alerts_id = $(this).attr("data-id");
				var active = $(this).val();
				var url = "ajax.php?action=activealerts&id=" + alerts_id + "&active="+ active; 
             //btn.button('loading');
            	$.ajax({
                type: 'get',
                url: url,
                dataType: 'json',
                cache: false,
                success: function(data) {
                   //  btn.button('reset');
                    if (data != null) {
                        if (data.success == true) {
                           // window.location.reload(true);
                           /*if(active == 1)
                           {
						   	  btn.removeClass('btn-primary');
						   	  btn.attr('data-active', 0);
						   	  btn.addClass('btn-danger');
						   	  btn.text('Inactive');
						   }
						   else
						   {
						   	  btn.removeClass('btn-danger');
						   	  btn.attr('data-active', 1);
						   	  btn.addClass('btn-primary');
						   	  btn.text('Active');
						   }*/
                        }
                        else
                        {
							alert(data.message);
							
						}
                    }
                },
                error: function(request, rstatus, error) {
                    alert(rstatus + ", " + error);
                   //  btn.button('reset');
                }
            }); // end ajax  

				}
			});
          
           $('.tblalerts') .on('click','.btn-edit-alerts',function()
	       {
	            var jsonobj = $(this).attr('data-object');
	            jsonobj = JSON.parse(jsonobj);
	            $('.frm-alerts .form-control').val('');
	            $('.frm-alerts #alerts_id').val(jsonobj.id);
	            $('.frm-alerts #alerts_title').val(jsonobj.title);
	            $('.frm-alerts #alerts_date').val(jsonobj.published_at);
	            $('.frm-alerts #alerts_link').val(jsonobj.url);
	            $('.frm-alerts #alerts_desc').val(jsonobj.description);
	           
	          

	            if(typeof  jsonobj.alerts_photo_path != "undefined" )
	            {
					$('.frm-alerts .fileinput').addClass('fileinput-exists').removeClass('fileinput-new');
					var alerts_photo = '<img src="'+ jsonobj.alerts_photo_path +'" />';
					$('.frm-alerts .fileinput-preview').html(alerts_photo);
	                $('.frm-alerts .btn-add-alerts-photo').hide();
				}
	            var $modal = $('#modal-alerts').modal({
	                show: true,
	                keyboard: false
	            });
	       
	      });

  	 
  	 
  }
 


    function getalertslist()
    {
		var url = "ajax.php?action=getalertslist";
		var oTable = $('.tblalerts').dataTable( {
			"iDisplayLength": 50,
		     "aLengthMenu": [[50, 75, 100, 125, 150, 200 , -1], [50, 75, 100, 125, 150, 200, "All"]],
			"sAjaxSource": url,
			"aoColumns": [
				{ "mData": "active" , "sClass": "text-center" },
				{ "mData": "title" },
				{ "mData": "url" },
				{ "mData": "description" },
				{ "mData": "date" }
			],
			
		"columnDefs": [{
                "orderable": false,
                "targets": [0]
            }],
		 "order": [
                [2, 'asc']
            ],
           
		} );
	}
    

});



