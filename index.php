    <!-- Header -->
    <?php
    get_header();
?>
<div class="container">
    <!-- Posts Loop Start -->
    <?php if ( have_posts() ) : ?>
    
        <?php while ( have_posts() ) : the_post(); ?>
            <?php get_template_part('template-parts/content', 'single'); ?>
        <?php endwhile; ?>
        <?php else : ?>
            <?php get_template_part('template-parts/content', 'none'); ?>
    <?php endif; ?>
    <!-- End Of Posts Loop -->
</div>



    <!-- Footer -->
<?php
    get_footer();
?>