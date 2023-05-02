<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

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
        return view ('admin.pages.pages_setting');
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
