<?php

require 'vendor/autoload.php';

use \Aniwall\Service\WallhavenService;

$wallhaven = new WallhavenService();

$res = $wallhaven->search("attack on titans");

echo $res->getStatusCode();
// "200"
echo $res->getHeader('content-type');
// 'application/json; charset=utf8'
echo $res->getBody();