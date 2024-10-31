<?php
/**
 * [Short description]
 *
 * @package    DEVRY\ELEMSNR
 * @copyright  Copyright (c) 2024, Developry Ltd.
 * @license    https://www.gnu.org/licenses/gpl-2.0.html GNU Public License
 * @since      1.3
 */

namespace DEVRY\ELEMSNR;

! defined( ABSPATH ) || exit; // Exit if accessed directly.

/**
 * Display a notice encouraging users to rate the plugin
 * on WordPress.org and provide options to dismiss the notice.
 */
function elemsnr_display_rating_notice() {
	if ( ! get_option( 'elemsnr_rating_notice', '' ) ) {
		?>
			<div class="notice notice-info is-dismissible elemsnr-admin">
				<h3><?php echo esc_html( ELEMSNR_PLUGIN_NAME ); ?></h3>
				<p>
					<?php
					printf(
						wp_kses(
							/* translators: %1$s is replaced with by giving it 5 stars rating */
							__( '✨💪🔌 Could you please kindly help the plugin in your turn %1$s? (Thank you in advance)', 'search-replace-for-elementor' ),
							json_decode( ELEMSNR_PLUGIN_ALLOWED_HTML_ARR, true )
						),
						'<strong>' . esc_html__( 'by giving it 5 stars rating', 'search-replace-for-elementor' ) . '</strong>'
					);
					?>
				</p>
				<div class="button-group">
					<a href="<?php echo esc_url( ELEMSNR_PLUGIN_WPORG_RATE ); ?>" target="_blank" class="button button-primary">
						<?php echo esc_html__( 'Rate us @ WordPress.org', 'search-replace-for-elementor' ); ?>
						<i class="dashicons dashicons-external"></i>
					</a>
					<a href="<?php echo esc_url( add_query_arg( array( 'page' => 'elemsnr_settings', 'action' => 'elemsnr_dismiss_rating_notice', '_wpnonce' => wp_create_nonce( 'elemsnr_rating_notice_nonce' ) ), admin_url( 'admin.php' ) ) ); ?>" class="button">
						<?php echo esc_html__( 'I already did', 'search-replace-for-elementor' ); ?>
					</a>
					<a href="<?php echo esc_url( add_query_arg( array( 'page' => 'elemsnr_settings', 'action' => 'elemsnr_dismiss_rating_notice', '_wpnonce' => wp_create_nonce( 'elemsnr_rating_notice_nonce' ) ), admin_url( 'admin.php' ) ) ); ?>" class="button">
						<?php echo esc_html__( "Don't show this notice again!", 'search-replace-for-elementor' ); ?>
					</a>
				</div>
			</div>
		<?php
	}
}
