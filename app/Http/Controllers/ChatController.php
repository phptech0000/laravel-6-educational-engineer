<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Session;
use App\message;
use App\Chat;
use App\Events\UserMessageEvent;
use App\Events\SessionEvent;
use DB;
use Carbon\Carbon;

class ChatController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $user = auth()->user();
        $users = $user->all();

        return view('user.chat_index', compact('user', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
//open session
    public function createSession(Request $request) {
        $user = auth()->user();
        $collection = Session::where('sender_id', $user->id)->where('receiver_id', $request->receiver_id)
                        ->orWhere('sender_id', $request->receiver_id)->where('receiver_id', $user->id)->get();


        if ($collection->count() > 0) {
            $session = $collection->first();
            broadcast(new SessionEvent($session, $user))->toOthers();
            return response()->json($session);
        } else {
            $session = new Session;
            $session->sender_id = $user->id;
            $session->receiver_id = $request->input('receiver_id');
            $session->save();
            event(new SessionEvent($session, $user));
            return response()->json($session);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function send(Session $session, Request $request) {
        $request->validate(['message' => 'required|string|max:255']);
        $message = new message;
        $message->message = $request->input('message');
        $message->messageTime = $this->getTime();
        $session->messages()->save($message);
        $chat = $message->SessionForSend($session->id);
        $user = User::find($request->input('receiver_id'));
        $chatReceive = $message->SessionForReceive($session->id, $user);
        broadcast(new UserMessageEvent($chat, $message))->toOthers();
        $data = [
            'chat' => $chat,
            'message' > $message
        ];
        return response()->json($data);
    }

    private function getTime() {
        $date = now()->timezone('egypt');
        $format = "d/m/Y-H:i";
        $dateFormat = Carbon::createFromFormat('Y-m-d H:i:s', $date)->format($format);
        $DateTime = strtoupper($dateFormat);
        return $DateTime;
    }

    public function getsession($sender_id, $receiver_id) {
        $table = DB::table('sessions');
        $session = $collection_one = $table
                        ->where('sender_id', $sender_id)
                        ->where('receiver_id', $receiver_id)
                        ->orWhere('sender_id', $receiver_id)
                        ->where('receiver_id', $sender_id)
                        ->get()->first();
        return response()->json(['session' => $session]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
//
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
//
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
//
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
//
    }

    public function unReadMessages($id) {
        $you_id = auth()->user()->id;
        $session = Session::where('sender_id', $you_id)
                ->where('receiver_id', $id)
                ->orWhere('sender_id', $id)
                ->where('receiver_id', $you_id)
                ->first();
        if ($session) {
            $ChatsForReceive = Chat::where('session_id', $session->id)->where('user_id', $id)->where('type', 0)->where('read', 0)->get();
            $chat = Chat::latest()->where('session_id', $session->id)->where('user_id', $id)->where('type', 0)->where('read', 0)->first();
            $message = message::where('id', $chat->message_id)->first();
            $data = [
                'ChatsForReceive' => $ChatsForReceive,
                'Message' => $message,
            ];
            return response()->json($data);
        } 
    }

}
