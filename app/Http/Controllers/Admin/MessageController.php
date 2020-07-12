<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{

    public function index()
    {
        $messages = Message::orderBy('id', 'DESC')->paginate(25);

        return view('admin.messages.index', [
            'messages' => $messages
        ]);
    }

    public function show(Message $message)
    {
        if( !$message->seen ) {
            $message->update([
                'seen' => 1
            ]);
        }



        return view('admin.messages.show')->withMessage($message);
    }
}
