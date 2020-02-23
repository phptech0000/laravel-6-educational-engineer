<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Session;
use App\message;
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
        $session = '';
        $table = DB::table('sessions');
        $user = auth()->user();
        $collection_one = $table->where('sender_id', $user->id)->where('receiver_id', $request->receiver_id)
                        ->orWhere('sender_id', $request->receiver_id)->where('receiver_id', $user->id)->get();
        if ($collection_one->count() > 0) {
            $session = $collection_one->first();
            event(new SessionEvent($session, $user));
        } else {
            $session = new Session;
            $session->sender_id = $user->id;
            $session->receiver_id = $request->input('receiver_id');
            event(new SessionEvent($session, $user));
            $session->save();
        }
        return response()->json($session);
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
        $message->SessionForReceive($session->id, $user);
        event(new UserMessageEvent($chat, $message));
       
        return response()->json(['message'=>$session->messages,
            'chats'=>$message->chats]);
    }

    private function getTime() {
        $date = now()->timezone('egypt');
        $format = "d/m/y-H:i";
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
        return response()->json(['session'=>$session]);
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

}
