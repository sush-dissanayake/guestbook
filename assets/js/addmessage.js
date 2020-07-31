$(document).ready(function() {
    $('#submitMsg').on('click', function() {

		$('html, body').animate({
			scrollTop: $("#warning").offset().top
		}, 500);
        
        var name = $('#name').val();
		var email = $('#email').val();
        var message = $('#message').val();
        

		if(!name && !email && !message) {
			$("#success").hide();
			$("#warning").show();
            $('#warning').html('Please fill name, email and message');

        } else{

			if(validateFields(name, email, message)) {

				$.ajax({
					url: "http://mysite.local.com/guestbook/Messages/saveMessage",
					type: "POST",
					data: {
						name: name,
						email: email,
						message: message
					},
					cache: false,
					success: function(dataResult){
						var dataResult = JSON.parse(dataResult);
						if(dataResult.statusCode==200){
							$("#warning").hide();
							$('#name').val('');
							$('#email').val('');
							$('#message').val('');
							$("#success").show();
							$('#success').html('Data added successfully !'); 						
						}
						else if(dataResult.statusCode==500){
							$("#success").hide();
							$("#warning").show();
							$('#warning').html('Invalid data provided');
						}
						else if(dataResult.statusCode==400){
							$("#success").hide();
							$("#warning").show();
							$('#warning').html('An error occured');
						}
						
					}
				});

			}
        }
        
	});
});

function validateFields(name, email, message) {

	$("#success").hide();
	if(!name && !email && !message) {
		$("#warning").show();
		$('#warning').html('Please fill name, email and message');
		return false;
	} 
	else{

		if(validatelength(name, 3) != true) {
			$("#warning").show();
			$('#warning').html('Name should be more than 3 characters');
			return false;		
		}

		if(!validEmail(email)) {
			$("#warning").show();
			$('#warning').html('Valid email should be provided');
			return false;		
		}

		if(validatelength(message, 5) != true) {
			$("#warning").show();
			$('#warning').html('Message should be more than 5 characters');
			return false;	
		}

	}
	return true;	
}

function validEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
};

function validatelength(value, length) {
	if (value.length > length) {
	  return true;
	}
}