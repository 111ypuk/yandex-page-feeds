<?php

namespace ice2038\YandexPages;

/**
 * Class Channel
 * @package ice2038\YandexPages
 */
class ZenChannel extends AbstractChannel implements ChannelInterface
{
    /** @var string */
    protected $title;

    /** @var string */
    protected $link;

    /** @var string */
    protected $description;

    /** @var string */
    protected $language;

    /** @var ItemInterface[] */
    protected $items = [];

    public function title(string $title): ChannelInterface
    {
        $title = (mb_strlen($title) > 240) ? mb_substr($title, 0, 239) . '…' : $title;
        $this->title = $title;
        return $this;
    }

    public function link(string $link): ChannelInterface
    {
        $this->link = $link;
        return $this;
    }

    public function description(string $description): ChannelInterface
    {
        $this->description = $description;
        return $this;
    }

    public function language(string $language): ChannelInterface
    {
        $this->language = $language;
        return $this;
    }

    public function addItem(ItemInterface $item): ChannelInterface
    {
        $this->items[] = $item;
        return $this;
    }

    public function appendTo(FeedInterface $feed): ChannelInterface
    {
        $feed->addChannel($this);
        return $this;
    }

    public function asXML(): SimpleXMLElement
    {
        $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8" ?><channel></channel>');
        $xml->addChild('title', $this->title);
        $xml->addChild('link', $this->link);
        $xml->addChild('description', $this->description);

        if ($this->language !== null) {
            $xml->addChild('language', $this->language);
        }

        foreach ($this->items as $item) {
            $toDom = dom_import_simplexml($xml);
            $fromDom = dom_import_simplexml($item->asXML());
            $toDom->appendChild($toDom->ownerDocument->importNode($fromDom, true));
        }

        return $xml;
    }
}
