<?php if ( !empty($post->post_password) && $_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) : ?>
<p><?php _e('Enter your password to view comments.'); ?></p>
<?php return; endif; ?>


<h4><?php comments_number(__('No Comments'), __('1 Comment'), __('% Comments')); ?></h4>

<!-- Start Comments Layout. --> 
<div class="comments-wrap">
<?php if ( $comments ) : ?>
<div id="commentlist">
<?php foreach ($comments as $comment) : ?>
<?php $admin_email = get_bloginfo('admin_email'); $isByAuthor = false; if($comment->comment_author_email == $admin_email) { $isByAuthor = true; } ?>
<div class="<?php if($isByAuthor == true ) { echo 'comment-author';}?><?php if($isByAuthor == false ) { echo 'comment-visitor';} ?>">
<div class="gravatar"><?php echo get_avatar( $comment, 40 ); ?></div>	
<div class="commenthead"><?php comment_author_link() ?>  commented on <?php comment_date() ?>, <a href="#comment-<?php comment_ID() ?>"><?php comment_time() ?></a> <?php edit_comment_link('Edit &raquo;', '&oslash; ', ''); ?></div>
	<?php comment_text() ?>
</div>
<?php endforeach; ?>
</div>
</div>
<!-- End Comments Layout. --> 


<!-- Start No Comments -->
<?php else : // If there are no comments yet ?>
	<p><?php _e('No comments yet.'); ?></p>
</div>

<?php endif; ?>
<!-- End No Comments -->


<!-- Start Comment RSS -->
<div class="centerize"><p><?php comments_rss_link(__('<abbr title="Really Simple Syndication">RSS</abbr> feed for comments on this post.')); ?> 
<?php if ( pings_open() ) : ?>
	<a href="<?php trackback_url() ?>" rel="trackback"><?php _e('TrackBack <abbr title="Uniform Resource Identifier">URI</abbr>'); ?></a>
<?php endif; ?>
</p></div>
<!-- End Comment RSS -->


<?php if ( comments_open() ) : ?>
<h4 id="postcomment"><?php _e('Leave a comment'); ?></h4>
<small>
Please quote people/<a href="http://www.tutorialtastic.co.uk/converter.php">code</a> with &lt;blockquote&gt; and use <a href="http://tinyurl.com/">TinyURL!</a> for links. 
You are allowed to use &lt;strong&gt;, &lt;em&gt;, and &lt;abbr&gt;. Would you like your own picture to show up by your comment? Get yourself a <a href="http://en.gravatar.com/">Gravatar</a>!
</small>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">logged in</a> to post a comment.</p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
<?php if ( $user_ID ) : ?>
<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Logout &raquo;</a></p>
<?php else : ?>

<!--Start Comment Form-->
<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />&nbsp; 
<label for="author"><small>Name <?php if ($req) _e('(required)'); ?></small></label></p>

<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />&nbsp;
<label for="email"><small>Mail (will not be published) <?php if ($req) _e('(required)'); ?></small></label></p>

<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />&nbsp;
<label for="url"><small>Website</small></label></p><?php endif; ?>

<p><?php if ( function_exists(cs_print_smilies) ) {cs_print_smilies();} ?>
<br /><textarea name="comment" id="comment" cols="60" rows="10" tabindex="4"></textarea></p>

<p><input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" />
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" /> 

<?php do_action('comment_form', $post->ID); ?></p>
</form>
<!--End Comment Form-->

<?php endif; // If registration required and not logged in ?>
<?php endif; ?>