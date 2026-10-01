<?php
namespace ZinCelestial\Platform\Compatibility\Adapters;
defined('ABSPATH') || exit;
final class BbPressAdapter extends AbstractAdapter {
 public function id(): string { return 'bbpress'; }
 public function label(): string { return 'bbPress'; }
 public function is_active(): bool { return function_exists('bbpress'); }
 public function capabilities(): array { return array('forums','topics','replies'); }
}
