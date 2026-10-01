<?php
namespace ZinCelestial\Platform\Contracts;
defined('ABSPATH') || exit;
interface ServiceProvider { public function register(\ZinCelestial\Platform\Core\Container $container): void; public function boot(): void; }
