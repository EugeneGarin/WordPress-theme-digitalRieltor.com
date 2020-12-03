<?php
/**
* @package WordPress
* @subpackage EugeneTheme
* @since EugeneTheme 1.0
*/
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>digitalRieltor</title>
	<link rel="shortcut icon" href="<?=get_template_directory_uri()?>/images/favicon.ico" type="image/x-icon" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div class="page-background">
		<header>
			<address class="container-fluid mb-0 contacts text-right text-white"><i class="fa fa-phone"></i> <a class="text-light" href="tel:+(380)67-123-45-67">+(380)67-123-45-67</a> | support@digitalRieltor.ua | Київ, вул. Богдана Хмельницкого, 14/25</address>
			<nav class="navbar navbar-expand-md navbar-light">
				<a class="navbar-brand" href="/"><img src="<?=get_template_directory_uri()?>/images/Logo.png" alt="logo.jpg" class="logo-image"></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse align-self-stretch" id="navbarSupportedContent" style="flex-wrap: wrap;">
					<?php 
					wp_nav_menu( array(
						'menu'            => 'header_and_footer_menu',
						'container'       => '',
						'menu_class'      => 'navbar-nav ml-auto align-self-start',
					) );
					?>
					<div style="width: 100%;"></div>
					<ul class="navbar-nav align-self-end ml-auto">
						<li class="nav-item">
							<a class="nav-link" href="<?=get_permalink(97)?>">Про нас</a>
						</li>
						<li class="nav-item">
							<a data-fancybox data-src="#hidden-content-1" href="javascript:;" class="btn nav-link text-left">Задати питання</a>
							<div style="display: none;" id="hidden-content-1">
								<div class="ask-question-form">
									<div class="contact-left float-md-left">
										<div class="form-field contact-userName">
											<input type="text" placeholder="Ваше ім'я" maxlength="50"/>
										</div>
										<div class="form-field contact-userEmail">
											<input type="email" name="user-email" placeholder="Ваш E-mail" maxlength="50"/>
										</div>
										<div class="form-field contact-userPhone">
											<input type="tel" placeholder="Ваш номер телефону"/>
										</div>
									</div>
									<div class="contact-right ml-md-4 float-md-right">
										<div class="form-field contact-userMessage">
											<textarea cols="34" maxlength="500" placeholder="Задайте ваше питання"></textarea>
										</div>
									</div>
									<input type="submit" class="submit position-absolute" value="Відправити"/>
								</div>
							</div>
						</li>
						<li class="nav-item wc-search-form pl-md-3 pl-0">
							<?=do_shortcode( '[aws_search_form id="YOUR_ID"]');?>
						</li>
					</ul>
				</div>
			</nav>
			<div class="back-to-top-button">
				<img src="<?=get_template_directory_uri()?>/images/back-to-top.png" alt="to-top" width="50">
			</div>
		</header>
		<main>
			<div class="page-body m-1 m-lg-2 m-xl-4">