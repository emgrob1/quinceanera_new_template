
jQuery(document).ready(function() {
    jQuery('.toggle-nav').click(function(e) {
        jQuery(this).toggleClass('active');
        jQuery('.menu ul').toggleClass('active');
 
        e.preventDefault();
    });
});

function myFunction() {
	var e = document.getElementById('attendingRSPV');
	var strUser = e.options[e.selectedIndex].text;
	var guest = document.getElementById('guest_num');
	var guest_num = document.getElementById('guest');
	if (strUser == 'Nao') {
		guest_num.value = 0;
		guest.style.visibility = "hidden";

	} else {
		guest.style.visibility = "visible";
	}
}


$(document).ready(function() {

	//Set mask for phone number field
//	$("#txtPhoneNumber").mask("(999) 999-9999");

	//Store numbers in hidden field
	$("#txtPhoneNumber").blur(function() {

		//Clear the hidden field
		$("#txtHiddenPhoneNumber").val("");

		//Create char array from phone number field
		var charArray = $(this).val().split("");

		var phoneNumber = "";

		//Iterate over each character in the char array
		//and determine if it is a number
		$.each(charArray, function(index, value) {
			if (!isNaN(value) && value != " ") {
				phoneNumber = phoneNumber + value;
			}
		});

		//Set hidden field
		$("#txtHiddenPhoneNumber").val(phoneNumber);
	});

	$("#btnSubmit").click(function() {
		//If valid, show hidden field contents so we can
		//confirm that it is indeed just saving the number
		if ($("#form1").valid()) {
			alert("Value in hidden field: " + $("#txtHiddenPhoneNumber").val());
		}
	});
	
	
	var nav = $('#adbox div.highlight');
	var banner = $('div.info');
	var pos = nav.position();
		
	$('window').scroll(function(){
		var windowspos = $('window').scrollTop();
		
		if (windowpos >= banner.outerHeight())
	{
		nav.addClass('sticky');
	}
	else
	{
		nav.removeClass('sticky');
	}
	});
	
}); 
