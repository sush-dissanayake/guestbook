
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