<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\store;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function pageMail()
    {
        $store = store::orderByDesc('created_at')->first();
       
        return view('admin.Email.Email',[
            'store' => $store
        ]);

    }

    public function sendMail(Request $request)
    {
        $users = User::all();

        foreach($users as $user)
        {
            Mail::to($user->email)->send(new SendMail($request->message));
        }
        // Mail::to('yarizallani@gmail.com')->send(new SendMail());
        return "mail sent" ;
    }
}
