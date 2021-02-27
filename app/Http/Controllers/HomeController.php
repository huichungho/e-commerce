<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Spatie\Permission\Contracts\Role;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
        $userRole = $user->getrolenames()->first();

        return view('home', compact('userRole'));
    }
}
