<?php

namespace CodecastsRobot\Http\Controllers;

use Telegram\Bot\Api;

class TelegramController extends Controller
{
    /**
     * @var Api
     */
    protected $telegram;

    /**
     * TelegramController constructor.
     *
     * @param Api $telegram
     */
    public function __construct(Api $telegram)
    {
        $this->telegram = $telegram;
    }

    /**
     * Getting updates
     */
    public function webhook()
    {
        // DO NOTHING (YET)
    }
}
