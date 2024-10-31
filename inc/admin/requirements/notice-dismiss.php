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
 * Dismiss the rating notice, if the user chooses to do so.
 */
function elemsnr_dismiss_admin_notice() {
	$action   = ( isset( $_REQUEST['action'] ) ) ? sanitize_text_field( wp_unslash( $_REQUEST['action'] ) ) : '';
	$_wpnonce = ( isset( $_REQUEST['_wpnonce'] ) ) ? sanitize_text_field( wp_unslash( $_REQUEST['_wpnonce'] ) ) : '';

	if ( empty( $action ) || empty( $_wpnonce ) ) {
		return;
	}

	if ( 'elemsnr_dismiss_rating_notice' === $action ) {
		if ( wp_verify_nonce( $_wpnonce, 'elemsnr_rating_notice_nonce' ) ) {
			add_option( 'elemsnr_rating_notice', true );
		}
	}
}

add_action( 'admin_init', __NAMESPACE__ . '\elemsnr_dismiss_admin_notice' );

/**
 * Dismiss the upgrade notice, if the user chooses to do so.
 */
function elemsnr_dismiss_upgrade_notice() {
	$action   = ( isset( $_REQUEST['action'] ) ) ? sanitize_text_field( wp_unslash( $_REQUEST['action'] ) ) : '';
	$_wpnonce = ( isset( $_REQUEST['_wpnonce'] ) ) ? sanitize_text_field( wp_unslash( $_REQUEST['_wpnonce'] ) ) : '';

	if ( empty( $action ) || empty( $_wpnonce ) ) {
		return;
	}

	if ( 'elemsnr_dismiss_upgrade_notice' === $action ) {
		if ( wp_verify_nonce( $_wpnonce, 'elemsnr_upgrade_notice_nonce' ) ) {
			add_option( 'elemsnr_upgrade_notice', true );
		}
	}
}

add_action( 'admin_init', __NAMESPACE__ . '\elemsnr_dismiss_upgrade_notice' );
