<?php

if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');

if ( post_password_required() ) { ?>
	<p class="alert">This post is password protected. Enter the password to view comments.</p>
<?php
	return;
}
?>

		<p class="postmetadata">
			<small>
	
				You can follow any responses to this entry through the <?php post_comments_feed_link('RSS 2.0'); ?> feed.

				<?php if ( comments_open() && pings_open() ) {
					// Both Comments and Pings are open ?>
					You can <a href="#respond">leave a response</a>, or <a href="<?php trackback_url(); ?>" rel="trackback">trackback</a> from your own site.

				<?php } elseif ( !comments_open() && pings_open() ) {
					// Only Pings are Open ?>
					Responses are currently closed, but you can <a href="<?php trackback_url(); ?> " rel="trackback">trackback</a> from your own site.

				<?php } elseif ( comments_open() && !pings_open() ) {
					// Comments are open, Pings are not ?>
					You can skip to the end and leave a response. Pinging is currently not allowed.

				<?php } elseif ( !comments_open() && !pings_open() ) {
					// Neither Comments, nor Pings are open ?>
					Both comments and pings are currently closed.

				<?php } edit_post_link('Edit this entry','','.'); ?>

			</small>
		</p>
		
		<?php $comment_count = separate_comment_count( $id ); ?>
		<?php if ( $comment_count ) { ?>
		<h3 id="comments-title">Comments</h3>
		<ol class="commentlist">
		<?php	$args = array(
		'type' => 'comment',
		'avatar_size' => 48
		);
		wp_list_comments( $args );
		paginate_comments_links( $args );?>
		</ol>
		<?php }
		$comment_count = separate_comment_count( $id, 'pings'); ?>
		<?php if ( $comment_count ) { ?>
		<h3 id="comments-title"> Trackbacks </h3>
		<ol class="pinglist">
		<?php	$args = array(
		'type' => 'pings'
		);
		wp_list_comments( $args ); 
		paginate_comments_links( $args ); ?>
		</ol>
		<?php } ?>
		
	<?php 
	$args = array( 'title_reply' => 'Leave a Comment' );
	comment_form( $args ); 
	?>