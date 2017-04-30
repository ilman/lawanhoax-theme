<form action="<?php echo site_url() ?>">
	<div class="input-group">
		<input type="text" class="form-control input-search" name="s" placeholder="Search" value="<?php the_search_query(); ?>">
		<span class="input-group-btn">
			<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
		</span>
	</div>
</form>