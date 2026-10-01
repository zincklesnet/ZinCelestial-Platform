<?php
namespace ZinCelestial\Platform\Assets; defined('ABSPATH')||exit;
final class AssetsManager{public function report():array{return array('mode'=>'observe','inventory'=>(new AssetInventory())->current(),'rules'=>(array)get_option('zcp_asset_rules',array()));}}
