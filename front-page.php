<div class="hero">
	<div class="row">
		<div class="col-sm-6">
			<?php 
				$user_report_page = sg_opt('user_report_page');
			?>
			<h1>Indonesia darurat hoax</h1>
			<p class="lead">Penyebaran berita hoax saat ini mengancam keutuhan negara kita. Mari jaga persatuan indonesia dengan menyebarkan berita yang benar</p>
			<p><a class="btn btn-lg btn-primary" href="<?php echo get_permalink($user_report_page) ?>">Laporkan Hoax</a></p>
		</div>
	</div>
	<!-- row -->
</div>
<!-- hero -->
<div class="section">
	<h3 class="section-title featured">Featured</h3>

	<?php 
		$args = array(
			'post_type' => 'post', 
			'posts_per_page' => 3,
			'tax_query' => array(
				array(
					'taxonomy' => 'category',
					'field'    => 'slug',
					'terms'    => 'featured',
				),
			),
		);

		$section_post = new WP_Query($args);
	?>

	<ul class="post-list row">
		<?php while ( $section_post->have_posts() ) : $section_post->the_post(); ?>
			<li <?php post_class('post-item col-md-4 col-sm-6'); ?>>
				<?php include('front/framework/templates/block-post-thumb.php') ?>
			</li>
		<?php endwhile; ?>
	</ul>
</div>
<!-- section -->
<div class="section">
	<h3 class="section-title">Terverifikasi</h3>
	<?php 
		$args = array(
			'post_type' => 'post', 
			'posts_per_page' => 4,
			'tax_query' => array(
				array(
					'taxonomy' => 'label',
					'field'    => 'slug',
					'terms'    => 'verified',
				),
			),
		);

		$section_post = new WP_Query($args);
	?>

	<ul class="post-list row">
		<?php while ( $section_post->have_posts() ) : $section_post->the_post(); ?>
			<li <?php post_class('post-item col-md-3 col-sm-6'); ?>>
				<?php include('front/framework/templates/block-post-thumb.php') ?>
			</li>
		<?php endwhile; ?>
	</ul>
</div>
<!-- section -->
<div class="section">
	<h3 class="section-title">Terbaru</h3>
	<?php 
		$args = array(
			'post_type' => 'post', 
			'posts_per_page' => 4,
			'post_status' => 'any',
		);

		$section_post = new WP_Query($args);
	?>

	<ul class="post-list row">
		<?php while ( $section_post->have_posts() ) : $section_post->the_post(); ?>
			<li <?php post_class('post-item col-md-3 col-sm-6'); ?>>
				<?php include('front/framework/templates/block-post-thumb.php') ?>
			</li>
		<?php endwhile; ?>
	</ul>
</div>
<!-- section -->