<?php
/**
 * @package WordPress
 * @subpackage EugeneTheme
 * @since EugeneTheme 1.0
 */

get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">

		<?php
		if ( have_posts() ) {

			// Load posts loop.
			while ( have_posts() ) {
				the_post();?>
				<h2><?php the_title(); ?></h2>
				<?php the_content();
			}

		}
		?>

	</main><!-- .site-main -->
</div><!-- .content-area -->

<?php
get_footer();
