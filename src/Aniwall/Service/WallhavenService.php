<?php

namespace Aniwall\Service;

use GuzzleHttp\Client as HttpClient;

/**
 * Class WallhavenService
 */
class WallhavenService
{
    const URI         = 'https://wallhaven-api.now.sh';
    const URI_SEARCH  = 'https://wallhaven-api.now.sh/search?keyword="%s"';
    const URI_DETAILS = 'https://wallhaven-api.now.sh/details/%s';

    /** @var HttpClient */
    private $httpClient;

    /**
     * WallhavenService constructor.
     */
    public function __construct()
    {
        $this->httpClient = new HttpClient();
    }

    /**
     * @param string $search
     *
     * @return \GuzzleHttp\Message\FutureResponse|\GuzzleHttp\Message\ResponseInterface|\GuzzleHttp\Ring\Future\FutureInterface|null
     */
    public function search(string $search)
    {
        $uriSearch = sprintf(self::URI_SEARCH, $search);
        $req       = $this->httpClient->createRequest('GET', $uriSearch);
        $response  = $this->httpClient->send($req);

        return $response;
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

