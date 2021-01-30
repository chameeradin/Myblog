<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index(){

        return view('auth.login');
    }

    public function store(Request $request){

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(!auth()->attempt($request->only('email', 'password'), $request->remember)){
            return back()->with('alert', 'Invalid login details');
        };
            $request->session()->regenerate();

            return redirect()->route('dashboard');
    }
}
