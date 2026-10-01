<?php
namespace ZinCelestial\Platform\Assets\Rules; defined('ABSPATH')||exit;
final class RuleValidator{
 public const ACTIONS=array('observe','unload'); public const TYPES=array('script','style'); public const SCOPES=array('site','post_type','url');
 public static function sanitize(array $rule):array{$action=sanitize_key($rule['action']??'observe');$type=sanitize_key($rule['type']??'');$scope=sanitize_key($rule['scope']??'site');$handle=sanitize_key($rule['handle']??'');if(!in_array($action,self::ACTIONS,true)||!in_array($type,self::TYPES,true)||!in_array($scope,self::SCOPES,true)||''===$handle)return array();return array('id'=>sanitize_key($rule['id']??wp_generate_uuid4()),'enabled'=>!empty($rule['enabled']),'action'=>$action,'type'=>$type,'handle'=>$handle,'scope'=>$scope,'match'=>sanitize_text_field($rule['match']??''),'created_by'=>get_current_user_id());}
 public static function protected_handles():array{return apply_filters('zcp_protected_asset_handles',array('jquery','jquery-core','wp-hooks','wp-i18n','wp-api-fetch','wp-element','wp-dom-ready','heartbeat','admin-bar'));}
 public static function safe(array $rule,array $inventory):bool{if('unload'!==$rule['action'])return true;if(in_array($rule['handle'],self::protected_handles(),true))return false;$bucket='script'===$rule['type']?'scripts':'styles';foreach((array)($inventory[$bucket]??array()) as $asset){if(in_array($rule['handle'],(array)($asset['deps']??array()),true))return false;}return true;}
}
