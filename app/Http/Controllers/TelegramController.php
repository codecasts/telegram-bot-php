<?php

namespace CodecastsRobot\Http\Controllers;

use Telegram\Bot\Api;

class TelegramController extends Controller
{
    /**
     * @var \Telegram\Bot\Api
     */
    protected $telegram;

    /**
     * @var \Telegram\Bot\Objects\Update
     */
    protected $update;

    /**
     * @var \Telegram\Bot\Objects\Message
     */
    protected $message;

    /**
     * @var \Telegram\Bot\Objects\Chat
     */
    protected $chat;

    /**
     * TelegramController constructor.
     *
     * @param Api $telegram
     */
    public function __construct(Api $telegram)
    {
        $this->telegram = $telegram;

        if (!is_null($this->telegram)) {
            $this->update = $this->telegram->getWebhookUpdates();

            if (!is_null($this->update)) {
                $this->message = $this->update->getMessage();

                if (!is_null($this->message)) {
                    $this->chat = $this->message->getChat();
                }
            }
        }
    }

    /**
     * Treating updates
     */
    public function webhook()
    {
        if (!is_null($this->chat)) {
            // register info about chat
        }
    }
}
