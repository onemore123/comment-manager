<?php

use GuzzleHttp\Psr7\Request;
use Model\Client;
use Psr\Http\Message\ResponseInterface;

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
    public function postComment(string $author, string $comment): array
    {
        // Send new comment
        $response = $this->client->request('POST','/comment', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'name' => $author,
                'text' => $comment,
            ]
        ]);

        return $this->getDecodedResponse($response);
    }

    /**
     * @param string|null $author
     * @return array
     */
    public function getComments(string $author = null): array
    {
        // Set up request parameters
        $headers = ['Accept' => 'application/json'];
        if ($author !== null) {
            $query = ['name' => $author];
        }

        $request = new Request('GET', '/comments', [
            'headers' => $headers,
            'query' => isset($query) ? $query : '',
        ]);

        $response = $this->client->send($request);

        return $this->getDecodedResponse($response);
    }

    /**
     * @param int $id
     * @param string $comment
     * @return array
     */
    public function updateComment(int $id, string $comment)
    {
        //TODO: authenticate
        $url = '/comment/' . $id;
        $request = new Request('PUT', $url, [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'text' => $comment,
            ]
        ]);

        $response = $this->client->send($request);

        return $this->getDecodedResponse($response);
    }

    /**
     * @param ResponseInterface $response
     * @return array
     */
    private function getDecodedResponse(ResponseInterface $response): array
    {
        // Check status code
        if ($response->getStatusCode() !== 200) {
            throw new RuntimeException($response->getStatusCode(), $response->getReasonPhrase());
        }

        // Get response body as array to get the comment id
        return json_decode($response->getBody(), true);
    }
}
