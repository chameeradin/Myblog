<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }


    public function index(User $user, Request $request){

        $user = Auth::user();
        return view('auth.profile', [
            'user' => $user,
        ]);

    }

    public function update(Request $request, $id){



        $this->validate($request, [
            'name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|confirmed',
            'phone' => 'required|digits_between:9,20',
        ]);

        if ($request->hasFile('avatar')) {

            $request->validate([
                'avatar' => 'nullable|image|max:1999|mimes:jpeg,bmp,png'
            ]);


            $avatar = $request->file('avatar')->store('users', 'public');

            $user = User::find($id);

                $user->name = $request->name;
                $user->username = $request->username;
                $user->email = $request->email;
                $user->password = Hash::make($request->password);
                $user->phone = $request->phone;
                $user->avatar = $avatar;
                $user->save();




        }
        else{

            $user = User::find($id);

                $user->name = $request->name;
                $user->username = $request->username;
                $user->email = $request->email;
                $user->password = Hash::make($request->password);
                $user->phone = $request->phone;
                $user->save();


        }

        return redirect('dashboard')->with('status', 'Your account has updated');
    }
}
