<?php
namespace ZinCelestial\Platform\Core;
defined('ABSPATH') || exit;
final class Container {
 private array $factories=array(); private array $instances=array();
 public function set(string $id, callable $factory):void{$this->factories[$id]=$factory;unset($this->instances[$id]);}
 public function instance(string $id,$service):void{$this->instances[$id]=$service;unset($this->factories[$id]);}
 public function has(string $id):bool{return array_key_exists($id,$this->instances)||array_key_exists($id,$this->factories);}
 public function get(string $id){if(array_key_exists($id,$this->instances))return $this->instances[$id];if(!$this->has($id))throw new \InvalidArgumentException('Unknown ZinCelestial service: '.$id);return $this->instances[$id]=($this->factories[$id])($this);}
}
