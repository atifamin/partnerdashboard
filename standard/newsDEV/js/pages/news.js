$(function () {

  'use strict';
  
     $('#modal-news').on('show.bs.modal', function(){
        $('#news_desc').wysihtml5();
    });

    $('#modal-news').on('hide.bs.modal', function(){
        $('.wysihtml5-sandbox, .wysihtml5-toolbar').remove();
        $('#news_desc').show();
    });
  
    $('.btn-add-news') .on('click',function()
	{

         vnews.resetForm();
        $('.frm-news .form-group').removeClass('has-error');
        $('.frm-news .form-control').val('');
        $('.frm-news #news_id').val('');
        $('.frm-news .fileinput').addClass('fileinput-new').removeClass('fileinput-exists');
        $('.frm-news .fileinput-preview').html('');
	    $('.frm-news .btn-add-news-photo').show();
	    
	    
        var $modal = $('#modal-news').modal({
            show: true,
            keyboard: false
        });

        
    });
  if($('#news-box').length > 0)
  {
  	 getfeednews();
  }
  if($('.tblnews').length > 0)
  {
  	 getnewslist();
  	 
  	    $('.tblnews') .on('click','.btn-delete-news',function()
          {
            var r = confirm("Are sure to delete this news?");
			if (r == true) 
			{
            
            var news_id = $(this).attr("data-id");
            var url = "ajax.php?action=deletenews&id=" + news_id;
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

			 $('.tblnews') .on('click','.btn-news-active',function()
          {
            
            var r = confirm("Are You Sure You Want To Change This News Item To [Active/Inactive]");
			if (r == true) 
			{
            var btn = $(this);
            var news_id = $(this).attr("data-id");
            var active = $(this).attr("data-active");
            var url = "ajax.php?action=activenews&id=" + news_id + "&active="+ active; 
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

			$('.tblnews') .on('click','input.rbactive',function() {
				 var r = confirm("Are You Sure You Want To Change This News Item To [Active/Inactive]");
				if (r == true) 
				{
				var btn = $(this);
				var news_id = $(this).attr("data-id");
				var active = $(this).val();
				var url = "ajax.php?action=activenews&id=" + news_id + "&active="+ active; 
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

           
           
           $('.tblnews') .on('click','.btn-edit-news',function()
	       {
	            var jsonobj = $(this).attr('data-object');
	            jsonobj = JSON.parse(jsonobj);
	            $('.frm-news .form-control').val('');
	            $('.frm-news #news_id').val(jsonobj.id);
	            $('.frm-news #news_title').val(jsonobj.title);
	            $('.frm-news #news_date').val(jsonobj.published_at);
	            $('.frm-news #news_link').val(jsonobj.url);
	            $('.frm-news #news_desc').val(jsonobj.description);
	           
	          

	            if(typeof  jsonobj.news_photo_path != "undefined" )
	            {
					$('.frm-news .fileinput').addClass('fileinput-exists').removeClass('fileinput-new');
					var news_photo = '<img src="'+ jsonobj.news_photo_path +'" />';
					$('.frm-news .fileinput-preview').html(news_photo);
	                $('.frm-news .btn-add-news-photo').hide();
				}
	            var $modal = $('#modal-news').modal({
	                show: true,
	                keyboard: false
	            });
	       
	      });

  	 
  	 
  }
 
  function getfeednews()
  {
  	$.get("news_feed.php", function(data) {
         //alert(data);
	    var entry = jQuery.parseJSON(data);
	    //var entry = obj.entry;
	    var html = "";
	   $.each(entry, function( i, value ) 
	    {
                //console.log(entry[i].link.attribute.href);
                //alert(entry[i].title);
				html += '<li class="item">';
				html += '<div class="d-inline-block pin-box">';
				html += '<div class="pin-icon">';
				html += '<a href="#"><img alt="Pin This Item" src="assets/img/pin-icon.png"></a>';
				html += '<p>Pin This Item</p>';
				html += '</div>';
				html += '</div>'
				html += '<div class="d-inline-block news-details">';
				html += '<a target="_blank" href="'+ entry[i].url +'" class="title">';
				html += entry[i].title;
				html += '</a>';
				html += '<p class="pub_date"><i class="fa fa-calendar"></i> ' + moment(entry[i].published).format('MMMM Do YYYY'); + '</p>';
				html += '<p class="message">';
				html += entry[i].description;
				html += '</p>'
				html += '<a target="_blank" href="'+ entry[i].url +'" class="pull-right readmore"><img alt="Read More" src="assets/img/read-more.jpg"></a>';
				html += '</div>';
				html += '</li>'
			
			
		});
		
		$('#news-box').html(html);
		/*$(".news-wrapper").easyTicker({
        direction: 'up',
        easing: 'linear',
        visible:3,
        interval: 2000
    });*/
    
       //$('.news-wrapper').marquee({delay:0, timing:50});
      /**/
      
      /*$('#news-wrapper').scrollbox({
		  linear: true,
		  step: 1,
		  delay: 0,
		  speed: 40
        });*/
        $('#news-box').marquee({
            //speed in milliseconds of the marquee
            duration: 5000,
            //gap in pixels between the tickers
            gap: 50,
            //time in milliseconds before the marquee will start animating
            delayBeforeStart: 0,
            //'left' or 'right'
            direction: 'up',
            //true or false - should the marquee be duplicated to show an effect of continues flow
            duplicated: true
        });
	    
	});

		 //Date picker
    $('#news_date').datepicker({
		autoclose: true,
		format: "mm/dd/yyyy",
		startDate: new Date(),
    })
  }
  
  
  $('#news_photo').on('change',function()
    {
      if($(this).val()!= "")
	  {
	  	 var ext = $(this).val().split('.').pop().toLowerCase();
		if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
		    alert('Unknown Image extension!');
		    $(this).val('');
		     return false;
		}
	  }  
    });
    
    function getnewslist()
    {
		var url = "ajax.php?action=getnewslist";
		var oTable = $('.tblnews').dataTable( {
			"iDisplayLength": 50,
		     "aLengthMenu": [[50, 75, 100, 125, 150, 200 , -1], [50, 75, 100, 125, 150, 200, "All"]],
			"sAjaxSource": url,
			"aoColumns": [
				{ "mData": "action" , "sClass": "text-center" },
				{ "mData": "news_active" , "sClass": "text-center" },
				{ "mData": "news_title" },
				{ "mData": "news_url" },
				{ "mData": "news_desc" },
				{ "mData": "news_date" },
				{ "mData": "news_photo" }
			],
			
		"columnDefs": [{
                "orderable": false,
                "targets": [0,1,6]
            }],
		 "order": [
                [2, 'asc']
            ],
           
		} );
	}
    
    
    function ajaxsavenews() 
        {
            $('.frm-news div.alert').removeClass('alert-danger alert-success').hide().html('');
            var btn = $('.frm-news .btn-save-news');
            var url = $('.frm-news').attr('action');
            var formdata = $('.frm-news').serialize();
            var options = {
                type: 'post',
                url: url,
                dataType: 'json',
                data: formdata,
                cache: false,
                beforeSend: function() {
                    btn.button('loading');
                    $('.frm-news div.alert').removeClass('alert-danger alert-success');
                },
                success: function(data) {
                    if (data != null) {
                        btn.button('reset');
                        if (data.success) {
                            $('.frm-news div.alert').addClass('alert-success').html("<strong>" + data.message + "</strong>");
                            $('.frm-news div.alert').fadeIn('slow').delay(2000).fadeOut("slow", 'linear', function() {
                                window.location.reload(true);
                            });
                        } else {
                            $('.frm-news div.alert').addClass('alert-danger').html("<strong>" + data.message + "</strong>");
                            $('.frm-news div.alert').fadeIn('slow').delay(2000).fadeOut("slow", 'linear', function() {
                            });
                        }
                    }
                },
                error: function(request, status, error) {
                    alert(status + ", " + error);
                    btn.button('reset');
                }
            }; // end ajax  

			$('.frm-news').ajaxSubmit(options);
        }
    
    
  var vnews = $('#frm-news').validate({
        onkeyup: false,
        onfocus: false,
        ignore: ":hidden:not(textarea)",
        errorElement: 'span', //default input error message container
        errorClass: 'help-block help-block-error', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
        rules: {
            news_title: {
                required: true
            },
            
            news_date: {
                 required: true,
				date: true
            },
            news_link: {
                required: true,
                url: true
            },
            news_desc: {
                required: true
            }

        },
        messages: {
            news_title: {
                required: 'Title is required'
            },
            news_date: {
                required: 'Date is required'
            },
            news_link: {
                required: 'Link is required'
            },
            news_desc: {
                required: 'Description is required'
            }

        },
        success: function() {
            $.noop // Odd workaround for errorPlacement not firing!

        },
        errorPlacement: function(error, element) {
              if($(element).parent().hasClass('input-group'))
              {
			  	error.insertAfter(element.parent()); 
			  }
			  else
			  {
			  	 error.insertAfter(element); 
			  }
             
        },
        invalidHandler: function(event, validator) {},

        highlight: function(element) {
            $(element)
                .closest('.form-group').addClass('has-error');
        },

        unhighlight: function(element) {
            $(element)
                .closest('.form-group').removeClass('has-error');
        },
        submitHandler: function(form) {
            form.submit();
            return false;
        }
    });
     $('#frm-news .btn-save-news').on('click', function() {
        if (vnews.form()) {
        	ajaxsavenews();
        }
     });

});



