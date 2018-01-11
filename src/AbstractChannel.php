<?php

namespace ice2038\YandexPages;


class AbstractChannel
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
}