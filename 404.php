<?php get_header(); ?>
<div class="container">
    <div class="row">
        <div class="col-m-9 content">
        <h1><?php __('There is no post?', 'my-basic-theme') ?></h1>
         <?php get_template_part('template-parts/content', 'none'); ?>
        </div>
        <?php get_sidebar(); ?>
    </div> <!-- /.row -->
</div> <!-- /.container -->

<?php get_footer(); ?>