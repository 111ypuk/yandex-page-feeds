<?php

namespace ice2038\yandex_feeds\turbo;

use ice2038\yandex_feeds\turbo\interfaces\ItemInterface;
use ice2038\yandex_feeds\turbo\interfaces\RelatedItemInterface;
use ice2038\yandex_feeds\turbo\interfaces\RelatedItemsListInterface;

/**
 * Class RelatedItemsList
 * @package ice2038\YandexTurboPages
 */
class RelatedItemsList implements RelatedItemsListInterface
{
    /** @var RelatedItemInterface[] */
    protected $relatedItems = [];

    public function appendTo(ItemInterface $item): RelatedItemsListInterface
    {
        $item->addRelatedItemsList($this);
        return $this;
    }

    public function addItem(RelatedItem $relatedItem): RelatedItemsListInterface
    {
        $this->relatedItems[] = $relatedItem;
        return $this;
    }

    public function asXML(): SimpleXMLElement
    {
        $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8" ?><yandex:related></yandex:related>', LIBXML_NOERROR | LIBXML_ERR_NONE | LIBXML_ERR_FATAL);

        foreach ($this->relatedItems as $item) {
            $toDom = dom_import_simplexml($xml);
            $fromDom = dom_import_simplexml($item->asXML());
            $toDom->appendChild($toDom->ownerDocument->importNode($fromDom, true));
        }

        return $xml;
    }
}
