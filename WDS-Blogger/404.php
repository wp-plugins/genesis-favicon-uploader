<?php get_header(); ?>
<div class="content hfeed" id="content">
			<h1 class="entry-title"><?php _e('Not Found - Error 404', 'wds'); ?></h1>
			<div class="entry-content">
				<p><?php printf(__('Apologies, but the page you requested could not be found.', 'wds')); ?>
				<?php printf(__('Below are some tips that may help you find what you were looking for.', 'wds')); ?></p>
				<ol>
					<li><?php printf(__('Perhaps you can return back to the site\'s <a href="%s">homepage</a> and see if you can find what you are looking for.', 'wds'), home_url() ); ?></li>
					<li><?php printf(__('Try searching for it with the searchform in the header.', 'wds')); ?></li>
					<li><?php printf(__('Or, you can try finding it with the information below.', 'wds')); ?></li>
			</div>

	<div id="sitemap">
	
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
</div>
<?php get_footer(); ?>