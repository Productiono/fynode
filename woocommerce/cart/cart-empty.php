<?php
/**
 * Empty cart page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-empty.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined( 'ABSPATH' ) || exit;

if ( wc_get_page_id( 'shop' ) > 0 ) : ?>
	<div class="woocommerce-cart-wrapper">
		<div class="cart-wrapper">
		
			<div class="cart-empty-page">	
					
				<div class="site-mini-cart-empty">
					<svg width="89" height="80" viewBox="0 0 89 80" fill="currentColor">
						<path d="M24.4444 53.3338H77.7778C78.8444 53.356 79.7778 52.6449 80 51.6005L88.8889 11.6005C89.0444 10.9338 88.8667 10.2449 88.4444 9.71158C88 9.17824 87.3556 8.86713 86.6667 8.88935H19.0222L17.7778 1.82269C17.5778 0.75602 16.6444 -0.0217579 15.5556 0.000464342H2.22222C1 0.000464342 0 1.00046 0 2.22269C0 3.44491 1 4.44491 2.22222 4.44491H13.7111L22.2222 51.5116C22.4222 52.5782 23.3556 53.356 24.4444 53.3338ZM83.8889 13.3338L76 48.8894H26.2889L19.8444 13.3338H83.8889Z"></path>
						<path d="M31.1101 62.2222C26.199 62.2222 22.2212 66.2 22.2212 71.1111C22.2212 76.0222 26.199 80 31.1101 80C36.0212 80 39.999 76.0222 39.999 71.1111C39.999 66.2 36.0212 62.2222 31.1101 62.2222ZM31.1101 75.5556C28.6656 75.5556 26.6656 73.5556 26.6656 71.1111C26.6656 68.6667 28.6656 66.6667 31.1101 66.6667C33.5545 66.6667 35.5545 68.6667 35.5545 71.1111C35.5545 73.5556 33.5545 75.5556 31.1101 75.5556Z"></path>
						<path d="M71.1101 62.2222C66.199 62.2222 62.2212 66.2 62.2212 71.1111C62.2212 76.0222 66.199 80 71.1101 80C76.0212 80 79.999 76.0222 79.999 71.1111C79.999 66.2 76.0212 62.2222 71.1101 62.2222ZM71.1101 75.5556C68.6656 75.5556 66.6656 73.5556 66.6656 71.1111C66.6656 68.6667 68.6656 66.6667 71.1101 66.6667C73.5545 66.6667 75.5545 68.6667 75.5545 71.1111C75.5545 73.5556 73.5545 75.5556 71.1101 75.5556Z"></path>
					</svg>
				</div><!-- site-mini-cart-empty -->	
				
				<?php 
					/*
					 * @hooked wc_empty_cart_message - 10
					 */
					do_action( 'woocommerce_cart_is_empty' );
				?>

				<p class="return-to-shop">
					<a class="button wc-backward<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
						<?php
							/**
							 * Filter "Return To Shop" text.
							 *
							 * @since 4.6.0
							 * @param string $default_text Default text.
							 */
							echo esc_html( apply_filters( 'woocommerce_return_to_shop_text', esc_html__( 'Return to shop', 'fynode' ) ) );
						?>
					</a>
				</p>
			
			</div>
			
		</div>
	</div>
<?php endif; ?>
