<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a href="<?php echo get_home_url(); ?>" class="navbar-brand">
        <?php mbt_the_custom_logo(); ?>
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle Navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <?php 
            if(has_nav_menu('main-menu')) {
                wp_nav_menu([
                    'theme_location'    => 'main-menu',
                    'container_class'   => 'collapse navbar-collapse',  // Wrapping div class
                    'container_id'      => 'navbarNav',                 // Wrapping div id
                    'menu_class'        => 'navbar-nav ml-auto',        // Ul class
                    'walker'            =>  new bs4Navwalker(),
                ]);
            }
        ?>
    </div>
</nav>