<?php

namespace ice2038\YandexPages;

/**
 * Interface FeedInterface
 * @package ice2038\YandexPages
 */
interface FeedInterface
{
    /**
     * Add channel
     * @param ChannelInterface $channel
     * @return FeedInterface
     */
    public function addChannel(ChannelInterface $channel): FeedInterface;

    /**
     * Render XML
     * @return string
     */
    public function render(): string ;

    /**
     * Render XML
     * @return string
     */
    public function __toString(): string ;
}
