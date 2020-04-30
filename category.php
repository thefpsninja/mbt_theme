    <!-- Header -->
    <?php
    get_header();
    ?>

<div class="container">
    <h4 style="color: red;">category.php</h4>

    <div class="d-flex">
        <div class="col-md-9 content">
        


    <!-- Posts Loop Start -->
    <?php if ( have_posts() ) : ?>
        <div class="row">
        <?php while ( have_posts() ) : the_post(); ?>
            <!-- This is a post -->
                <div class="col-md-6">
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <?php get_template_part('template-parts/media', 'thumbnail'); ?>
                    <?php the_excerpt(); ?>
                    <span><?php __('Post create by:', 'my-basic-theme') ?> "<?php the_author(); ?>" <?php __('at', 'my-basic-theme') ?> <?php the_date(); ?></span>
                    <div>
                        <?php the_category(); ?>
                    </div>
                </div> <!-- /.col-md-6 -->

            <?php endwhile; ?>
            </div> <!-- End of posts row -->
    <?php endif; ?>
        </div>
    <!-- End Of Posts Loop -->
    <?php get_sidebar(); ?> <!-- Sidebar -->
    </div>
</div>



    <!-- Footer -->
<?php
    get_footer();
?>