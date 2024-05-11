<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Distributor;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;

class ChatController extends Controller
{
    public function getDistributors()
    {
        $user = Auth::user();
        if ($user->role == 'Distributor') {
            $contacts = User::where('role','=','Petani')->get();
        } elseif ($user->role == 'Distributor') {
            $contacts = User::where('role','=','Distributor')->get();
        } else {
            abort(403, 'Unauthorized access.');
        }
        // return view('chat', compact('contacts'));
        // dd($contacts);
        return view('chat', [ 
            'title' => 'Chat',  
               'contacts' => $contacts,
            ]);
    }

    public function fetchMessages($receiverId)
    {
        $messages = Message::where('sender_id', auth()->id())
            ->where('receiver_id', $receiverId)
            ->orWhere('sender_id', $receiverId)
            ->where('receiver_id', auth()->id())
            ->orderBy('created_at', 'asc')
            ->get();

        return response()->json($messages);
    }

    public function sendMessage(Request $request)
    {
        $receiverRole = Auth::user()->role == 'Distributor' ? 'Petani' : 'Distributor';
        $receiverUser = User::where('role','=',$receiverRole)->where('id', $request->receiver)->firstOrFail();
        $message = Message::create([
            'sender_id' => Auth::user()->id,  // Misalkan Anda menambahkan 'sender_id' ke skema Message
            'receiver_id' => $receiverUser->id,
            'message' => $request->message
        ]);

        broadcast(new MessageSent($message));
        return response()->json(['status' => 'Message sent successfully']);
    }
}
