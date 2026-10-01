<?php
namespace ZinCelestial\Platform\Core; defined('ABSPATH')||exit;
final class Autoloader{private const PREFIX='ZinCelestial\\Platform\\';public static function register():void{spl_autoload_register(array(self::class,'load'));}private static function load(string $class):void{if(0!==strpos($class,self::PREFIX))return;$f=ZCP_PATH.'src/'.str_replace('\\','/',substr($class,strlen(self::PREFIX))).'.php';if(is_readable($f))require_once $f;}}
