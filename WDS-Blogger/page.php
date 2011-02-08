<?php get_header(); ?>  

<div class="content hfeed" id="content">
<?php if ( function_exists('yoast_breadcrumb') ) {
	yoast_breadcrumb('<p id="breadcrumbs">','</p>');
} ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
		<h1 class="post-title"><?php the_title(); ?></h1>
		
		<div class="entry">
			<?php the_content(); ?>
			
			<?php wp_link_pages('before=<div id="page-links">&after=</div>'); ?>
			
		</div>
		
		<?php comments_template(); ?>
	
	</div> 
	
	<?php endwhile; else: ?>
	
		<p>Sorry, no posts matched your criteria.</p>
		
<?php endif; ?>
</div><!-- div#content end -->
<?php get_footer(); ?>  