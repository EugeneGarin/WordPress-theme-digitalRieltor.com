<?php
/**
 * @package WordPress
 * @subpackage EugeneTheme
 * @since EugeneTheme 1.0
 */

get_header(); ?>

<div id="primary" class="site-content">
	<div id="content" role="main">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb py-1" style="border-radius: 15px;">
				<li class="breadcrumb-item align-middle"><a href="/"><i class="fa fa-home text-danger"></i> digitalRieltor</a></li>
				<li class="breadcrumb-item align-middle active"><?=the_title()?></li>
			</ol>
		</nav>
		<div class="container-fluid">
			<div class="row">
				<div class="<?=is_active_sidebar('sidebar-left') && get_post_meta($post->ID, 'use_sidebar', true) ? 'col-md-8 col-lg-9 order-md-1 order-0' : 'col-12' ?> text-break">
					<?php
					if ( have_posts() ) {
						while ( have_posts() ) :
							?>
							<?php
							the_post();
							?>
							<h2><?php the_title(); ?></h2>
							<?php the_content(); ?>
						<?php endwhile;
					}
					else
						echo('<h2>No posts found</h2>');?>
				</div>
				<?php if ( is_active_sidebar( 'sidebar-left' ) && get_post_meta($post->ID, 'use_sidebar', true) ) :?>
					<div class="left-sidebar col-md-4 col-lg-3 order-md-0 order-1 mt-5 mt-md-0">
						<?php dynamic_sidebar( 'sidebar-left' );?>
					</div>
					<?php //else : get_sidebar('left');
				endif;?>
			</div>
		</div>
	</div><!-- #content -->
</div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
