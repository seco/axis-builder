<?php
/**
 * Test AB Install class
 *
 * @since 1.0
 */
class AB_Tests_Install extends AB_Unit_Test_Case {

	/**
	 * Test - install
	 */
	public function test_install() {
		// clean existing install first
		if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
			define( 'WP_UNINSTALL_PLUGIN', true );
		}
		include( dirname( dirname( dirname( __FILE__ ) ) ) . '/uninstall.php' );

		AB_Install::install();

		$this->assertTrue( get_option( 'axisbuilder_version' ) === AB()->version );
	}

	/**
	 * Test - in_plugin_update_message
	 */
	public function test_in_plugin_update_message() {
		ob_start();
		AB_install::in_plugin_update_message( array( 'Version' => '1.0.0' ) );
		$result = ob_get_clean();
		$this->assertTrue( is_string( $result ) );
	}

}
