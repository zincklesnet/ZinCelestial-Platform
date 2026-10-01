<?php
namespace ZinCelestial\Platform\Core; defined('ABSPATH')||exit;
final class Settings{public const OPTION='zcp_settings';public static function defaults():array{return array('rewards_enabled'=>0);}public static function all():array{$v=get_option(self::OPTION,array());return wp_parse_args(is_array($v)?$v:array(),self::defaults());}public static function sanitize($v):array{$v=is_array($v)?$v:array();return array('rewards_enabled'=>empty($v['rewards_enabled'])?0:1);}}
