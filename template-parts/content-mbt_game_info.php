<!-- Some Game Info -->
<article>
    <h1 class="text-center pt-3 pb-1 single-title"><?php the_title(); ?></h1>

    <?php if(has_post_thumbnail()) : ?>
        <div class="featured-image-wrapper">
            <?php the_post_thumbnail('featured-image', ['class' => 'img-fluid d-block mx-auto mb-3']); ?>
        </div>
    <?php endif; ?>

    <?php the_content(); ?>

    <p class="text-muted pt-3 pl-3">
        <em>
            <?php
                printf(
                    __('Game info added by %s on %s', 'my-basic-theme'),
                    get_the_author(),
                    get_the_date()
                );
            ?>
        </em>
    </p>

    <div class="movie-metadata-wrapper">
        <p class="text-muted pl-3">
            <?php the_terms(get_the_ID(), 'game_developer', __('Developers: ', 'my-basic-theme') ); ?>
        </p>

        <p class="text-muted pl-3">
            <?php 
                the_terms(get_the_ID(), 'game_genre', __('Genres: ', 'my-basic-theme') );
            ?>
        </p>
    </div>




</article>

<!-- Post Pagination -->

<?php get_template_part('template-parts/post-pagination'); ?>

<!-- Post Pagination End -->