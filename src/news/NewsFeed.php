<?php

namespace ice2038\yandex_feeds\news;

use DOMDocument;
use ice2038\yandex_feeds\interfaces\BaseChannelInterface;
use ice2038\yandex_feeds\interfaces\BaseFeedInterface;
use ice2038\yandex_feeds\interfaces\NewsFeedInterface;
use ice2038\yandex_feeds\turbo\SimpleXMLElement;

/**
 * Class Feed
 * @package ice2038\YandexTurboPages
 */
class NewsFeed implements BaseFeedInterface, NewsFeedInterface
{
    const ENCODING_UTF_8 = 'UTF-8';
    const ENCODING_WINDOWS_1251 = 'windows-1251';
    const ENCODING_KOI8_R = 'KOI8-R';

    /** @var BaseChannelInterface[] */
    protected $channels = [];

    private $encoding;

    public function __construct(string $encoding = self::ENCODING_UTF_8)
    {
        $this->encoding = $encoding;
    }

    public function addChannel(BaseChannelInterface $channel): NewsFeedInterface
    {
        $this->channels[] = $channel;
        return $this;
    }

    public function render(): string
    {
        $xml = new SimpleXMLElement('<?xml version="1.0" encoding="' . $this->encoding
            . '" ?><rss version="2.0" xmlns:yandex="http://news.yandex.ru" xmlns:media="http://search.yahoo.com/mrss/" />');

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

    public function __toString(): string
    {
        return $this->render();
    }
}
