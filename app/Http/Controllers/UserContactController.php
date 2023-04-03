<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserContact;

class UserContactController extends Controller
{
    public function userQuery(Request $request)
    {
        // dd($request->all());

        $validate=$request->validate([
            'name'=>'required|unique:user_contacts',
            'email'=>'required|email|unique:user_contacts',
            'subject'=>'required',
            'desc'=>'required',
        ]);

        if($validate)
        {
            $query=UserContact::create([
                "name"=>$request->name,
                "email"=>$request->email,
                "subject"=>$request->subject,
                "desc"=>$request->desc,
            ]);

        }
            return redirect()->back();

    }
}
