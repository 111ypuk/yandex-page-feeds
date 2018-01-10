<?php

namespace ice2038\YandexPages;

/**
 * Class Item
 * @package ice2038\YandexPages
 */
class ZenItem extends AbstractItem implements ItemInterface, ZenItemInterface
{
    const RATING_ADULT = 'adult';
    const RATING_NON_ADULT = 'nonadult';

    /** @var string */
    protected $title;

    /** @var string */
    protected $link;

     /** @var string */
    protected $pdalink;

     /** @var string */
    protected $amplink;

    /** @var string */
    protected $mediaRating;

    /** @var int */
    protected $pubDate;

    /** @var string */
    protected $author;

    /** @var string */
    protected $category;

    /** @var EnclosureInterface[] */
    protected $enclosures;

    /** @var string */
    protected $description;

    /** @var string */
    protected $contentEncoded;

    public function title(string $title): ItemInterface
    {
        $title = (mb_strlen($title) > 240) ? mb_substr($title, 0, 239) . '…' : $title;
        $this->title = $title;
        return $this;
    }

    public function link(string $link): ItemInterface
    {
        $this->link = $link;
        return $this;
    }

    public function category(string $category): ItemInterface
    {
        $this->category = $category;
        return $this;
    }

    public function pubDate(int $pubDate): ItemInterface
    {
        $this->pubDate = $pubDate;
        return $this;
    }

    public function author(string $author): ItemInterface
    {
        $this->author = $author;
        return $this;
    }

    public function appendTo(ChannelInterface $channel): ItemInterface
    {
        $channel->addItem($this);
        return $this;
    }

    public function mediaRating(string $mediaRating): ZenItemInterface
    {
        $this->mediaRating = $mediaRating;
        return $this;
    }

    public function addEnclosure(EnclosureInterface $enclosure): ZenItemInterface
    {
        $this->enclosures[] = $enclosure;
        return $this;
    }

    public function contentEncoded(string $contentEncoded): ZenItemInterface
    {
        $this->contentEncoded = $contentEncoded;
        return $this;
    }

    public function description(string $description): ZenItemInterface
    {
        $this->description = $description;
        return $this;
    }

    public function asXML(): SimpleXMLElement
    {
        $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8" ?><item></item>', LIBXML_NOERROR | LIBXML_ERR_NONE | LIBXML_ERR_FATAL);

        $xml->addChild('title', $this->title);
        $xml->addChild('link', $this->link);
        if (!empty($this->pdalink)) {
            $xml->addChild('pdalink', $this->pdalink);
        }
        if (!empty($this->amplink)) {
            $xml->addChild('amplink', $this->amplink);
        }
        $xml->addChild('xmlns:media:rating', $this->mediaRating);
        $xml->addChild('pubDate', date(DATE_RSS, $this->pubDate));

        if (!empty($this->author)) {
            $xml->addChild('author', $this->author);
        }
        if (!empty($this->category)) {
            $xml->addChild('category', $this->category);
        }

        foreach ($this->enclosures as $enclosure) {
            $toDom = dom_import_simplexml($xml);

            $fromDom = dom_import_simplexml($enclosure->asXML());

            $toDom->appendChild($toDom->ownerDocument->importNode($fromDom, true));
        }

        $xml->addCdataChild('description', $this->description);
        $xml->addCdataChild('xmlns:content:encoded', $this->contentEncoded);

        return $xml;
    }
}
