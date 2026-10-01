<?php
namespace ZinCelestial\Platform\Contracts;
defined('ABSPATH') || exit;
interface CompatibilityAdapter {
 public function id(): string;
 public function label(): string;
 public function is_active(): bool;
 public function capabilities(): array;
 public function health(): array;
 public function diagnostics(): array;
}
