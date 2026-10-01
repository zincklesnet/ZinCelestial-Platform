<?php
namespace ZinCelestial\Platform\Jobs;use ZinCelestial\Platform\Database\AtomicLock;defined('ABSPATH')||exit;
final class JobLock{private static ?AtomicLock $lock=null;public static function acquire(int $ttl=300):bool{self::$lock=new AtomicLock('aggregation_lock');return self::$lock->acquire($ttl);}public static function release():void{if(self::$lock)self::$lock->release();}public static function stale():bool{return false;}}
