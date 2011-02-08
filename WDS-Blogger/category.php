<?php get_header(); ?>  

<div class="content hfeed" id="content">
<?php if ( function_exists('yoast_breadcrumb') ) {
	yoast_breadcrumb('<p id="breadcrumbs">','</p>');
} ?>

	<h1 class="category-title"><span>Category:</span> <?php single_cat_title() ?></h1>
	<?php if ( category_description() ) { ?>
		<p class="description"><?php echo category_description() ?></p>
	<?php } ?>
	
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<?php 
		$hasimg_class = "";
		$has_p_img = has_post_thumbnail(); 
		if($has_p_img) $hasimg_class = "has-thumb";
	?>

	<div id="post-<?php the_ID(); ?>" <?php post_class($hasimg_class); ?>>
		
		<?php if($has_p_img) { ?>
			<a href="<?php the_permalink(); ?>" title="Click to read: &quot;<?php the_title(); ?>&quot;">			
				<?php the_post_thumbnail('archive-post-thumb'); ?>
			</a>
		<?php } ?>
		<div class="post-text">
		<h2 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
		<?php wds_byline() ?>
		
		<div class="entry">
		<?php the_excerpt(); ?>
		</div>
		</div>
		
	</div> 
	
	<?php endwhile; else: ?>
	
		<p>Sorry, no posts matched your criteria.</p>
		
<?php endif; ?>
  <?php wds_pagination(); ?>
</div><!-- div#content end -->
<?php get_footer(); ?>  