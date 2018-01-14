<?php
require_once '../vendor/autoload.php';

use Tabix\Flickr\Flickr;
use Tabix\Flickr\Request;

$f = new Flickr('81e7e11aeac57ac668609d316f6388ce');

$result = $f->send(new Request([
    'method' => 'flickr.photos.getInfo',
    'photo_id' => '251875545'
]));

var_dump($result);
