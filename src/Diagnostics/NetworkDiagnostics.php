<?php
namespace ZinCelestial\Platform\Diagnostics;
defined('ABSPATH') || exit;
final class NetworkDiagnostics {
 public function summary():array{if(!is_multisite())return array();return array('network_id'=>get_current_network_id(),'site_count'=>(int)get_blog_count(),'network_active'=>\ZinCelestial\Platform\Core\Multisite::network_active(),'network_version'=>(string)get_site_option('zcp_network_version',''));}
 public function sites(int $limit=100):array{if(!is_multisite()||!current_user_can('manage_network_options'))return array();$rows=array();foreach(get_sites(array('number'=>max(1,min(500,$limit)))) as $site){$rows[]=array('id'=>(int)$site->blog_id,'domain'=>(string)$site->domain,'path'=>(string)$site->path,'archived'=>(bool)$site->archived,'spam'=>(bool)$site->spam,'deleted'=>(bool)$site->deleted);}return $rows;}
}
