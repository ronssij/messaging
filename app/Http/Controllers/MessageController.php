<?php

namespace App\Http\Controllers;

use App\Actions\MessageAction;
use App\Http\Requests\MessageRequest;
use App\Http\Resources\MessageResource;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return MessageResource
     */
    public function index()
    {
        $messages = Message::paginate((int) request('limit', 100));

        return MessageResource::collection($messages);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  MessageRequest  $request
     * @return MessageResource
     */
    public function store(MessageRequest $request, MessageAction $messageAction)
    {
        $message = $messageAction->execute($request->validated());

        return MessageResource::make($message);
    }
}
