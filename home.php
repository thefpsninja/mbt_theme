    <!-- Header -->
    <?php
        get_header();
?>
<div class="container p-4">
    <div class="d-flex">
        <div class="col-md-9 content">
        <!-- Posts Loop Start -->
            <?php if ( have_posts() ) : ?>
            <!-- Woop Woop, We haz posts -->
            <div class="card-group">
                <div class="row">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php get_template_part('template-parts/content' ,'excerpt'); ?>
                    <?php endwhile; ?>

                </div> <!-- /.row -->
            </div> <!-- /.card-group -->

            <!-- Pagination -->
            <?php get_template_part('template-parts/posts-pagination'); ?>
            <!-- Pagination End -->

            <?php else: ?>2
                <?php get_template_part('template-parts/content', 'none'); ?>
            <?php endif; ?>
        </div> <!-- /.col-md-9 content -->
            <!-- End Of Posts Loop -->

            <?php get_sidebar('primary-sidebar'); ?>

    </div> <!-- /.row -->
</div> <!-- /.container p-4 -->



    <!-- Footer -->
<?php
    get_footer();
?>