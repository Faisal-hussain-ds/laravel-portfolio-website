<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InternshipRequest;
use Auth;
use Carbon\Carbon;

class UserContactController extends Controller
{
    public function userQuery(Request $request)
    {
       

        $request->validate([
            'first_name'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'faculty'=>'required',
            'department'=>'required',
            'reg_number'=>'required',
            'internship_theme'=>'required',
            'padagogical_manager'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
            'email'=>'required|email|unique:users',
        ]);

        $toDate = Carbon::parse($request->start_date);
        $fromDate = Carbon::parse($request->end_date);
        $days = $toDate->diffInDays($fromDate); 
            $query=InternshipRequest::create([
                "user_id"=>Auth::user()->id??0,
                "first_name"=>$request->first_name,
                "last_name"=>$request->last_name,
                "email"=>$request->email,
                "phone"=>$request->phone,
                "address"=>$request->address,
                "faculty"=>$request->faculty,
                "department"=>$request->department,
                "reg_number"=>$request->reg_number,
                "internship_theme"=>$request->internship_theme,
                "padagogical_manager"=>$request->padagogical_manager,
                "start_date"=>$request->start_date,
                "end_date"=>$request->end_date,
                "no_of_days"=>$days,
    
                "desc"=>$request->desc,
            ]);
            return redirect()->route('admin.pages')->with('message','Internship Request has been sent Successfully');

    }
}
