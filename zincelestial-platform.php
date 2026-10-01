<?php
/**
 * Plugin Name: ZinCelestial Platform
 * Description: Shared multisite-compatible services for the ZinCelestial ecosystem.
 * Version: 1.0.0
 * Requires at least: 6.3
 * Requires PHP: 8.0
 * Network: true
 * Text Domain: zincelestial-platform
 */
defined('ABSPATH') || exit;
if(!defined('ZCP_VERSION'))define('ZCP_VERSION','1.0.0');
if(!defined('ZCP_FILE'))define('ZCP_FILE',__FILE__);
if(!defined('ZCP_PATH'))define('ZCP_PATH',trailingslashit(plugin_dir_path(__FILE__)));
if(!defined('ZCP_URL'))define('ZCP_URL',trailingslashit(plugin_dir_url(__FILE__)));
require_once ZCP_PATH.'src/Core/Autoloader.php';
\ZinCelestial\Platform\Core\Autoloader::register();
register_activation_hook(__FILE__,array('\ZinCelestial\Platform\Core\Activator','activate'));
add_action('wp_initialize_site',array('\ZinCelestial\Platform\Core\Activator','initialize_site'),20,1);
add_action('zcp_network_aggregate_recovery',array('\ZinCelestial\Platform\Jobs\NetworkAggregationJob','recover'));
add_action('zcp_network_aggregate_batch',array('\\ZinCelestial\\Platform\\Jobs\\NetworkAggregationJob','run'),10,2);
add_action('plugins_loaded',static function():void{\ZinCelestial\Platform\Core\Plugin::instance()->boot();},20);
function zca_platform(): \ZinCelestial\Platform\Core\Plugin{return \ZinCelestial\Platform\Core\Plugin::instance();}
