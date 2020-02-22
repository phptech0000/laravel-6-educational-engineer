<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Session;
use App\message;
use App\Events\UserMessageEvent;
use App\Events\SessionEvent;
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
        $user  =auth()->user();
        $session = new Session;
        $session->sender_id =$user->id;
        $session->receiver_id = $request->input('receiver_id');
        event(new SessionEvent($session, $user));
        $data = $session->save();
        return response()->json($data);
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
        $message->messageTime = getTime();
        $chat = $message->SessionForSend($session->id);
        $user = User::find($request->input('receiver_id'));
        $message->SessionForReceive($session->id,$user);
        event(new UserMessageEvent($chat, $message));
        $session->messages()->save($message);
    }

    private function getTime() {
        $date = now()->timezone('egypt');
        $format = "d/m/y-H:i";
        $dateFormat = Carbon::createFromFormat('Y-m-d H:i:s', $date)->format($format);
        $DateTime = strtoupper($dateFormat);
        return $DateTime;
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
