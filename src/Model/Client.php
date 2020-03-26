<?php

namespace App\Model;

use GuzzleHttp\Client as GuzzleClient;

/**
 * Class Client
 * @package Model
 */
final class Client extends GuzzleClient
{
    /**
     * Client constructor.
     * @param array $config
     */
    private function __construct(array $config = [])
    {
        parent::__construct($config);
    }

    /**
     * @return static
     */
    public static function create(): self
    {
        return new Client(
            [
                // Base URI is used with relative requests
                'base_uri' => 'http://example.com',
                // You can set any number of default request options.
                'timeout' => 2.0,
            ]
        );
    }
}
