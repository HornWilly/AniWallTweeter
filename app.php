<?php

require 'vendor/autoload.php';

use \Aniwall\Service\WallhavenService;

$wallhaven = new WallhavenService();

$string    = file_get_contents("config/list_anime.json");
$listAnime = json_decode($string, true);
$nb        = rand(0, count($listAnime) - 1);
$res       = $wallhaven->search($listAnime[$nb]);

echo 'Name: '.$listAnime[$nb].PHP_EOL;

$listWallpaper = json_decode($res->getBody());
$randWallpaper = rand(0, count($listWallpaper->images)-1);

echo $listWallpaper->images[$randWallpaper]->thumb.PHP_EOL;

$res = $wallhaven->get($listWallpaper->images[$randWallpaper]->id);
echo $res->getBody().PHP_EOL;