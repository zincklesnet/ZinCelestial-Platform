<?php
namespace ZinCelestial\Platform\Compatibility\Adapters;
defined('ABSPATH') || exit;
final class AamAdapter extends AbstractAdapter {
 public function id(): string { return 'aam'; }
 public function label(): string { return 'Advanced Access Manager'; }
 public function is_active(): bool { return defined('AAM_VERSION') || class_exists('AAM') || class_exists('AAM_Core'); }
 public function capabilities(): array { return array('access-policies','roles','capabilities'); }
}
