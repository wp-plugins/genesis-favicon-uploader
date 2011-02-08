 <?php
/*
Template Name: Blog
*/
?>
<?php get_header(); ?>  

<div class="content hfeed" id="content">
<?php if ( function_exists('yoast_breadcrumb') ) {
	yoast_breadcrumb('<p id="breadcrumbs">','</p>');
} ?>
<?php
	global $paged;
	$args = array(
		'paged' => $paged
	);
	$wp_query = new WP_Query( $args );
 	if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post();
 ?>

<?php 
$hasimg_class = "";
$has_p_img = has_post_thumbnail(); 
if($has_p_img) $hasimg_class = "has-thumb";
?>
<div id="post-<?php the_ID(); ?>" <?php post_class('blog '. $hasimg_class); ?>>

	<?php if($has_p_img) { ?>
	<a href="<?php the_permalink(); ?>" title="Click to read: &quot;<?php the_title(); ?>&quot;">		
		<?php the_post_thumbnail('post-thumb'); ?>
	</a>
	<?php } ?>
	
	<div class="post-text">
	
		<span class="cat-name"><?php echo wds_cat_name(); ?></span>
		<h2 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Click to read: &quot;<?php the_title(); ?>&quot;"><?php the_title(); ?></a></h2>
		<?php wds_byline() ?>
		
		<div class="entry">
			<?php the_excerpt(); ?>
			
			<div class="commore-links">
				<span class="comment-link"><a href="<?php comments_link(); ?>"><?php comments_number(); ?></a></span>
				<span class="readmore"><a href="<?php the_permalink();?>">read more</a></span>
			</div>	
		</div>
		
	</div>
</div> 
<?php endwhile; else: ?>

	<p>Sorry, no posts matched your criteria.</p>
	
<?php endif; ?>


    <?php wds_pagination(); ?>
</div><!-- div#content end -->
<?php get_footer(); ?>  