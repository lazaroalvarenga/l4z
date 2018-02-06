<?php
get_header(); ?>

	<main id="content" tabindex="-1" role="main">

			<h1><?php single_cat_title(); ?></h1>

			<?php get_template_part( 'loop' ); ?>

	</main>

<?php
get_sidebar(); ?>

<?php
get_footer(); ?>