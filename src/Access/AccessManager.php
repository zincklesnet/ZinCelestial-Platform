<?php
namespace ZinCelestial\Platform\Access;
final class AccessManager{private static $i;public static function instance(){if(!self::$i)self::$i=new self();return self::$i;}public function register(){}public function can($action,$context=array()){return(bool)apply_filters('zcp_access_can',current_user_can('read'),$action,$context);}}
