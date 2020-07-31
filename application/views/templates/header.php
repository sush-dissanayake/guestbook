<html>
        <head>
                <title>Guestbook</title>
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
                <script type="text/javascript" src="<?=base_url()?>assets/js/addmessage.js" ></script>

                <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v7.0&appId=216388299672214&autoLogAppEvents=1" nonce="B9dxM71C"></script>
                <script>
                        window.setInterval(function(){
                                getNewMessages();
                        }, 60000)
                        $('html, body').animate({
			        scrollTop: $("#msgData").offset().top
                        }, 500);
                
                function getNewMessages(){
                        $.post( "<?php echo base_url('messages/listMessages/'); ?>", function( data ){
                                $('#msgData').html(data);
                        });
                }
                </script>         

        </head>
	