<?php
namespace ZinCelestial\Platform\Network; use ZinCelestial\Platform\Jobs\NetworkAggregationJob; defined('ABSPATH')||exit;
final class AggregationController{public function register():void{add_action('admin_post_zcp_start_aggregation',array($this,'start'));}public function start():void{if(!current_user_can('manage_network_options'))wp_die(esc_html__('Insufficient permissions.','zincelestial-platform'));check_admin_referer('zcp_start_aggregation');NetworkAggregationJob::start(20);wp_safe_redirect(network_admin_url('admin.php?page=zcp-network&aggregation=started'));exit;}}
