<?php get_header(); ?>

	<main id="content" tabindex="-1" role="main">

        <h1><?php echo sprintf( __( '%s Search Results for ', 'l4z' ), $wp_query->found_posts ); echo get_search_query(); ?></h1>

		<?php get_template_part( 'template-parts/content', 'loop' ); ?>

	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>