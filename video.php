<?php
get_header(); ?>

<main id="content" tabindex="-1" role="main">

    <h1><?php the_title(); ?></h1>
    <?php
        if ( have_posts() ) :
            while ( have_posts() ) : the_post();

                get_template_part( 'content', get_post_format() );

            endwhile;
        else : 

            get_template_part( 'template-parts/content', 'none' );
        
        endif; ?>

</main>

<?php
get_sidebar(); ?>

<?php
get_footer(); ?>