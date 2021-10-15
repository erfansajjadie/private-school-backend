<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\MessageRequest;
use App\Http\Resources\Api\v1\MessageResource;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function store(MessageRequest $request)
    {
        $items = $request->validated();
        $items['sender_id'] = $request->user()->id;
        $message = Message::create($items);
        return [
            'success' => true,
            'message' => 'پیام ارسال شد',
            'data' => new MessageResource($message)
        ];
    }

    public function destroy($id)
    {
        $message = Message::findOrFail($id);

        if(($message->sender_id !== Auth::user()->id) && $message->receiver_id !== Auth::user()->id) {
            return [
                'success' => false,
                'message' => 'پیام متعلق به شما نیست'
            ];
        }

        $message->delete();

        return [
            'success' => true,
            'message' => 'پیام حذف شد'
        ];

    }
}
