<?php

require 'vendor/autoload.php';

use \Aniwall\Service\WallhavenService;

$wallhaven = new WallhavenService();

$string    = file_get_contents("config/list_anime.json");
$listAnime = json_decode($string, true);
$nb        = rand(0, count($listAnime) - 1);
$res       = $wallhaven->search($listAnime[$nb]);

echo 'Name: '.$listAnime[$nb].PHP_EOL;

$images = $res->getImages();
$randWallpaper = rand(0, count($images)-1);

echo $images[$randWallpaper]->getThumb().PHP_EOL;

$res = $wallhaven->get($images[$randWallpaper]->getId());
echo $res->getBody().PHP_EOL;