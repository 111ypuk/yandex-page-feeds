<?php

namespace ice2038\YandexPages;

/**
 * Interface ItemInterface
 * @package ice2038\YandexPages
 */
interface ItemInterface
{
    /**
     * Set item title
     * @param string $title
     * @return ItemInterface
     */
    public function title(string $title): ItemInterface;

    /**
     * Set item URL
     * @param string $link
     * @return ItemInterface
     */
    public function link(string $link): ItemInterface;

    /**
     * Set item category
     * @param string $category Category name
     * @return ItemInterface
     */
    public function category(string $category): ItemInterface;

    /**
     * Set published date
     * @param int $pubDate Unix timestamp
     * @return ItemInterface
     */
    public function pubDate(int $pubDate): ItemInterface;

    /**
     * Set the author
     * @param string $author Email of item author
     * @return ItemInterface
     */
    public function author(string $author): ItemInterface;

    /**
     * Append item to the channel
     * @param ChannelInterface $channel
     * @return ItemInterface
     */
    public function appendTo(ChannelInterface $channel): ItemInterface;

    /**
     * Return XML object
     * @return SimpleXMLElement
     */
    public function asXML(): simpleXMLElement;
}
