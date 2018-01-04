<?php

namespace ice2038\yandex_feeds\turbo\interfaces;

use ice2038\yandex_feeds\turbo\SimpleXMLElement;

/**
 * Interface CounterInterface
 * @package ice2038\YandexTurboPages
 */
interface CounterInterface
{
    /**
     * Set counter type and ID
     * @param string $type
     * @param string $id
     */
    public function __construct(string $type, string $id);

    /**
     * Append counter to the channel
     * @param TurboChannelInterface $channel
     * @return $this
     */
    public function appendTo(TurboChannelInterface $channel): CounterInterface;

    /**
     * Return XML object
     * @return SimpleXMLElement
     */
    public function asXML(): SimpleXMLElement;
}