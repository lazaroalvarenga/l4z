<?php
/**
 * The template for displaying Author archive pages.
 */
get_header(); ?>

<main id="content" tabindex="-1" role="main">
    <?php
        if ( have_posts() ) : ?>
            <header class="page-header">

                <?php
                    the_archive_title( '<h1 class="page-title">', '</h1>' );
                    the_archive_description( '<div class="taxonomy-description">', '</div>' );

                    the_post();

                    if ( get_the_author_meta( 'description' ) ) : ?>
                
                    <div class="author-biography">
                        <span class="author-avatar"><?=get_avatar( get_the_author_meta( 'ID' ), 60 );?></span>
                        <span class="author-description"><?php the_author_meta( 'description' ); ?></span>                    
                    </div>
                <?php
                    endif; ?>

            </header>

            <?php
                rewind_posts();

                while ( have_posts() ): the_post();

                    get_template_part( 'template-parts/content', get_post_format() );

                endwhile;
            
            else:

                get_template_part( 'content', 'none' );
            
            endif; ?>
</main>
<?php
get_footer();