<!-- This is a blog post -->
<article>
    <h1 class="text-center pt-3 pb-1 single-title"><?php the_title(); ?></h1>
    <?php if(has_post_thumbnail()) : ?>
    <div class="featured-image-wrapper">
        <?php the_post_thumbnail('featured-image', ['class' => 'img-fluid d-block mx-auto mb-3']); ?>
    </div>
    <?php endif; ?>
    <?php the_content(); ?>
</article>

<!-- Post Pagination -->

<?php get_template_part('template-parts/post-pagination'); ?>

<!-- Post Pagination End -->