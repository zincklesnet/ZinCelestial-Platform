<?php
namespace ZinCelestial\Platform\Network;
defined('ABSPATH') || exit;
final class SettingsManager {
 public const OPTION='zcp_network_settings';
 public static function defaults():array{return array('allowed_modules'=>array('diagnostics','compatibility','rewards'),'locked_modules'=>array());}
 public static function all():array{$v=get_site_option(self::OPTION,array());return wp_parse_args(is_array($v)?$v:array(),self::defaults());}
 public static function update(array $input):bool{if(!current_user_can('manage_network_options'))return false;$clean=self::defaults();foreach(array('allowed_modules','locked_modules') as $key){$clean[$key]=array_values(array_unique(array_filter(array_map('sanitize_key',(array)($input[$key]??array())))));}return update_site_option(self::OPTION,$clean);}
 public static function module_allowed(string $module):bool{$s=self::all();return in_array(sanitize_key($module),$s['allowed_modules'],true);}
 public static function module_locked(string $module):bool{$s=self::all();return in_array(sanitize_key($module),$s['locked_modules'],true);}
}
