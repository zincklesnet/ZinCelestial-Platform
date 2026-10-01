<?php
namespace ZinCelestial\Platform\Core; defined('ABSPATH')||exit;
final class Activator{
 public static function activate(bool $network_wide=false):void{if(version_compare(PHP_VERSION,'8.0','<'))wp_die(esc_html__('ZinCelestial Platform requires PHP 8.0 or newer.','zincelestial-platform'));if(is_multisite()&&$network_wide){foreach(get_sites(array('fields'=>'ids','number'=>0)) as $id){switch_to_blog((int)$id);self::install_site();restore_current_blog();}update_site_option('zcp_network_version',ZCP_VERSION); if(false===get_site_option('zcp_network_settings',false))add_site_option('zcp_network_settings',\ZinCelestial\Platform\Network\SettingsManager::defaults());return;}self::install_site();}
 public static function initialize_site(\WP_Site $site):void{if(!Multisite::network_active())return;switch_to_blog((int)$site->blog_id);self::install_site();restore_current_blog();}
 private static function install_site():void{update_option('zcp_version',ZCP_VERSION,false);if(false===get_option(Settings::OPTION,false))add_option(Settings::OPTION,Settings::defaults(),'','no');}
}
