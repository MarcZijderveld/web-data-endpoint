<?php
/*
 * Plugin Name: Web Data Endpoint
 * Description: WP Crontrol lets you view and control what's happening in the WP-Cron system.
 * Author:      Marc Zijderveld
 * Author URI:  https://github.com/MarcZijderveld/web-data-endpoint
 * Version:     1.0.0
 * Text Domain: web-data-endpoint
 * Domain Path: /languages/
 * License:     GPL v2 or later
 */
require __DIR__ . '/vendor/autoload.php';
use \DataEndpoint\Includes\Settings as Settings;

add_action( 'plugins_loaded', array( 'web_data_endpoint', 'init' ));
class web_data_endpoint {

    public function init() {
        $class = __CLASS__;
        new $class;
    }

    protected function __construct() {
        add_action( 'rest_api_init', array( $this, 'route' ) );
        new Settings();
    }

    /**
     * Make the resr route,
     */
    public function route() {
        register_rest_route( 'api/v1', '/web-data-endpoint', array(
            'methods' => 'GET',
            'callback' => array( $this, 'callback' )
        ) );
    }

    /**
     *
     * Callback for the /deploy endpoint.
     *
     * @param $data
     */
    public function callback($data)
    {
        if (isset($data['token']))
        {
            if($data['token'] === get_option('web-data-options')["token"]) {
                echo json_encode(get_option("monsterinsights_report_data_overview", array()));
                exit;
            }
        }
        else {
            $json["error"] = "Invalid token provided, please check the wp-admin for the correct access token";
            return json_encode($json);
        }
        exit;
    }
}