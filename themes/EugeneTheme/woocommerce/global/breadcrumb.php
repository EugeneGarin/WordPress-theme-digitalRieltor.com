<?php
/**
 * Shop breadcrumb
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/breadcrumb.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     2.3.0
 * @see         woocommerce_breadcrumb()
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! empty( $breadcrumb ) ) {
	global $wp;?>
	<div id="primary" class="site-content">
		<div id="content" role="main">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb py-1" style="border-radius: 15px;">
					<li class="breadcrumb-item align-middle"><a href="/"><i class="fa fa-home text-danger"></i> digitalRieltor</a></li>
					<?php
					foreach ($breadcrumb as $key => $crumb) {
						if ($key >= 1) {
							if($key == count($breadcrumb) - 1) {
								?><li class="breadcrumb-item align-middle active"><?=$crumb[0]?></li><?php
							}
							else {
								?><li class="breadcrumb-item align-middle active"><a href="<?=$crumb[1]?>"><?=$crumb[0]?></a></li><?php
							}
						}
					} ?>
				</ol>
			</nav>
		</div>
	</div>
	<?php
}
?>