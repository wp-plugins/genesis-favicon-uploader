<?php get_header(); ?>  

<div class="content hfeed" id="content">
<?php if ( function_exists('yoast_breadcrumb') ) {
	yoast_breadcrumb('<p id="breadcrumbs">','</p>');
} ?>

<h1 class="page-title">Search Result for 
	<?php
	$allsearch = &new WP_Query("s=$s&showposts=-1"); 
	$key = esc_html($s, 1); 
	$count = $allsearch->post_count; _e(''); 
	
	printf('<span class="search-terms">"%s"</span> - %d articles', $key, $count );
	?>
</h1>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
		<span class="cat-name"><?php echo wds_cat_name(); ?></span>
		<h2 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
		<?php wds_byline() ?>
		
		<div class="entry">
			<?php the_excerpt(); ?>
			<?php		
			if(get_the_tag_list() || get_the_tag_list()) { ?>
			<div class="post-meta">
<?php		
				if(get_the_tag_list()) {
					echo get_the_tag_list('Tags: ',', ','');
				}		
				if(get_the_tag_list()) {
					echo " Categories: ";
					the_category(', ');
				}		
?>
			</div>
			<?php } ?>
			
		</div>
		
	</div> 
	
	<?php endwhile; else: ?>
	
		<p>Sorry, no posts matched your criteria.</p>
		
<?php endif; ?>
  <?php wds_pagination(); ?>

</div><!-- div#content end -->
<?php get_footer(); ?>  