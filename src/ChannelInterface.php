<?php

namespace ice2038\YandexPages;

/**
 * Interface ChannelInterface
 * @package ice2038\YandexPages
 */
interface ChannelInterface
{
    /**
     * Set channel title
     * @param string $title
     * @return ChannelInterface
     */
    public function title(string $title): ChannelInterface;

    /**
     * Set channel URL
     * @param string $link
     * @return ChannelInterface
     */
    public function link(string $link): ChannelInterface;

    /**
     * Set channel description
     * @param string $description
     * @return ChannelInterface
     */
    public function description(string $description): ChannelInterface;

    /**
     * Set ISO 639-1 language code
     * @param string $language
     * @return ChannelInterface
     */
    public function language(string $language): ChannelInterface;

    /**
     * Add item object
     * @param ItemInterface $item
     * @return ChannelInterface
     */
    public function addItem(ItemInterface $item): ChannelInterface;

    /**
     * Append to feed
     * @param FeedInterface $feed
     * @return ChannelInterface
     */
    public function appendTo(FeedInterface $feed): ChannelInterface;

    /**
     * Return XML object
     * @return SimpleXMLElement
     */
    public function asXML(): SimpleXMLElement;
}
