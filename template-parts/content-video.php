<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php 
    if ( has_post_thumbnail() ) :
        the_post_thumbnail(); 
    endif; ?>
    
    <h1><?php the_title(); ?></h1>

    <span class="date">
        <time datetime="<?php the_time( 'Y-m-d' ); ?> <?php the_time( 'H:i' ); ?>">
            <?php the_date(); ?> <?php the_time(); ?>
        </time>
    </span>

    <?php the_content(); ?>
</article>