<?php

namespace ice2038\YandexPages;

/**
 * Interface RelatedItemsListInterface
 * @package ice2038\YandexPages
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
