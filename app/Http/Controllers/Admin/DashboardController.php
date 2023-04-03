<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}
