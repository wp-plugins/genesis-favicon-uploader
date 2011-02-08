<?php get_header(); ?>  

<div class="content hfeed" id="content">
<?php if ( function_exists('yoast_breadcrumb') ) {
	yoast_breadcrumb('<p id="breadcrumbs">','</p>');
} ?>

<h1 class="page-title">
<?php if ( is_day() ) : ?>
				<?php printf( __( 'Daily Archives: <span>%s</span>', 'wds' ), get_the_date() ); ?>
<?php elseif ( is_month() ) : ?>
				<?php printf( __( 'Monthly Archives: <span>%s</span>', 'wds' ), get_the_date('F Y') ); ?>
<?php elseif ( is_year() ) : ?>
				<?php printf( __( 'Yearly Archives: <span>%s</span>', 'wds' ), get_the_date('Y') ); ?>
<?php else : ?>
				<?php _e( 'Blog Archives', 'wds' ); ?>
<?php endif; ?>
</h1>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
		<span class="cat-name"><?php echo wds_cat_name(); ?></span>
		<h2 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
		<?php wds_byline() ?>
		
		<div class="entry">
		<?php the_excerpt(); ?>
		</div>
		
	</div> 
	
	<?php endwhile; else: ?>
	
		<p>Sorry, no posts matched your criteria.</p>
		
<?php endif; ?>

    <?php wds_pagination(); ?>
</div><!-- div#content end -->
<?php get_footer(); ?>  