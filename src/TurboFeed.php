<?php

namespace ice2038\YandexPages;

use DOMDocument;

/**
 * Class Feed
 * @package ice2038\YandexPages
 */
class TurboFeed extends AbstractFeed
{
    public function addChannel(ChannelInterface $channel): FeedInterface
    {
        $this->channels[] = $channel;
        return $this;
    }

    public function render(): string
    {
        $xml = new SimpleXMLElement('<?xml version="1.0" encoding="' . $this->getEncoding()
            . '" ?><rss version="2.0" xmlns:yandex="http://news.yandex.ru" xmlns:media="http://search.yahoo.com/mrss/" xmlns:turbo="http://turbo.yandex.ru" />',
            LIBXML_NOERROR | LIBXML_ERR_NONE | LIBXML_ERR_FATAL);

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
