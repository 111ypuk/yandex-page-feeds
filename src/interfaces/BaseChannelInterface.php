<?php

namespace ice2038\yandex_feeds\interfaces;

use ice2038\yandex_feeds\turbo\SimpleXMLElement;

/**
 * Interface ChannelInterface
 * @package ice2038\YandexTurboPages
 */
interface BaseChannelInterface
{
    /**
     * Set channel title
     * @param string $title
     * @return BaseChannelInterface
     */
    public function title(string $title): BaseChannelInterface;

    /**
     * Set channel URL
     * @param string $link
     * @return BaseChannelInterface
     */
    public function link(string $link): BaseChannelInterface;

    /**
     * Set channel description
     * @param string $description
     * @return BaseChannelInterface
     */
    public function description(string $description): BaseChannelInterface;

    /**
     * Set ISO 639-1 language code
     * @param string $language
     * @return BaseChannelInterface
     */
    public function language(string $language): BaseChannelInterface;

    /**
     * Add ad to channel
     * @param string $type Type of Ad Network: Yandex or ADFOX
     * @param string $id Id of Yandex Ad block, if Yandex Ad network used
     * @param string $turboAdId Id of <figure> element in content, in which Ad block should placed
     * @param string $code ADFOX code, if ADFOX used
     * @return BaseChannelInterface
     */
    public function adNetwork(string $type, string $id = '', string $turboAdId, string $code = ''): BaseChannelInterface;

    /**
     * Return XML object
     * @return SimpleXMLElement
     */
    public function asXML(): SimpleXMLElement;
}
