<?php
namespace ZinCelestial\Platform\Compatibility;
defined('ABSPATH') || exit;
final class PluginRegistry {
 private static ?self $instance=null; private AdapterManager $manager;
 private function __construct(){ $this->manager=new AdapterManager(); }
 public static function instance():self{return self::$instance??=new self();}
 public function adapters():AdapterManager{return $this->manager;}
 public function status():array{$out=array();foreach($this->manager->all() as $adapter)$out[$adapter->label()]=$adapter->is_active();return $out;}
 public function diagnostics():array{return $this->manager->diagnostics();}
 public function active(string $id):bool{$adapter=$this->manager->get($id);return $adapter?$adapter->is_active():false;}
}
