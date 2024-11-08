<?php
class PluginUpdater {
    /**
    * Update Plugin Version
    * @since 1.0.0
    */
    public function update_plugin_version( $version ) {
        update_option( 'aewlite_plugin_version', $version );
    }

    /**
    * Check Plugin Version
    * @since 1.0.0
    */
    public function check_plugin_version( $new_version, $old_version ) {
        if( $new_version !== $old_version ) {
            $this->update_plugin_version( $new_version );
        }
    }

    /**
    * Plugin update Message
    * @since 1.0.0
    */
    public function update_message( $data, $response ) {
        if( isset( $data['upgrade_notice'] ) ) {
            printf(
                '<div class="update-message">%s</div>',
                wpautop( $data['upgrade_notice'] )
            );
        }
    }

    /**
    * Plugin Update Message Hook
    * @since 1.0.0
    */
    public function plugin_update_message() {
        add_action( 'in_plugin_update_message-astro-elementor-widgets-lite/astro-elementor-widgets-lite.php', [ $this, 'update_message' ], 10, 2 );
    }
}