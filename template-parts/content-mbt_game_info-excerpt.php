<!-- This is a Game Info Excerpt -->
<div class="col-lg-6 mb-4">
	<div class="card">
		<?php if (has_post_thumbnail()) : ?>
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail('post-thumbnail', ['class' => 'card-img-top img-fluid']); ?>
			</a>
		<?php endif; ?>
		<div class="card-body">
			<h5 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>

			<small class="text-muted">
				<?php
					printf(
						__('Game info added by %s on %s', 'my-basic-theme'),
						get_the_author(),
						get_the_date()
					);
				?>
			</small>

			<div class="card-text">
				<?php the_excerpt(); ?>
			</div>
		</div><!-- /.card-body -->
		<div class="card-footer">
			<small class="text-muted">
				<p>
                <?php the_terms(get_the_ID(), 'game_developer', __('Developers: ', 'my-basic-theme') ); ?>
				</p>
				<p>
                <?php 
                the_terms(get_the_ID(), 'game_genre', __('Genres: ', 'my-basic-theme') );
                ?>
				</p>
			</small>
		</div><!-- /.card-footer -->
	</div><!-- /.card -->
</div><!-- /.col -->
<!-- End of Game Info Excerpt -->