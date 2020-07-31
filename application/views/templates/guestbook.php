
    <body>

    <div id="fb-root"></div>
      
      <div class="container">

        <div>

          <h1>Guest Book</h1>

          <p>Please enter your name, email and message:</p>

          <div class="alert alert-success alert-dismissible" id="success" style="display:none;">
          </div>

          <div class="alert alert-warning alert-dismissible" id="warning" style="display:none;">
          </div>

          <div class="form-group">
              <label>Name</label>
              <input type="text" minlength="4" class="form-control" name="name" id="name" placeholder="Enter name" >
          </div>

          <div class="form-group">
              <label>Email</label>
              <input type="email" maxlength="30" class="form-control" name="email" id="email" placeholder="Enter email" >
          </div>

          <div class="form-group">
              <label>Message</label>
              <textarea class="form-control" rows="6" cols="40" name="message" minlength="4" id="message" type="text" placeholder="Enter message" ></textarea>
          </div>

          <div align="right">
            <input class="btn btn-warning"  id="submitMsg" type="submit" value="Leave message">
          </div>

        </div>

        <div>

          <h3>Messages</h3>

          <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="msgData">

                <?php if(!empty($entries)){ foreach($entries as $entry){ ?>
                <tr>
                    <td><?php echo $entry['name']; ?></td>
                    <td><?php echo $entry['email']; ?></td>
                    <td><?php echo $entry['message']; ?></td>
                    <td>
                        <div class="fb-share-button" data-href="https://mysite.local.com/guestbook/messages/viewMessage/<?php echo $entry['id']; ?>" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fmysite.local.com%2Fguestbook%2Fmessages%2FviewMessage%2F<?php echo $entry['id']; ?>&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
                        
                    </td>
                </tr>
                <?php } }else{ ?>
                <tr><td colspan="7">No message(s) found...</td></tr>
                <?php } ?>
            </tbody>
          </table>

        </div>
      </div>  

  </body>
</html>