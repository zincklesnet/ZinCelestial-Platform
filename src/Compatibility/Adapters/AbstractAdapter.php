<?php
namespace ZinCelestial\Platform\Compatibility\Adapters;
use ZinCelestial\Platform\Contracts\CompatibilityAdapter;
defined('ABSPATH') || exit;
abstract class AbstractAdapter implements CompatibilityAdapter {
 public function label(): string { return $this->id(); }
 public function capabilities(): array { return array(); }
 public function health(): array { return \ZinCelestial\Platform\Diagnostics\IntegrationHealth::checks($this->id(),$this->is_active()); }
 public function diagnostics(): array { return array('id'=>$this->id(),'label'=>$this->label(),'active'=>$this->is_active(),'capabilities'=>$this->capabilities(),'health'=>$this->health()); }
}
