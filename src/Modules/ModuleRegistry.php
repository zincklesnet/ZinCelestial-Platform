<?php
namespace ZinCelestial\Platform\Modules;
use ZinCelestial\Platform\Network\SettingsManager;
defined('ABSPATH') || exit;
final class ModuleRegistry {
 private array $modules=array();
 public function register(string $id,array $definition):void{$id=sanitize_key($id);$this->modules[$id]=wp_parse_args($definition,array('label'=>$id,'site_enabled'=>true,'network_capable'=>true));}
 public function all():array{return apply_filters('zcp_registered_modules',$this->modules);}
 public function enabled(string $id):bool{$id=sanitize_key($id);if(!isset($this->modules[$id]))return false;if(is_multisite() && !SettingsManager::module_allowed($id))return false;$site=get_option('zcp_enabled_modules',array());return in_array($id,is_array($site)?$site:array_keys($this->modules),true);}
 public function seed():void{foreach(array('diagnostics'=>'Diagnostics','compatibility'=>'Compatibility','rewards'=>'Rewards') as $id=>$label)$this->register($id,array('label'=>$label));}
}
