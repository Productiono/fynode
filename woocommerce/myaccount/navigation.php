<?php
/**
 * My Account navigation
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/navigation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_account_navigation' );

$current_user = wp_get_current_user();
?>
<div class="woocommerce-my-account mt-15 pt-15 border-top border-gray-200">
	<div class="my-account-user">
	  <div class="user-avatar"><i class="klb-icon-user-cut"></i></div>
	  <div class="user-detail">
			<span><?php esc_html_e('Welcome back,', 'fynode'); ?></span>
			<p><?php echo esc_html($current_user->display_name); ?></p>
	  </div><!-- user-detail -->
		<div class="user-menu-toggle">
			<a href="#">
			  <i class="klb-icon-menu"></i>
			  <span><?php esc_html_e('Menu', 'fynode'); ?></span>
			</a>
		</div><!-- user-menu-toggle -->
	</div><!-- my-account-user -->
	<div class="my-account-inner">
		<div class="my-account-navigation">
			<ul>
				<?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
					<li class="<?php echo wc_get_account_menu_item_classes( $endpoint ); ?>">
						<a href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>" <?php echo wc_is_current_account_menu_item( $endpoint ) ? 'aria-current="page"' : ''; ?>>
							<?php echo esc_html( $label ); ?>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
		</div><!-- my-account-navigation -->
		

<?php do_action( 'woocommerce_after_account_navigation' ); ?>
