<div class="sidebar-right content-wrapper row">
	<div id="content-main" class="col-sm-8 pull-right">
		<?php do_action('sg_content_header'); ?>
		
		<?php 
			if(have_posts()){
				sg_get_template_part($sg_wrapper['content_base'], $sg_wrapper['content_layout']);
			}
			else{
				sg_get_template_part('framework/templates/content', 'no-result');
			}
		?>
		
		<?php do_action('sg_content_footer'); ?>		
	</div>
	<!-- content main -->
	<aside class="content-side col-sm-3 pull-left">
		<?php dynamic_sidebar('primary-sidebar'); ?>
	</aside>
	<!-- content side -->
</div>
<!-- row -->