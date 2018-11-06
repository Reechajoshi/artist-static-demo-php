
function display_main_content(src,link_txt)
{
	console.log( "inside display_main_content" );

	$(".center_block").find("a").each( function() 
	{ 
		if( $(this).html().trim() == link_txt.trim() ) 
		{
			console.log( $(this).html() );
			$(this).css( "font-weight", "bold" ); 
		}
		else 
		{
			console.log( $(this).html() );
			$(this).css( "font-weight", "normal" ); 
		}
	
	} ); // this finds all anchor tags in the parent element(center_block). center_block contains divs with class submenu_links which contain anchor tags. this loops through all anchor tag and checks if their text is same as the one clicked. if yes, then bold else normal.
	
	var main_content_html = "<iframe name='iFrame' id='iFrame' src='"+ src +"#toolbar=0&navpanes=0&scrollbar=0' style='width:930px;height:650px;z-index:-100;'></iframe>"; // html of the iframe div
	$('.main_content').html( main_content_html ); // assign iframe html to main_content
	$('.main_content').show();
	// return false;
}

function validateEmail(email)
{
	var atpos=email.indexOf("@");
	var dotpos=email.lastIndexOf(".");
	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length)
		return false;
	else
		return true;
}

function show_subscription_msg()
{
	$(".subscribe_msg_div").show();
	$( "#wrapper" ).css( "opacity", "0.5" );
	$( "#wrapper" ).show();
	subscribe_div_width = $(".subscribe_msg_div").width();
	subscribe_div_height = $(".subscribe_msg_div").height();
	$(".subscribe_msg_div").css( { "left" : "50%", "top" : "50%", "margin-top" : -( subscribe_div_height / 2 ) + "px", "margin-left" : -( subscribe_div_width / 2 ) + "px" } );
}


$(document).ready(function(){
	$(document).ajaxStart(function () {
		$( "#loader" ).show();
		$( "#wrapper" ).hide();
	});
	$(document).ajaxStop(function () {
		  $( "#loader" ).hide();
		  // $( "#wrapper" ).css( "opacity", "0.5" );
	  });

	$("#subscribe_button").click(function(){
		/* var fname = $("#subscr_fname").val(); */
		/* var lname = $("#subscr_lname").val(); */
		var email = $("#subscr_email").val();
		if( email.length == 0 )
		{
			alert( "Please Provide Email Address To Subscribe." );
		}
		else if( validateEmail( email ) == false )
		{
			alert( "Please Enter Valid Email" );
		}
		else
		{
			var url = "subscription.php?subscr_email="+email+"&subscr_fname=''&subscr_lname=''";
			
			$.ajax({url:url,
				success:function(result){
				show_subscription_msg();
				/* $(".subscribe_msg_div").show();
				$("#wrapper").hide(); */
			}});
		}
		
		return false;
	});
  
	$("#subscription_back_button").click(function() {
		// hide the thank you for subscription box
		document.getElementById('subscribe_msg_div').style.display='none';
		document.getElementById('wrapper').style.display='block';
		$('#subscribe_msg_div').hide();
		$('#wrapper').show();
		$('#wrapper').css( "opacity", "1" );
		
		//clear all textboxes
		$('[name="subscr_fname"]').val('');
		$('[name="subscr_lname"]').val('');
		$('[name="subscr_email"]').val('email');
		return false;
	});
	
	// for displaying the on hover of images in collection
	$('.item').hover(function() {
		var item_block = $(this).parent();
		var desc = $(this).find('div.caption').text();
		var display_desc = item_block.find('div.display_desc');
		display_desc.text(desc);
	},
	function() {
		var item_block = $(this).parent();
		var display_desc = item_block.find('div.display_desc');
		display_desc.text("");
	});
	
	/* function shift_main_content()
	{
		$( "#main_content" ).css( "left", "0" );
	} */
  
});
 