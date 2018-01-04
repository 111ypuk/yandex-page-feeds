<?php

namespace ice2038\yandex_feeds\interfaces;

/**
 * Interface FeedInterface
 * @package ice2038\YandexTurboPages
 */
interface TurboFeedInterface
{
    /**
     * Add channel
     * @param TurboChannelInterface $channel
     * @return BaseFeedInterface.php
     */
    public function addChannel(TurboChannelInterface $channel): BaseFeedInterface;
}
