<?php
namespace ZinCelestial\Platform\Diagnostics;
defined('ABSPATH') || exit;
final class IntegrationHealth {
 public static function checks(string $id,bool $active):array { if(!$active)return array('status'=>'inactive','checks'=>array());
  $checks=match($id){
   'buddypress'=>array('members'=>function_exists('bp_is_active')?bp_is_active('members'):false,'activity'=>function_exists('bp_is_active')?bp_is_active('activity'):false,'groups'=>function_exists('bp_is_active')?bp_is_active('groups'):false,'messages'=>function_exists('bp_is_active')?bp_is_active('messages'):false),
   'woocommerce'=>array('pages_configured'=>function_exists('wc_get_page_id') && wc_get_page_id('shop')>0,'session_class'=>class_exists('WC_Session'),'database_version'=>(string)get_option('woocommerce_db_version','')),
   'bbpress'=>array('forums'=>post_type_exists('forum'),'topics'=>post_type_exists('topic'),'replies'=>post_type_exists('reply')),
   'wordfence'=>array('firewall_bootstrap'=>defined('WFWAF_VERSION'),'plugin_version'=>defined('WORDFENCE_VERSION')),
   'gamipress'=>array('points_types'=>function_exists('gamipress_get_points_types'),'achievements'=>post_type_exists('achievement-type'),'ranks'=>post_type_exists('rank-type')),
   'aam'=>array('api'=>class_exists('AAM')||class_exists('AAM_Core'),'version'=>defined('AAM_VERSION')),
   default=>array()
  };
  $bad=array_filter($checks,fn($v)=>$v===false||$v==='');
  return array('status'=>$bad?'warning':'ok','checks'=>$checks,'warnings'=>array_keys($bad));
 }
}
