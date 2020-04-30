    <!-- Header -->
    <?php
    get_header();
?>
<div class="container">
    <!-- Posts Loop Start -->
    </ul>
    <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
            <li><?php the_author(); ?></li>
        <?php endwhile; ?>
        </ul>
    <?php endif; ?>
    <!-- End Of Posts Loop -->
</div>



    <!-- Footer -->
<?php
    get_footer();
?>