<?php
/* Template Name: SiteMap */

get_header(); ?>

<div class="content hfeed" id="content">
<?php if ( function_exists('yoast_breadcrumb') ) {
	yoast_breadcrumb('<p id="breadcrumbs">','</p>');
} ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<div id="sitemap" <?php post_class(); ?>>
	
				<div class="left">

					<h4><?php _e("Pages:", 'wds'); ?></h4>
					<ul>
						<?php wp_list_pages('title_li='); ?>
					</ul>

					<h4><?php _e("Categories:", 'wds'); ?></h4>
					<ul>
						<?php wp_list_categories('sort_column=name&title_li='); ?>
					</ul>

					<h4><?php _e("Authors:", 'wds'); ?></h4>
					<ul>
						<?php wp_list_authors('exclude_admin=0&optioncount=1'); ?>   
					</ul>

					<h4><?php _e("Monthly:", 'wds'); ?></h4>
					<ul>
						<?php wp_get_archives('type=monthly'); ?>
					</ul>

				</div>

				<div class="right">

					<h4><?php _e("Recent Posts:", 'wds'); ?></h4>
					<ul>
						<?php wp_get_archives('type=postbypost&limit=100'); ?> 
					</ul>  
					
				</div>
		
	</div> 
	
	<?php endwhile; else: ?>
	
		<p>Sorry, no posts matched your criteria.</p>
		
<?php endif; ?>
</div><!-- div#content end -->
<?php get_footer(); ?>  