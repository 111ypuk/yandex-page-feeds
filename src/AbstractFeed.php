<?php

namespace ice2038\YandexPages;


abstract class AbstractFeed implements FeedInterface
{
    const ENCODING_UTF_8 = 'UTF-8';
    const ENCODING_WINDOWS_1251 = 'windows-1251';
    const ENCODING_KOI8_R = 'KOI8-R';

    /** @var ChannelInterface[] */
    protected $channels = [];

    private $encoding;

    public function __construct(string $encoding = self::ENCODING_UTF_8)
    {
        $this->encoding = $encoding;
    }

    protected function getEncoding(): string
    {
        return $this->encoding;
    }

    public function __toString(): string
    {
        return $this->render();
    }
}