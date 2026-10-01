<?php
namespace ZinCelestial\Platform\Fleet; defined('ABSPATH')||exit;
final class FleetService{private FleetRepository $repo;public function __construct(){ $this->repo=new FleetRepository();}public function dashboard():array{return array('summary'=>$this->repo->summary(),'sites'=>$this->repo->sites(absint($_GET['paged']??1),50));}}
