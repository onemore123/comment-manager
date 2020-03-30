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
    /** @var float default timeout value */
    public const DEFAULT_TIMEOUT = 2.0;

    /**
     * Client constructor.
     * @param string|null $host
     */
    public function __construct(string $host = null)
    {
        $baseUrl = ($host === null) ? self::BASE_URL : $host;
        parent::__construct(
            [
                // Base URI is used with relative requests
                'base_uri' => $baseUrl,
                // You can set any number of default request options.
                'timeout' => self::DEFAULT_TIMEOUT,
            ]
        );
    }
}
