<?php

namespace DataEndpoint\Includes;

class Settings {

    public function __construct() {
        $this->options = get_option( 'web-data-options' );
        add_action( 'admin_menu', array( $this, 'add_settings_menu' ) );
        add_action( 'admin_init', array( $this, 'settings_init' ) );
    }

    public function add_settings_menu() {
        add_submenu_page(
            'options-general.php',
            'Web Data Endpoint',
            'Web Data Endpoint',
            'manage_options',
            'web-data-endpoint-options',
            array( $this, 'create_settings_page' )
        );
    }

    public function create_settings_page() {
        ?>
        <div class="wrap">
            <h1>Web Data Endpoint Settings</h1>
            <form action="options.php" method="post">
                <?php
                settings_fields( 'web-data-endpoint-options' );
                do_settings_sections( 'web-data-endpoint-options' );
                submit_button();
                ?>
            </form>
        </div>
        <?php
    }

    public function settings_init() {
        register_setting(
            'web-data-endpoint-options',
            'web-data-options',
            array( $this, 'sanitize' )
        );
        add_settings_section(
            'section_client_settings', // ID
            'Client Settings', // Title
            array( $this, 'print_client_section_info' ), // Callback
            'web-data-endpoint-options' // Page
        );

        add_settings_field(
            'token', // ID
            'Token', // Title
            array( $this, '_web_data_endpoint_project_key' ), // Callback
            'web-data-endpoint-options', // Page
            'section_client_settings' // Section
        );
    }

    public function sanitize( $input ) {
        return $input;
    }

    /*
     *	CLIENT RELATED SETTINGS
     */

    public function print_client_section_info() {
        print 'Enter a authentication token below.';
    }

    public function _web_data_endpoint_project_key() {
        printf(
            '<input type="text" id="token" name="web-data-options[token]" value="%s" />',
            isset( $this->options['token'] ) ? esc_attr( $this->options['token'] ) : ''
        );
    }
}
