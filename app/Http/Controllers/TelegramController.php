<?php

namespace CodecastsRobot\Http\Controllers;

use CodecastsRobot\Support\Telegram\BaseController as Telegram;

class TelegramController extends Telegram
{
    /**
     * Treating updates
     */
    public function webhook()
    {
        if (!is_null($this->chat)) {
            $this->telegram->sendMessage([
                'chat_id' => $this->chat->getId(),
                'text' => 'teste',
            ]);
        }
    }
}
