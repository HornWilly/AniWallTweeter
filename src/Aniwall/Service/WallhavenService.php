<?php

namespace Aniwall\Service;

use Aniwall\Model\ListInfoWallpaper;
use Aniwall\Model\Wallpaper;
use GuzzleHttp\Client as HttpClient;
use JsonMapper;

/**
 * Class WallhavenService
 */
class WallhavenService
{
    const URI         = 'https://wallhaven-api.now.sh';
    const URI_SEARCH  = self::URI.'/search?keyword="%s"';
    const URI_DETAILS = self::URI.'/details/%s';

    /** @var HttpClient */
    private $httpClient;

    /** @var JsonMapper */
    private $mapper;

    /**
     * WallhavenService constructor.
     */
    public function __construct()
    {
        $this->httpClient = new HttpClient();
        $this->mapper     = new JsonMapper();
    }

    /**
     * @param string $search
     *
     * @return ListInfoWallpaper|null
     */
    public function search(string $search)
    {
        $uriSearch    = sprintf(self::URI_SEARCH, $search);
        $req          = $this->httpClient->createRequest('GET', $uriSearch);
        $responseJson = $this->httpClient->send($req);

        if ($responseJson) {
            $response = json_decode($responseJson->getBody());
            /** @var ListInfoWallpaper $listInfoWallpaper */
            $listInfoWallpaper = $this->mapper->map($response, new ListInfoWallpaper());

            return $listInfoWallpaper;
        }

        return null;
    }

    /**
     * @param int $id
     *
     * @return Wallpaper|null
     */
    public function get(int $id)
    {
        $uriDetails = sprintf(self::URI_DETAILS, $id);
        $req        = $this->httpClient->createRequest('GET', $uriDetails);
        $responseJson   = $this->httpClient->send($req);

        if ($responseJson) {
            $response = json_decode($responseJson->getBody());
            /** @var Wallpaper $wallpaper */
            $wallpaper = $this->mapper->map($response, new Wallpaper());

            return $wallpaper;
        }

        return null;
    }
}

