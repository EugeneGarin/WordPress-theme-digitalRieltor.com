<?php
/**
 * Template Name: Home page
 * Template for the home page
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
					<div class="text-break">
						<div class="page-content pt-4">
							<div class="top-label font-weight-bold text-nowrap">
								<i class="fa fa-home p-1 text-white mr-2"></i>Продаж нерухомостi
							</div>
							<div class="row image-tiles align-items-end">
								<div class="col-lg-4 col-6">
									<a href='<?=site_url()?>/product-category/apartments/'>
										<figure>
											<figcaption>Квартири</figcaption>
											<img src="<?=wp_get_attachment_image_url(49, "full")?>" alt="img">
										</figure>
									</a>
								</div>
								<div class="col-lg-4 col-6">
									<a href='<?=site_url()?>/product-category/rooms/'>
										<figure>
											<figcaption>Кiмнати</figcaption>
											<img src="<?=wp_get_attachment_image_url(54, "full")?>" alt="img">
										</figure>
									</a>
								</div>
								<div class="col-lg-4 col-6">
									<a href='<?=site_url()?>/product-category/houses/'>
										<figure>
											<figcaption>Будинки</figcaption>
											<img src="<?=wp_get_attachment_image_url(52, "full")?>" alt="img">
										</figure>
									</a>
								</div>
								<div class="col-lg-4 col-6">
									<a href='<?=site_url()?>/product-category/land-plots/'>
										<figure>
											<figcaption>Земельнi дiлянки</figcaption>
											<img src="<?=wp_get_attachment_image_url(55, "full")?>" alt="img">
										</figure>
									</a>
								</div>
								<div class="col-lg-4 col-6">
									<a href='<?=site_url()?>/product-category/commercial-apartments/'>
										<figure>
											<figcaption>Торгiвельнi примiщення</figcaption>
											<img src="<?=wp_get_attachment_image_url(50, "full")?>" alt="img">
										</figure>
									</a>
								</div>
								<div class="col-lg-4 col-6">
									<a href='<?=site_url()?>/product-category/office-apartments/'>
										<figure>
											<figcaption>Торгiвельно-офiснi примiщення</figcaption>
											<img src="<?=wp_get_attachment_image_url(51, "full")?>" alt="img">
										</figure>
									</a>
								</div>
							</div>
						</div>
					</div>
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
