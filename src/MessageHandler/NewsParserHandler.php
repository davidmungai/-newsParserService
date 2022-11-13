<?php

namespace App\MessageHandler;

use App\Message\NewsParser;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

final class NewsParserHandler implements MessageHandlerInterface
{
    public function __invoke(NewsParser $message)
    {
        // do something with your message
    }
}
