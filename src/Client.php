<?php
namespace Tabix\Flickr;

/**
 * @author Sebastian Arczewski <s.arczewski@gmail.com>
 */
interface Client
{
    /**
     * @param Request $request
     * @return string
     */
    public function send(Request $request);
}
