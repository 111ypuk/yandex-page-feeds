<?php

namespace ice2038\YandexPages;

/**
 * Interface ChannelInterface
 * @package ice2038\YandexPages
 */
interface TurboChannelInterface
{
    /**
     * Add ad to channel
     * @param string $type Type of Ad Network: Yandex or ADFOX
     * @param string $id Id of Yandex Ad block, if Yandex Ad network used
     * @param string $turboAdId Id of <figure> element in content, in which Ad block should placed
     * @param string $code ADFOX code, if ADFOX used
     * @return ChannelInterface
     */
    public function adNetwork(string $type, string $id = '', string $turboAdId, string $code = ''): ChannelInterface;

    /**
     * Add counter object
     * @param CounterInterface $counter
     * @return ChannelInterface
     */
    public function addCounter(CounterInterface $counter): ChannelInterface;
}
