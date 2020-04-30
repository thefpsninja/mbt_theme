<?php /* Template Name: No Sidebar */ ?>

    <!-- Header -->
    <?php
    get_header();
?>
<div class="container">


    <h4 style="color: red;">index.php</h4>
    <div class="row">
    <div class="col-md-9 content">
    <!-- Posts Loop Start -->
    <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
            <!-- This is a post -->
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        
            <?php the_post_thumbnail([200, 0]); ?>

            <?php the_excerpt(); ?>

            <span><?php __('Post create by:', 'my-basic-theme') ?> "<?php the_author(); ?>" <?php __('at', 'my-basic-theme') ?> <?php the_date(); ?></span>
            <div><?php the_category(); ?></div>
        <?php endwhile; ?>
    <?php endif; ?>
    </div>
    <!-- End Of Posts Loop -->
    </div>
</div>



    <!-- Footer -->
<?php
    get_footer();
?>