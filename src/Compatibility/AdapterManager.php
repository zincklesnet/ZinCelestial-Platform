<?php
namespace ZinCelestial\Platform\Compatibility;
use ZinCelestial\Platform\Contracts\CompatibilityAdapter;
use ZinCelestial\Platform\Compatibility\Adapters\{BuddyPressAdapter,WooCommerceAdapter,BbPressAdapter,WordfenceAdapter,GamiPressAdapter,AamAdapter};
defined('ABSPATH') || exit;
final class AdapterManager {
 private array $adapters=array();
 public function __construct(){ foreach(array(new BuddyPressAdapter(),new WooCommerceAdapter(),new BbPressAdapter(),new WordfenceAdapter(),new GamiPressAdapter(),new AamAdapter()) as $adapter)$this->register($adapter); }
 public function register(CompatibilityAdapter $adapter):void{$this->adapters[$adapter->id()]=$adapter;}
 public function has(string $id):bool{return isset($this->adapters[sanitize_key($id)]);}
 public function get(string $id):?CompatibilityAdapter{return $this->adapters[sanitize_key($id)]??null;}
 public function all():array{return apply_filters('zcp_compatibility_adapters',$this->adapters);}
 public function diagnostics():array{$rows=array();foreach($this->all() as $id=>$adapter)$rows[$id]=$adapter->diagnostics();return $rows;}
}
