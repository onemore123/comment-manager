<?php

namespace App\Service;

use App\Model\Client;
use App\Model\Message;

/**
 * Class MessengerService
 * @package Service
 */
class MessengerService
{
    /** @var Client */
    private $client;

    /**
     * MessengerService constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function sendComment(Message $message): void
    {
        //todo
    }
}
