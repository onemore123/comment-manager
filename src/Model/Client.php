<?php

namespace Model;

use GuzzleHttp\Client as GuzzleClient;

/**
 * Class Client
 * @package Model
 */
final class Client extends GuzzleClient
{
    /** @var string base URL for the client */
    public const BASE_URL = 'http://example.com';

    /**
     * Client constructor.
     * @param string|null $url
     */
    public function __construct(string $url = null)
    {
        $baseUrl = ($url === null) ? 'http://example.com' : $url;
        parent::__construct(
            [
                // Base URI is used with relative requests
                'base_uri' => $baseUrl,
                // You can set any number of default request options.
                'timeout' => 2.0,
            ]
        );
    }
}
