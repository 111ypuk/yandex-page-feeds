<?php

namespace ice2038\YandexPages;

/**
 * Interface ZenItemInterface
 * @package ice2038\YandexPages
 */
interface ZenItemInterface
{
    /**
     * Add counter object
     * @param EnclosureInterface $enclosure
     * @return ZenItemInterface
     */
    public function addEnclosure(EnclosureInterface $enclosure): ZenItemInterface;

    /**
     * Set item media:rating
     * @param string $mediaRating
     * @return ZenItemInterface
     */
    public function mediaRating(string $mediaRating): ZenItemInterface;

    /**
     * Set item content:encoded
     * @param string $contentEncoded
     * @return ZenItemInterface
     */
    public function contentEncoded(string $contentEncoded): ZenItemInterface;

    /**
     * Set item Sdescription
     * @param string $description
     * @return ZenItemInterface
     */
    public function description(string $description): ZenItemInterface;
}
