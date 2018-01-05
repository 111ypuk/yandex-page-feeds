<?php

use ice2038\YandexPages\Channel;
use ice2038\YandexPages\Counter;
use ice2038\YandexPages\Feed;
use ice2038\YandexPages\Item;
use ice2038\YandexPages\RelatedItem;
use ice2038\YandexPages\RelatedItemsList;

include 'vendor/autoload.php';

$feed = new Feed();

// creates Channel with description and one ad from Yandex Ad Network
$channel = new Channel();
$channel
    ->title('Channel Title')
    ->link('http://blog.example.com')
    ->description('Channel Description')
    ->language('ru')
    ->adNetwork(Channel::AD_TYPE_YANDEX, 'RA-123456-7', 'first_ad_place')
    ->appendTo($feed);

$googleCounter = new Counter(Counter::TYPE_GOOGLE_ANALYTICS, 'XX-1234567-89');
$googleCounter->appendTo($channel);

// adds Yandex Metrika to feed
$yandexCounter = new Counter(Counter::TYPE_YANDEX, 12345678);
$yandexCounter->appendTo($channel);

$item = new Item();
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
$item = new Item(false);
$item
    ->title('Second page!')
    ->link('http://www.example.com/page2.html')
    ->author('John Smith')
    ->category('Technology')
    ->turboContent('Yet another content here!')
    ->pubDate(strtotime('Tue, 21 Aug 2012 19:50:37 +0900'))
    ->appendTo($channel);

// displays the generated feed
echo $feed;


//use ice2038\yandex_feeds\news\{
//    Feed, Channel, Counter, Item, RelatedItemsList, RelatedItem
//};
//
//$feed = new Feed();
//
//// creates Channel with description and one ad from Yandex Ad Network
//$channel = new Channel();
//$channel
//    ->title('Channel Title')
//    ->link('http://blog.example.com')
//    ->description('Channel Description')
//    ->language('ru')
//    ->adNetwork(Channel::AD_TYPE_YANDEX, 'RA-123456-7', 'first_ad_place')
//    ->appendTo($feed);
//
//$googleCounter = new Counter(Counter::TYPE_GOOGLE_ANALYTICS, 'XX-1234567-89');
//$googleCounter->appendTo($channel);
//
//// adds Yandex Metrika to feed
//$yandexCounter = new Counter(Counter::TYPE_YANDEX, 12345678);
//$yandexCounter->appendTo($channel);
//
//$item = new Item();
//$item
//    ->title('Thirst page!')
//    ->link('http://www.example.com/page1.html')
//    ->author('John Smith')
//    ->category('Technology')
//    ->turboContent('Some content here!<br>Second content string.')
//    ->pubDate(strtotime('Tue, 21 Aug 2012 19:50:37 +0900'))
//    ->appendTo($channel);
//
//// creates list of related pages
//$relatedItemsList = new RelatedItemsList();
//
//// adds link to first related page
//$relatedItem = new RelatedItem('Related article 1', 'http://www.example.com/related1.html');
//$relatedItem->appendTo($relatedItemsList);
//
//// adds link to second related page with image
//$relatedItem = new RelatedItem('Related article 2', 'http://www.example.com/related2.html',
//    'http://www.example.com/related2.jpg');
//$relatedItem->appendTo($relatedItemsList);
//
//// appends list of related links to first page
//$relatedItemsList
//    ->appendTo($item);
//
//// creates another one page with disabled turbo
//$item = new Item(false);
//$item
//    ->title('Second page!')
//    ->link('http://www.example.com/page2.html')
//    ->author('John Smith')
//    ->category('Technology')
//    ->turboContent('Yet another content here!')
//    ->pubDate(strtotime('Tue, 21 Aug 2012 19:50:37 +0900'))
//    ->appendTo($channel);
//
//// displays the generated feed
//echo $feed;

