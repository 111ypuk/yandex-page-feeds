<?php

namespace ice2038\YandexPages;

/**
 * Interface EnclosureInterface
 * @package ice2038\YandexPages
 */
class Enclosure implements EnclosureInterface
{
    private $type;
    private $url;

    public function __construct(string $type, string $url)
    {
        $this->type = $type;
        $this->url = $url;
    }

    public function appendTo(ZenItemInterface $item): EnclosureInterface
    {
        $item->addEnclosure($this);
        return $this;
    }

    public function asXML(): SimpleXMLElement
    {
        $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8" ?><enclosure url="'
            . $this->url . '"  type="' . $this->type . '"/>',
            LIBXML_NOERROR | LIBXML_ERR_NONE | LIBXML_ERR_FATAL);

        return $xml;
    }
}