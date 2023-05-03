<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\InternshipRequest;
use Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        notify()->success('Welcome to Laravel Notify ⚡️');
        return view('admin.pages.dashboard');
    }
    public function profile()
    {
        return view ('admin.pages.profile');
    }
    public function pages()
    {
        if(Auth::user()->type=='student')
        {
            $data=InternshipRequest::where('user_id',Auth::id())->get();
        } else if(Auth::user()->type=='supervisor')
        {
            $data=InternshipRequest::where('assign_to',Auth::id())->get();
        }
        else{
            $data=InternshipRequest::all();
        }
        
        return view ('admin.pages.pages_setting',get_defined_vars());
    }
    public function requestDetail($id)
    {
        $id=decrypt($id);
        $data=InternshipRequest::with('user','head','supervisor')->findOrfail($id);

        $data=$data->toArray();
        return view ('admin.pages.request_detail',get_defined_vars());
    }
    public function reviewRequest(Request $request)
    {
    //   dd($request->all());

    $data=InternshipRequest::findOrfail($request->id);
   
    if($request->status=='approved')
    {
        $request->validate([
            'supervisor'=>'required',
            'id'=>'required',
          ]);

          $data->assign_to=$request->supervisor;
    }else{

        $request->validate([
            'id'=>'required',
          ]);

          $data->assign_to=Null;

    }
    $data->checked_by=Auth::id();
    $data->comments=$request->comments;
    $data->status=$request->status;

    $data->save();
        
        
        return redirect()->route('admin.pages')->with('message','Request has been reviewed Successfully');
    }
    public function aboutPage()
    {
        return view ('admin.pages.about');
    }
    public function portfolioPage()
    {
        return view ('admin.pages.portfolio');
    }
    public function usersPage()
    {
        $users=User::orderBy('id','desc')->get()->groupBy('type');
        return view('admin.user.list',get_defined_vars());
    }
    public function createUser()
    {
       
        return view('admin.user.create');
    }
    public function editUser($id)
    {
       $user=User::findOrfail($id);
        return view('admin.user.edit',get_defined_vars());
    }
}
