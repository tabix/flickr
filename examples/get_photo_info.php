<?php
require_once '../vendor/autoload.php';

use Tabix\Flickr\Flickr;

$f = new Flickr('81e7e11aeac57ac668609d316f6388ce');

$result = $f->requestSend(
    'flickr.photos.getInfo',
    [
        'photo_id' => '251875545'
    ]
);

var_dump($result);
