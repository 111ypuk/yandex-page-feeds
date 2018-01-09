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
}
