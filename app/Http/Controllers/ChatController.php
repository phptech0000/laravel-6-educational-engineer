<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\message;
use DB;
use App\Events\UserMessageEvent;

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
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate(['message' => 'required|string|max:255']);
        $user = auth()->user();
        $message = new message;
        $message->message = $request->input('message');
        $message->messagetime = getTime();
        $message->user()->save($user);
        $message->sender_id = $request->input('sender_id');
        $lastmessage = DB::table('messages')->where('user_id', $user->id)->latest()->get();
        if ($lastmessage === $message) {
            $message->isLastMessage = 1;
        }

       $sender = User::find($request->input('sender_id'));
        event(new UserMessageEvent($sender, $message));
        $data = $message->save();

        return response()->json($data);
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
