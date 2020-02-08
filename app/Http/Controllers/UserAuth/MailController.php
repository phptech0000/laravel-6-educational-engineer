<?php

namespace App\Http\Controllers\UserAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
class MailController extends Controller {

    public function mailbox($user_id) {
         $user = User::findOrFail($user_id);
        return view('Dashboard.Mail.mailbox');
    }

    public function readmail() {
        return view('Dashboard.Mail.read_mail');
    }

    public function mailcompose() {
        return view('Dashboard.Mail.mailbox_compose');
    }

}
