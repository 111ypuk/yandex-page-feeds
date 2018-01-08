<?php

namespace ice2038\YandexPages;

use DOMDocument;

/**
 * Class Feed
 * @package ice2038\YandexPages
 */
class ZenFeed extends AbstractFeed
{
    public function addChannel(ChannelInterface $channel): FeedInterface
    {
        $this->channels[] = $channel;
        return $this;
    }

    public function render(): string
    {
        $xml = new SimpleXMLElement('<?xml version="1.0" encoding="' . $this->getEncoding()
            . '" ?><rss version="2.0" xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:media="http://search.yahoo.com/mrss/" xmlns:atom="http://www.w3.org/2005/Atom" xmlns:georss="http://www.georss.org/georss"/>');

        foreach ($this->channels as $channel) {
            $toDom = dom_import_simplexml($xml);
            $fromDom = dom_import_simplexml($channel->asXML());
            $toDom->appendChild($toDom->ownerDocument->importNode($fromDom, true));
        }

        $dom = new DOMDocument('1.0', 'UTF-8');
        $dom->appendChild($dom->importNode(dom_import_simplexml($xml), true));
        $dom->formatOutput = true;
        return $dom->saveXML();
    }
}
