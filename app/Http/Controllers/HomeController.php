<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::where('role', '!=', 'admin')->count();
        $blogs = Blog::count();
        $userId = Auth::user()->id;
        if (Auth::user()->role !== 'admin') {
            $blogs = Blog::where('user_id', $userId)->count();
        }
        return view('home', compact('users', 'blogs'));
    }
}
