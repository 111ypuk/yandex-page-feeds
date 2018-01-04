<?php

namespace ice2038\yandex_feeds\turbo\interfaces;

use ice2038\yandex_feeds\turbo\RelatedItem;
use ice2038\yandex_feeds\turbo\SimpleXMLElement;

/**
 * Interface RelatedItemsListInterface
 * @package ice2038\YandexTurboPages
 */
interface RelatedItemsListInterface
{
    /**
     * Append related items list to the item
     * @param ItemInterface $item
     * @return RelatedItemsListInterface
     */
    public function appendTo(ItemInterface $item): RelatedItemsListInterface;

    /**
     * Add related item object
     * @param RelatedItem $relatedItem
     * @return RelatedItemsListInterface
     */
    public function addItem(RelatedItem $relatedItem): RelatedItemsListInterface;

    /**
     * Return XML object
     * @return SimpleXMLElement
     */
    public function asXML(): SimpleXMLElement;
}
