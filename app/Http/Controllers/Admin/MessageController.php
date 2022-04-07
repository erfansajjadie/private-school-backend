<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::with(['sender' , 'receiver'])->orderBy('id', 'desc')->paginate(20);

        return view('admin.message.message-list', compact('messages'));
    }

    public function destroy($id)
    {
        Message::findOrFail($id)->delete();

        return [
            'success' => true,
            'message' => 'پیام با موفقیت حذف شد.'
        ];

    }
}
