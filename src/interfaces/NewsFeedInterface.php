<?php

namespace ice2038\yandex_feeds\interfaces;

/**
 * Interface FeedInterface
 * @package ice2038\YandexTurboPages
 */
interface NewsFeedInterface
{
    /**
     * Add channel
     * @param NewsChannelInterface $channel
     * @return BaseFeedInterface.php
     */
    public function addChannel(NewsChannelInterface $channel): BaseFeedInterface;
}
