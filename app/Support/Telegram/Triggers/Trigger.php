<?php

namespace CodecastsRobot\Support\Telegram\Triggers;

use CodecastsRobot\Support\Telegram\BaseController as Telegram;
use Telegram\Bot\Api;

abstract class Trigger extends Telegram
{
    /**
     * @var Api
     */
    protected $telegram;

    /**
     * @var array
     */
    protected $triggers = [];
    protected $messages = [];

    /**
     * Trigger constructor.
     *
     * @param Api $telegram
     */
    public function __construct(Api $telegram)
    {
        parent::__construct($telegram);

        if ($this->hasTrigger()) {
            $this->handle();
        }
    }

    protected function handle() {
        $this->run();
        $this->handleMessages();
    }

    protected function handleMessages()
    {
        $messages = collect($this->messages);

        if (!$messages->isEmpty()) {
            $this->telegram->sendMessage([
                'chat_id' => $this->chat->getId(),
                'text' => $messages->random(),
            ]);
        }
    }

    /**
     * @return bool
     */
    protected function hasTrigger()
    {
        if (!is_null($message = $this->message->getText())) {
            return $this->hasMach($message, $this->triggers);
        }

        return false;
    }

    /**
     * @param $haystack
     * @param $needles
     *
     * @return bool
     */
    protected function hasMach($haystack, $needles)
    {
        $needles = array_map('strtolower', $needles);

        return str_contains(strtolower($haystack), $needles);
    }

    /**
     * Action to take if there is a trigger.
     *
     * @return mixed
     */
    protected function run() {
        // NOTHING
        return null;
    }
}