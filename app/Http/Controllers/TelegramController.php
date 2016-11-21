<?php

namespace CodecastsRobot\Http\Controllers;

use CodecastsRobot\Support\Telegram\BaseController as Telegram;

class TelegramController extends Telegram
{
    /**
     * @var array
     */
    protected $triggers = [
        \CodecastsRobot\Support\Telegram\Triggers\StartTrigger::class,
    ];

    /**
     * Treating updates
     */
    public function webhook()
    {
        if (!is_null($this->chat)) {
            foreach ($this->triggers as $trigger) {
                new $trigger($this->telegram);
            }
        }
    }
}
