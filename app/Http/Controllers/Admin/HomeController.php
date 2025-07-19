<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Hospital;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(){


        $hospitals = Hospital::latest()->get();
        $users = User::with('roles')->latest()->get();
        $blogs = Blog::latest()->paginate(10);

        return view('admin.home.index', compact('hospitals' , 'users' , 'blogs'));

//        return view('admin.home.index');

    }

}
