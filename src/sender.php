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
     */
    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * @return string
     */
    public function sendComment(): string
    {
        $response = $this->client->get('http://www.ya.ru');
        return $response->getBody();
    }
}
