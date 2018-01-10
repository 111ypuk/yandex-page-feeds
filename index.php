<?php
include 'vendor/autoload.php';

use ice2038\YandexPages\{
    Counter, Enclosure, TurboFeed, RelatedItem, RelatedItemsList, TurboChannel, TurboItem, ZenChannel, ZenFeed, ZenItem
};

/**
 * Turbo
 */
$feed = new TurboFeed();

// creates Channel with description and one ad from Yandex Ad Network
$channel = new TurboChannel();
$channel
    ->title('Channel Title')
    ->link('http://blog.example.com')
    ->description('Channel Description')
    ->language('ru')
    ->adNetwork($channel::AD_TYPE_YANDEX, 'RA-123456-7', 'first_ad_place')
    ->appendTo($feed);

$googleCounter = new Counter(Counter::TYPE_GOOGLE_ANALYTICS, 'XX-1234567-89');
$googleCounter->appendTo($channel);

// adds Yandex Metrika to feed
$yandexCounter = new Counter(Counter::TYPE_YANDEX, 12345678);
$yandexCounter->appendTo($channel);

// displays the generated feed
$item = new TurboItem();
$item
    ->title('Thirst page!')
    ->link('http://www.example.com/page1.html')
    ->author('John Smith')
    ->category('Technology')
    ->turboContent('Some content here!<br>Second content string.')
    ->pubDate(strtotime('Tue, 21 Aug 2012 19:50:37 +0900'))
    ->appendTo($channel);

// creates list of related pages
$relatedItemsList = new RelatedItemsList();

// adds link to first related page
$relatedItem = new RelatedItem('Related article 1', 'http://www.example.com/related1.html');
$relatedItem->appendTo($relatedItemsList);

// adds link to second related page with image
$relatedItem = new RelatedItem('Related article 2', 'http://www.example.com/related2.html',
    'http://www.example.com/related2.jpg');
$relatedItem->appendTo($relatedItemsList);

// appends list of related links to first page
$relatedItemsList
    ->appendTo($item);

// creates another one page with disabled turbo
$item = new TurboItem(false);
$item
    ->title('Second page!')
    ->link('http://www.example.com/page2.html')
    ->author('John Smith')
    ->category('Technology')
    ->turboContent('Yet another content here!')
    ->pubDate(strtotime('Tue, 21 Aug 2012 19:50:37 +0900'))
    ->appendTo($channel);

echo $feed;

/**
 * Zen
 */
$feed = new ZenFeed();

$channel = new ZenChannel();
$channel
    ->title('Channel Title')
    ->link('http://blog.example.com')
    ->description('Channel Description')
    ->language('ru')
    ->appendTo($feed);

$item = new ZenItem();
$item
    ->title('Thirst page!')
    ->link('http://www.example.com/page1.html')
    ->mediaRating($item::RATING_NON_ADULT)
    ->author('John Smith')
    ->category('Technology')
    ->description('Desciption<br>Second content string.')
    ->contentEncoded('Some content here!<br>Second content string.')
    ->pubDate(strtotime('Tue, 21 Aug 2012 19:50:37 +0900'))
    ->appendTo($channel);

$enclosure = new Enclosure( 'image/jpeg', 'http://example.com/2023/07/04/pic1.jpg');
$enclosure->appendTo($item);

$item = new ZenItem();
$item
    ->title('Second page!')
    ->link('http://www.example.com/page2.html')
    ->mediaRating($item::RATING_NON_ADULT)
    ->author('John Smith')
    ->category('Technology')
    ->description('Desciption<br>Second content string.')
    ->contentEncoded('Yet another content here!')
    ->pubDate(strtotime('Tue, 21 Aug 2012 19:50:37 +0900'))
    ->appendTo($channel);

$enclosure = new Enclosure( 'image/jpeg', 'http://example.com/2023/07/04/pic1.jpg');
$enclosure->appendTo($item);

// displays the generated feed
echo $feed;