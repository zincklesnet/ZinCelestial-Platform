<?php
namespace ZinCelestial\Platform\Performance;
defined('ABSPATH') || exit;
final class PerformanceService {
 public function report(): array { global $wp_scripts,$wp_styles,$wpdb;
  $scripts=is_object($wp_scripts)?array_values((array)$wp_scripts->queue):array();
  $styles=is_object($wp_styles)?array_values((array)$wp_styles->queue):array();
  return array(
   'scope'=>array('site_id'=>get_current_blog_id(),'network_id'=>is_multisite()?get_current_network_id():0),
   'runtime'=>array('memory_limit'=>(string)ini_get('memory_limit'),'memory_usage'=>size_format(memory_get_usage(true)),'peak_memory'=>size_format(memory_get_peak_usage(true)),'queries'=>(int)get_num_queries()),
   'assets'=>array('scripts_count'=>count($scripts),'styles_count'=>count($styles),'scripts'=>$scripts,'styles'=>$styles),
   'cache'=>array('external_object_cache'=>wp_using_ext_object_cache(),'page_cache_dropin'=>file_exists(WP_CONTENT_DIR.'/advanced-cache.php'),'object_cache_dropin'=>file_exists(WP_CONTENT_DIR.'/object-cache.php')),
   'media'=>array('big_image_threshold'=>(int)apply_filters('big_image_size_threshold',2560,array(),0),'native_lazy_load'=>function_exists('wp_filter_content_tags')),
   'server'=>array('php'=>PHP_VERSION,'opcache'=>function_exists('opcache_get_status') && (bool)opcache_get_status(false),'gzip'=>extension_loaded('zlib')),
  );
 }
 public function score(array $r): int {$score=100;if(empty($r['cache']['external_object_cache']))$score-=10;if(empty($r['server']['opcache']))$score-=15;if(($r['assets']['scripts_count']+$r['assets']['styles_count'])>75)$score-=15;if($r['runtime']['queries']>150)$score-=15;return max(0,$score);}
}
