<?php

namespace ice2038\YandexPages;

/**
 * Class RelatedItemsList
 * @package ice2038\YandexPages
 */
class RelatedItemsList extends AbstractRelatedItemsList implements RelatedItemsListInterface
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
