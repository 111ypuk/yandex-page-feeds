<?php

namespace ice2038\YandexPages;

/**
 * Interface EnclosureInterface
 * @package ice2038\YandexPages
 */
interface EnclosureInterface
{
    /**
     * Set enclosure type and url
     * @param string $type
     * @param string $url
     */
    public function __construct(string $type, string $url);

    /**
     * Append enclosure to the item
     * @param ZenItemInterface $item
     * @return $this
     */
    public function appendTo(ZenItemInterface $item): EnclosureInterface;

    /**
     * Return XML object
     * @return SimpleXMLElement
     */
    public function asXML(): SimpleXMLElement;
}