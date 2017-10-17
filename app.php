<?php

require 'vendor/autoload.php';

use \Aniwall\Service\WallhavenService;

$wallhaven = new WallhavenService();

// Get random title anime
$string    = file_get_contents("config/list_anime.json");
$listAnime = json_decode($string, true);
$nb        = rand(0, count($listAnime) - 1);
echo 'Name: '.$listAnime[$nb].PHP_EOL;

// Search all wallpaper in wallhaven
$res       = $wallhaven->search($listAnime[$nb]);
$images = $res->getImages();

// Get thumb from random wallpaper
$randWallpaper = rand(0, count($images)-1);
echo $images[$randWallpaper]->getThumb().PHP_EOL;

// Get random wallpaper
$wallpaper = $wallhaven->get($images[$randWallpaper]->getId());
echo 'Url image: '.$wallpaper->getFullImage().PHP_EOL;

// Get Tags
$tags = $wallpaper->getTags();
$stringTag = '';
foreach ($tags as $tag) {
    $stringTag .= '#'.str_replace(' ', '',$tag->getText()).' ';
}
echo 'Tags: '.$stringTag.PHP_EOL;