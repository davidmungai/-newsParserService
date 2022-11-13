<?php

namespace App\Message;

final class NewsParser
{
   /**
     * @var object
     */
    private $load;

    /**
     * @return object
     */
    public function getLoad(): object
    {
        return $this->load;
    }

    public function __construct()
    {
    }
}
