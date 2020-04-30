<?php
get_header();
?>

<main class="container">
	<h1 class="text-center pt-3 pb-2 title"><?php echo get_the_archive_title(); ?></h1>

	<div class="d-flex">
		<div class="col-md-9 content">
			<!-- Do we have Game posts? -->
			<?php if (have_posts()) : ?>

				<div class="card-group">
					<div class="row">
						<?php while (have_posts()) : the_post(); ?>
							<?php get_template_part('template-parts/content-mbt_game_info', 'excerpt'); ?>
						<?php endwhile; ?>
					</div><!-- /.row -->
				</div><!-- /.card-group -->

				<!-- pagination -->
				<?php get_template_part('template-parts/posts-pagination'); ?>
				<!-- /pagination -->
			<?php else: ?>
				<?php get_template_part('template-parts/content', 'none'); // template-parts/content-none.php ?>
			<?php endif; ?>
			<!-- End of posts -->
		</div><!-- /.col-md-9 -->

		<?php get_sidebar('movie-review'); ?>
	</div><!-- /.row -->
</main><!-- /.container -->

<?php
get_footer();