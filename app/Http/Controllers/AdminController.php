<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $pages = 'dashboard';
        $data = User::where('is_admin', true)->get(); 
        return view('admin.dashboard', compact('data', 'pages'));
    }
}
