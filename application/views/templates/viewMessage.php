    <body>

    <div class="container">
        <?php if(!empty($message)) {?>

            <h6>Guest Book Message by <?php echo $message->name; ?></h6>

            <p><?php echo $message->message; ?></p>

        <?php } ?>

    </div>


    </body>
</html>