<?php

namespace ice2038\YandexPages;

/**
 * Interface TurboItemInterface
 * @package ice2038\YandexPages
 */
interface TurboItemInterface
{
    /**
     * Set turbo mode
     * @param bool $turbo
     */
    public function __construct(bool $turbo);

    /**
     * Set page content
     * @param string $turboContent
     * @return TurboItemInterface
     */
    public function turboContent(string $turboContent): TurboItemInterface;

    /**
     * Add list of related items to item
     * @param RelatedItemsListInterface $relatedItemsList
     * @return TurboItemInterface
     */
    public function addRelatedItemsList(RelatedItemsListInterface $relatedItemsList): TurboItemInterface;

}
