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

$wallpaper = $wallhaven->get($images[$randWallpaper]->getId());
echo 'Url image:'.$wallpaper->getFullImage().PHP_EOL;
echo 'Tags:'.var_dump($wallpaper->getTags()).PHP_EOL;