		<footer id="theme-footer">
			<?php 
				$footer_block_id = sg_opt('footer_template');

				if($footer_block_id){
					echo SG_CptBlock::render($footer_block_id);
				}
				else{
					include(sg_view_path('front/part-footer.php'));
				}	

			?>
		</footer>
		<!-- footer -->

	</div>
	<!-- theme-main -->

	<div id="theme-sidebar">
		<?php dynamic_sidebar('theme-sidebar'); ?>
	</div>
	<!-- theme-sidebar -->
</div>
<!-- content -->

<?php wp_footer(); ?>

</body>
</html>