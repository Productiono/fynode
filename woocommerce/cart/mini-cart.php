<?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/mini-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 10.0.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_mini_cart' ); ?>

<?php if ( ! WC()->cart->is_empty() ) : ?>

	<div class="woocommerce-mini-cart cart_list product_list_widget products list-layout <?php echo esc_attr( $args['list_class'] ); ?>">
		<?php
		do_action( 'woocommerce_before_mini_cart_contents' );

		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
			$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
			$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

			if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
				/**
				 * This filter is documented in woocommerce/templates/cart/cart.php.
				 *
				 * @since 2.1.0
				 */
				$product_name      = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
				$thumbnail         = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
				$product_price     = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
				$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
				?>
				<div class="product woocommerce-mini-cart-item <?php echo esc_attr( apply_filters( 'woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key ) ); ?>">
					<div class="product-wrapper">
						<div class="product-inner">
							<div class="thumbnail-wrapper">
								<div class="product-thumbnail">
									<?php if ( empty( $product_permalink ) ) : ?>
										<?php echo fynode_sanitize_data($thumbnail); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
									<?php else : ?>
										<a href="<?php echo esc_url( $product_permalink ); ?>">
											<div class="product-gallery">
												<?php echo fynode_sanitize_data($thumbnail); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
											</div>
										</a>
									<?php endif; ?>
								</div><!-- product-thumbnail -->
							</div><!-- thumbnail-wrapper -->
							<div class="content-wrapper">
								<h4 class="product-title"><a href="<?php echo esc_url($product_permalink); ?>"><?php echo esc_html($product_name); ?></a></h4>
								<span class="price">
									<?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantitysa">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>	
								</span><!-- price -->
							</div><!-- content-wrapper -->
							
							<?php echo wc_get_formatted_cart_item_data( $cart_item ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
							
							<?php
							echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
								'woocommerce_cart_item_remove_link',
								sprintf(
									'<a role="button" href="%s" class="remove remove_from_cart_button" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s" data-success_message="%s"><i class="klb-icon-x"></i></a>',
									esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
									/* translators: %s is the product name */
									esc_attr( sprintf( __( 'Remove %s from cart', 'fynode' ), wp_strip_all_tags( $product_name ) ) ),
									esc_attr( $product_id ),
									esc_attr( $cart_item_key ),
									esc_attr( $_product->get_sku() ),
									/* translators: %s is the product name */
									esc_attr( sprintf( __( '&ldquo;%s&rdquo; has been removed from your cart', 'fynode' ), wp_strip_all_tags( $product_name ) ) )
								),
								$cart_item_key
							);
							?>
							
						</div><!-- product-inner -->
					</div><!-- product-wrapper -->
				</div><!-- product -->
				<?php
			}
		}

		do_action( 'woocommerce_mini_cart_contents' );
		?>
	</div>

	<p class="woocommerce-mini-cart__total total">
		<?php
		/**
		 * Hook: woocommerce_widget_shopping_cart_total.
		 *
		 * @hooked woocommerce_widget_shopping_cart_subtotal - 10
		 */
		do_action( 'woocommerce_widget_shopping_cart_total' );
		?>
	</p>

	<?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>

	<p class="woocommerce-mini-cart__buttons buttons"><?php do_action( 'woocommerce_widget_shopping_cart_buttons' ); ?></p>

	<?php do_action( 'woocommerce_widget_shopping_cart_after_buttons' ); ?>

<?php else : ?>
		
		<div class="site-empty-content">
			<svg width="89" height="80" viewBox="0 0 89 80" fill="currentColor">
				<path d="M24.4444 53.3338H77.7778C78.8444 53.356 79.7778 52.6449 80 51.6005L88.8889 11.6005C89.0444 10.9338 88.8667 10.2449 88.4444 9.71158C88 9.17824 87.3556 8.86713 86.6667 8.88935H19.0222L17.7778 1.82269C17.5778 0.75602 16.6444 -0.0217579 15.5556 0.000464342H2.22222C1 0.000464342 0 1.00046 0 2.22269C0 3.44491 1 4.44491 2.22222 4.44491H13.7111L22.2222 51.5116C22.4222 52.5782 23.3556 53.356 24.4444 53.3338ZM83.8889 13.3338L76 48.8894H26.2889L19.8444 13.3338H83.8889Z"></path>
				<path d="M31.1101 62.2222C26.199 62.2222 22.2212 66.2 22.2212 71.1111C22.2212 76.0222 26.199 80 31.1101 80C36.0212 80 39.999 76.0222 39.999 71.1111C39.999 66.2 36.0212 62.2222 31.1101 62.2222ZM31.1101 75.5556C28.6656 75.5556 26.6656 73.5556 26.6656 71.1111C26.6656 68.6667 28.6656 66.6667 31.1101 66.6667C33.5545 66.6667 35.5545 68.6667 35.5545 71.1111C35.5545 73.5556 33.5545 75.5556 31.1101 75.5556Z"></path>
				<path d="M71.1101 62.2222C66.199 62.2222 62.2212 66.2 62.2212 71.1111C62.2212 76.0222 66.199 80 71.1101 80C76.0212 80 79.999 76.0222 79.999 71.1111C79.999 66.2 76.0212 62.2222 71.1101 62.2222ZM71.1101 75.5556C68.6656 75.5556 66.6656 73.5556 66.6656 71.1111C66.6656 68.6667 68.6656 66.6667 71.1101 66.6667C73.5545 66.6667 75.5545 68.6667 75.5545 71.1111C75.5545 73.5556 73.5545 75.5556 71.1101 75.5556Z"></path>
			</svg>
			<h4 class="entry-title"><?php esc_html_e( 'Your cart is empty!', 'fynode' ); ?></h4>
			<div class="entry-description">
				<p><?php esc_html_e( 'You may check out all the available products and buy some in the shop..', 'fynode' ); ?></p>
			</div><!-- entry-description -->
        </div>
		
<?php endif; ?>

<?php do_action( 'woocommerce_after_mini_cart' ); ?>
