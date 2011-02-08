<?php if ( ! is_active_sidebar( 'sidebar-fl' )
        && ! is_active_sidebar( 'sidebar-fml' )
	    && ! is_active_sidebar( 'sidebar-fmr'  )
        && ! is_active_sidebar( 'sidebar-fr' )
       	)    		
       	return; 
?> 		

		<div id="footer-widgetized">
			<div class="wrap">
			
			<?php if ( is_active_sidebar( 'sidebar-fl' ) ) : ?>
			
				<div id="footer-col1" class="col">
					<?php dynamic_sidebar( 'sidebar-fl' ); ?>
				</div><!-- end #footer-col1 -->
				
			<?php endif; ?>
			
			<?php if ( is_active_sidebar( 'sidebar-fml' ) ) : ?>
			
				<div id="footer-col2" class="col">
					<?php dynamic_sidebar( 'sidebar-fml' ); ?>
				</div><!-- end #footer-col2 -->
				
			<?php endif; ?>
			<?php if ( is_active_sidebar( 'sidebar-fmr' ) ) : ?>
			
				<div id="footer-col3" class="col">
					<?php dynamic_sidebar( 'sidebar-fmr' ); ?>
				</div><!-- end #footer-col3 -->
				
			<?php endif; ?>
			<?php if ( is_active_sidebar( 'sidebar-fr' ) ) : ?>
			
				<div id="footer-col4" class="col">
					<?php dynamic_sidebar('sidebar-fr'); ?>
				</div><!-- end #footer-col4 -->
				
			<?php endif; ?>

			</div><!-- end .wrap -->
		</div><!-- end #footer-widgetized -->
