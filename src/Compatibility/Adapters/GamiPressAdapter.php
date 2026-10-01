<?php
namespace ZinCelestial\Platform\Compatibility\Adapters;
defined('ABSPATH') || exit;
final class GamiPressAdapter extends AbstractAdapter {
 public function id(): string { return 'gamipress'; }
 public function label(): string { return 'GamiPress'; }
 public function is_active(): bool { return defined('GAMIPRESS_VER') || function_exists('gamipress'); }
 public function capabilities(): array { return array('points','achievements','ranks'); }
}
