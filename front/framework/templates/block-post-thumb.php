<?php 
	$block_thumb_class = (isset($block_thumb_class)) ? $block_thumb_class : 'full';
	$block_thumb = sg_get_post_thumbnail('post-thumb');
	$block_thumb = ($block_thumb) ? $block_thumb : '<img src="http://placehold.it/400x250" alt="image" />';
	$block_class = ($block_thumb) ? 'post-block' : 'post-block text-only'
?>

<div class="<?php echo $block_class ?>">
	<?php if($block_thumb): ?>
		<div class="post-thumb <?php echo $block_thumb_class ?>">
			<?php echo $block_thumb; ?>
			<?php 
				$post_label = sg_get_post_terms(null, 'label', 1, '<a class="post-label %3$s" href="%s">%s</a>');
				echo ($post_label) ? $post_label : '<a class="post-label" href="%s">unverified</a>';
			?>
		</div>
	<?php endif; ?>
	<div class="post-body">
		<h4 class="post-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
		<p class="source-url"><?php echo parse_url(sg_get_post_meta( get_the_ID(), 'source_url', true), PHP_URL_HOST) ?></p>
		<div class="post-meta post-tags">
			<?php echo sg_get_post_tags(null, 5); ?>
		</div>
	</div>
	<?php echo sg_action_post_link() ?>
</div>