<?php
/**
 * Admin View: Page - Status Tools
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<form method="post" action="options.php">
	<?php settings_fields( 'axisbuilder_status_settings_fields' ); ?>
	<?php $options = wp_parse_args( get_option( 'axisbuilder_status_options', array() ), array( 'uninstall_data' => 0 ) ); ?>
	<table class="axisbuilder-list-table widefat" cellspacing="0">
		<thead class="tools">
			<tr>
				<th colspan="2"><?php _e( 'Tools', 'axisbuilder' ); ?></th>
			</tr>
		</thead>
		<tbody class="tools">
			<?php foreach( $tools as $action => $tool ) { ?>
				<tr>
					<td><?php echo esc_html( $tool['name'] ); ?></td>
					<td>
						<p>
							<a href="<?php echo wp_nonce_url( admin_url( 'admin.php?page=ab-status&tab=tools&action=' . $action ), 'debug_action' ); ?>" class="button"><?php echo esc_html( $tool['button'] ); ?></a>
							<span class="description"><?php echo wp_kses_post( $tool['desc'] ); ?></span>
						</p>
					</td>
				</tr>
			<?php } ?>
	 		<tr>
				<td><?php _e( 'Remove post types on uninstall', 'axisbuilder' ); ?></td>
	 			<td>
	 				<p>
						<label><input type="checkbox" class="checkbox" name="axisbuilder_status_options[uninstall_data]" value="1" <?php checked( '1', $options['uninstall_data'] ); ?> /> <?php _e( 'Enabled', 'axisbuilder' ); ?></label>
					</p>
					<p>
						<span class="description"><?php _e( 'This tool will delete all portfolio data when uninstalling via Plugins > Delete.', 'axisbuilder' ); ?></span>
	 				</p>
	 			</td>
	 		</tr>
		</tbody>
	</table>
    <p class="submit">
    	<input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save Changes', 'axisbuilder' ) ?>" />
    </p>
</form>
