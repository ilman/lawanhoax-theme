<div class="post-full">

	<?php 
		if(method_exists('SG_PopularPosts','set_post_views')){
			SG_PopularPosts::set_post_views(get_the_ID());
		}

		$permalink = urlencode(get_the_permalink());

		$share_buttons = '<a class="btn js-window-open btn-facebook" target="_blank" title="Share to facebook" href="https://www.facebook.com/sharer/sharer.php?u='.$permalink.'"><i class="fa fa-facebook"></i></a>
		<a class="btn js-window-open btn-twitter" target="_blank" title="Share to twitter" href="https://twitter.com/home?status='.$permalink.'"><i class="fa fa-twitter"></i></a>
		<a class="btn js-window-open btn-google-plus" target="_blank" title="Share to google plus" href="https://plus.google.com/share?url='.$permalink.'"><i class="fa fa-google-plus"></i></a>
		<a class="btn js-window-open btn-pinterest" target="_blank" title="share to pinterest" href="https://pinterest.com/pin/create/button/?url='.$permalink.'"><i class="fa fa-pinterest"></i></a>
		<span>Share this article</span>';
	?>

	<?php 
		$post_label = sg_get_post_terms(get_the_ID(),'label', 1, '<a class="post-label %3$s" href="%s">%s</a>');
		echo ($post_label) ? '<h2>'.$post_label.'</h2>' : '<h2><a class="post-label" href="%s">unverified</a></h2>';
	?>
	<h1 class="post-title"><a href="<?php the_permalink() ?>"><?php echo get_the_title(); ?></a></h1>
	<p class="post-meta">
		<span class="post-author">
			<?php echo get_avatar(get_the_author_meta('ID'), 32 ); ?> 
			<?php echo sg_get_post_author() ?>
		</span>
		<span class="post-date"><?php echo sg_get_post_date() ?></span>
		<span class="post-cat"><?php echo sg_get_post_category() ?></span>
	</p>
	<div class="source-url">
		<h5>Sumber: </h5>
		<ul>
			<?php 
				foreach(sg_get_post_meta( get_the_ID(), 'source_url', false) as $source_url){
					echo '<li>'.esc_url($source_url).'</li>';
				} 
			?>
		</ul>
	</div>

	<div class="post-shares">
		<?php echo $share_buttons; ?>
	</div>
	<!-- post-shares -->

	<div class="row">
		<div class="col-sm-12">

			<?php $post_thumb = sg_get_post_thumbnail('full'); ?>

			<?php if($post_thumb): ?>
				<div class="post-thumb">
					<?php echo ($post_thumb) ? $post_thumb : '<img src="http://placehold.it/400x250" alt="image" />' ?>
				</div>
				<!-- post-thumb -->
			<?php endif; ?>

			<div class="post-body">
				<?php 
					echo wpautop(get_the_excerpt());
				?>
			</div>
			<!-- post-body -->

			<div class="section">
				<h4 class="meta-title">Klarifikasi</h4>
				<?php 
					the_content();
				?>
			</div>

			<div class="section">
				<h4 class="meta-title">Kata Kunci</h4>
				<?php 
					echo sg_get_post_terms(get_the_ID(),'post_tag', 5, '<a href="%s">%s</a>, ');
				?>
			</div>

			<div class="section">
				<h4 class="meta-title">Tokoh Terkait</h4>
				<?php 
					echo sg_get_post_terms(get_the_ID(),'figure', 5, '<a href="%s">%s</a>, ');
				?>
			</div>

			<div class="post-shares small">
				<?php echo $share_buttons; ?>
			</div>
			<!-- post-shares -->

			<?php 
				comments_template();
			?>
			
		</div>
		<!-- col -->

	</div>
	<!-- row -->


</div>
<!-- post-full -->