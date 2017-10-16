<?php

namespace Aniwall\Service;

use GuzzleHttp\Client as HttpClient;

class WallhavenService
{
    const URI = 'https://wallhaven-api.now.sh';
    const URI_SEARCH = 'https://wallhaven-api.now.sh/search?keyword="%s"';
    const URI_DETAILS = 'https://wallhaven-api.now.sh/details/%s';

    /** @var HttpClient */
    private $httpClient;

    public function __construct()
    {
        $this->httpClient = new HttpClient();
    }

    public function search(string $search)
    {
        $uriSearch = sprintf(self::URI_SEARCH, $search);
        $req = $this->httpClient->createRequest('GET', $uriSearch);
        $response = $this->httpClient->send($req);
        return $response;
    }

    public function get(int $id)
    {
        $uriDetails = sprintf(self::URI_DETAILS, $id);
        $req = $this->httpClient->createRequest('GET', $uriDetails);
        $response = $this->httpClient->send($req);
        return $response;
    }
}

