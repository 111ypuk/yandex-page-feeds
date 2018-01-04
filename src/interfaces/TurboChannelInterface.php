<?php

namespace ice2038\yandex_feeds\interfaces;

/**
 * Interface ChannelInterface
 * @package ice2038\YandexTurboPages
 */
interface TurboChannelInterface
{
    /**
     * Add item object
     * @param ItemInterface $item
     * @return TurboChannelInterface
     */
    public function addItem(ItemInterface $item): TurboChannelInterface;

    /**
     * Add counter object
     * @param CounterInterface $counter
     * @return TurboChannelInterface
     */
    public function addCounter(CounterInterface $counter): TurboChannelInterface;

    /**
     * Append to feed
     * @param TurboFeedInterface $feed
     * @return TurboChannelInterface
     */
    public function appendTo(TurboFeedInterface $feed): TurboChannelInterface;
}
