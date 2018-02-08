<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php 
    if ( has_post_thumbnail() ) : ?>
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
            <?php the_post_thumbnail(); ?>
        </a>
    <?php endif; ?>
        
    <h2>
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
    </h2>

    <p><?php the_excerpt(); ?></p>
        
</article>
