<?php
namespace ZinCelestial\Platform\Compatibility\Adapters;
defined('ABSPATH') || exit;
final class WooCommerceAdapter extends AbstractAdapter {
 public function id(): string { return 'woocommerce'; }
 public function label(): string { return 'WooCommerce'; }
 public function is_active(): bool { return class_exists('WooCommerce'); }
 public function capabilities(): array { return array('shop','orders','customers','products'); }
}
