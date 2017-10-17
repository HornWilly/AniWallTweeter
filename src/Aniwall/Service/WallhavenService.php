<?php

namespace Aniwall\Service;

use Aniwall\Model\ListInfoWallpaper;
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
            echo 'Result:'. var_dump($response).PHP_EOL;
            /** @var ListInfoWallpaper $listInfoWallpaper */
            $listInfoWallpaper = $this->mapper->map($response, new ListInfoWallpaper());

            return $listInfoWallpaper;
        }

        return null;
    }

    /**
     * @param int $id
     *
     * @return \GuzzleHttp\Message\FutureResponse|\GuzzleHttp\Message\ResponseInterface|\GuzzleHttp\Ring\Future\FutureInterface|null
     */
    public function get(int $id)
    {
        $uriDetails = sprintf(self::URI_DETAILS, $id);
        $req        = $this->httpClient->createRequest('GET', $uriDetails);
        $response   = $this->httpClient->send($req);

        return $response;
    }
}

