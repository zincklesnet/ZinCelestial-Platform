<?php
namespace ZinCelestial\Platform\Compatibility\Adapters;
defined('ABSPATH') || exit;
final class WordfenceAdapter extends AbstractAdapter {
 public function id(): string { return 'wordfence'; }
 public function label(): string { return 'Wordfence'; }
 public function is_active(): bool { return defined('WORDFENCE_VERSION') || class_exists('wordfence'); }
 public function capabilities(): array { return array('firewall','scanner','login-security'); }
}
