<?php

use Model\Client;
use Model\Message;

require 'vendor/autoload.php';

spl_autoload_register(function ($classname) {
    $classname = str_replace('\\', '/', $classname);
    require_once(__DIR__ . "/{$classname}.php");
});

/**
 * Class sender
 * @package App
 */
final class Sender
{
    /**
     * @var Client $client
     */
    private Client $client;

    /**
     * sender constructor.
     * @param string|null $host
     */
    public function __construct(string $host = null)
    {
        $this->client = (bool)$host ? new Client($host) : new Client();
    }

    /**
     * @param string $author
     * @param string $comment
     * @return array
     */
    public function sendComment(string $author, string $comment): array
    {
        // Send new comment
        $response = $this->client->request('POST','/comment', [
            'json' => [
                'name' => $author,
                'text' => $comment,
            ]
        ]);

        // Check status code
        if ($response->getStatusCode() !== 200) {
            throw new RuntimeException($response->getStatusCode(), $response->getReasonPhrase());
        }

        // Get response body as array
        $responseBody = json_decode($response->getBody(), true);
    }
}
