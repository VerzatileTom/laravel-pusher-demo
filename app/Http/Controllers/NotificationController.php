<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class NotificationController extends Controller
{
    public function index()
    {
    	return view('notification');
    }

    public function notify(Request $request)
    {
    	$notifyText = e($request->input('notify_text'));

    	// TODO: Get Pusher instance from service container
    	$pusher = App::make('pusher');

        // TODO: The notification event data should have a property named 'text'
        $data = ['text'	=>	$notifyText];

        // TODO: On the 'notifications' channel trigger a 'new-notification' event
        $pusher->trigger('notification', 'new-notification', $data);
    }
}
