<?php 
    // Get the 3 latest blog posts, regardless of category
    $latest_posts_query = new WP_Query([
        'post_type'         =>  'post',
        'posts_per_page'    =>  3,  
        'post__not_in'      =>  [($post->ID)],  
    ]);
    if ($latest_posts_query->have_posts())  {
        ?>
            <h2><?php __('Latest posts') ?></h2>
            <div class="card-group">
                    <?php while ($latest_posts_query->have_posts()) {
                        $latest_posts_query->the_post();
                        get_template_part('template-parts/content', 'excerpt');
                    } ?>
            </div>  <!-- /.card-group -->
            <?php wp_reset_postdata(); 
    } 
    // Create a new card-group for each blog post and then call the content-excerpt on render
    ?>