<?php

namespace Model;

/**
 * Class Message
 * @package Model
 */
class Message
{
    /** @var int $id */
    private int $id;
    /** @var string $name */
    private string $name;
    /** @var string $text */
    private string $text;

    /**
     * Message static crate method
     *
     * @param string $name
     * @param string $text
     * @return self
     */
    public static function create(string $name, string $text): self
    {
        $message = new static();

        $message->name = $name;
        $message->text = $text;

        return $message;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText(string $text): void
    {
        $this->text = $text;
    }
}
