<?php

namespace ice2038\yandex_feeds\interfaces;

/**
 * Interface FeedInterface
 * @package ice2038\YandexTurboPages
 */
interface BaseFeedInterface
{
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
