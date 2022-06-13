<?php

namespace App\Actions;

use App\Models\Context;
use App\Models\Message;
use Illuminate\Support\Str;

class MessageAction
{
    public function execute($data)
    {
        $strings = Str::of(preg_replace('/[^a-zA-Z0-9 ]+/', "", $data['message']))->lower()->split('/[\s,]+/')->toArray();
        $context = Context::whereIn('context', $strings)->first();

        $message = array_merge($data, [
            'context_id' => optional($context)->id
        ]);

        $message = Message::create($message);

        return $message->load('context');
    }
}
