<?php

namespace CodecastsRobot\Support\Telegram\Triggers;

class StartTrigger extends Trigger
{
    protected $triggers = [
        '/start',
    ];

    protected $messages = [
        'Olá! Isto é um teste.',
    ];
}