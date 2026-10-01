<?php
namespace ZinCelestial\Platform\Compatibility\Adapters;
defined('ABSPATH') || exit;
final class BuddyPressAdapter extends AbstractAdapter {
 public function id(): string { return 'buddypress'; }
 public function label(): string { return 'BuddyPress'; }
 public function is_active(): bool { return function_exists('buddypress'); }
 public function capabilities(): array { return array('members','activity','groups','messages'); }
}
