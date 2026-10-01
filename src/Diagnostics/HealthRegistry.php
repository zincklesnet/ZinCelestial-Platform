<?php
namespace ZinCelestial\Platform\Diagnostics;
defined('ABSPATH') || exit;
final class HealthRegistry {
 public function normalize(array $report): array {
  $cards=array();
  foreach(($report['adapter_diagnostics']??array()) as $id=>$row){
   $health=is_array($row['health']??null)?$row['health']:array();
   $cards[$id]=array('id'=>sanitize_key($id),'label'=>sanitize_text_field((string)($row['label']??$id)),'active'=>!empty($row['active']),'status'=>sanitize_key((string)($health['status']??'unknown')),'capabilities'=>array_values(array_map('sanitize_text_field',(array)($row['capabilities']??array()))));
  }
  return apply_filters('zcp_health_cards',$cards,$report);
 }
 public function counts(array $cards): array {$c=array('ok'=>0,'warning'=>0,'error'=>0,'inactive'=>0,'unknown'=>0);foreach($cards as $card){$s=$card['active']?($card['status']??'unknown'):'inactive';isset($c[$s])?$c[$s]++:$c['unknown']++;}return $c;}
}
