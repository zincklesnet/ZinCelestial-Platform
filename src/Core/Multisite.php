<?php
namespace ZinCelestial\Platform\Core; defined('ABSPATH')||exit;
final class Multisite{
 public static function network_active():bool{if(!is_multisite())return false;if(!function_exists('is_plugin_active_for_network'))require_once ABSPATH.'wp-admin/includes/plugin.php';return is_plugin_active_for_network(plugin_basename(ZCP_FILE));}
 public static function context():array{return array('multisite'=>is_multisite(),'network_active'=>self::network_active(),'site_id'=>get_current_blog_id(),'network_id'=>is_multisite()?get_current_network_id():0,'site_count'=>is_multisite()?(int)get_blog_count():1);}
}
