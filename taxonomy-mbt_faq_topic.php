<?php 
get_header();
?>



<main class="container p-2">
<h2>
    <?php _e('Frequently Asked Questions: ', 'my-basic-theme');

        $terms = get_the_terms($post->ID , 'mbt_faq_topic');
            foreach($terms as $term) :
                echo '<b>' . $termName = $term->name . '</b>';
            endforeach;

    ?>
</h2>
<!-- Do we have FAQ posts? -->
    <?php if(have_posts()) : ?>

    <div class="accordion" id="accordionFAQ">
        <?php while(have_posts()) : the_post(); ?>

        <!-- Accordion of FAQ's -->
        <?php get_template_part('template-parts/accordion-faq'); ?>
        <!-- End of Accordion -->

        <?php endwhile; ?>
    </div><!-- End of Accordion -->
    <?php else: get_template_part('template-parts/content', 'none');?>
    <?php endif; ?>
</main> <!-- End of Container -->

<?php 
get_footer();
?>