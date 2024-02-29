<?php

namespace App\Http\Controllers\SpecialServices;

use App\Events\ForumSent;
use App\Events\MessageSent;
use App\Http\Controllers\Controller;
use App\Models\Forum;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OnlineConsultationController extends Controller
{
    public function showOnlineConsultation() {
        $doctors = DB::table('users')->where('peran', 'dokter')->get();

        return view('special_services.online_consultation', compact('doctors'));
    }

    public function showDialogPrivateMessage($id) {
        $userId = session()->has('users_data') ? session('users_data')->id : null;

        $doctor = DB::table('users')->where('id', $id)->first();
        
        return view('special_services.private_forum', compact('doctor'));
    }

    public function showDialogPrivateMessageUser($id) {
        $userId = session()->has('users_data') ? session('users_data')->id : null;

        $doctor = DB::table('users')->where('id', $id)->first();
        
        return view('special_services.private_forum', compact('doctor'));
    }

    public function sendMessage(Request $request) {
        $userId = session()->has('users_data') ? session('users_data')->id : null;
        $recipientId = $request->to;

        // Deklarasi chat_id
        $chat_id = $userId < $recipientId ? $userId . '-' . $recipientId : $recipientId . '-' . $userId;

        $message = new Message();
        $message->from = $userId;
        $message->to = $recipientId;
        $message->content = $request->content;
        $message->chat_id = $chat_id;
        $message->save();

        event(new MessageSent($message));

        return response()->json(['status' => 'Message Sent!', 'message' => $message]);
    }

    public function getMessages($recipientId) {
        $userId = session()->has('users_data') ? session('users_data')->id : null;

        // Deklarasi chat_id
        $chatId = $userId < $recipientId ? $userId . '-' .$recipientId : $recipientId . '-' . $userId;

        $messages = DB::table('messages')->where('chat_id', $chatId)->get();
        return response()->json($messages);
    }

    public function showAllUsersWithLastMessage() {
        $userId = session()->has('users_data') ? session('users_data')->id : null;
    
        $toValues = DB::table('messages')
            ->where('to', $userId)
            ->distinct()
            ->pluck('from');
    
        $users = [];
        foreach ($toValues as $to) {
            $user = DB::table('users')->where('id', $to)->first();
            $lastMessage = DB::table('messages')
                ->where('from', $userId)
                ->where('to', $to)
                ->orWhere('from', $to)
                ->where('to', $userId)
                ->orderBy('created_at', 'desc')
                ->first();
            
            $oppositeUserId = $lastMessage->from == $userId ? $lastMessage->to : $lastMessage->from;
    
            $users[] = [
                'id' => $user->id,
                'nama' => $user->nama,
                'last_message' => $lastMessage ? $lastMessage->content : null,
                'last_message_time' => $lastMessage ? $lastMessage->created_at : null,
                'opposite_user_id' => $oppositeUserId,
            ];
        }

        return view('special_services.show_messages', compact('users'));

    }

    public function showForumDiscussion() {
        return view('special_services.discussion_forum');
    }

    public function sendMessageDiscussion(Request $request) {
        $userId = session()->has('users_data') ? session('users_data')->id : null;

        $message = new Forum();
        $message->from = $userId;
        $message->content = $request->content;
        $message->nama = $request->nama;
        $message->save();

        event(new ForumSent($message));

        return response()->json(['status' => 'Message Sent!', 'message' => $message]);
    }

    public function getMessagesForum() {
        $messages = DB::table('forums')->get();
        return response()->json($messages);
    }
}
