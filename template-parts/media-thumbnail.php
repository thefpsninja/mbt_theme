<!-- This is the thumbnail -->
<?php if(has_post_thumbnail() ) : ?>
        <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('post-thumbnail', ['class' => 'card-img-top img-fluid']); ?>
        </a>
<?php endif; ?>