<?php
namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller {
    public function store(Request $request){
        $request->validate([
            "name" => 'required',
            "username" => 'required|unique:users,username',
            "business_name" => 'required',
            "email" => 'required|unique:users,email',
            "address" => 'required',
            "password" => 'required',
            "contact_number" => 'required'
        ]);

        DB::transaction(function () use($request) {
            $user = User::create([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'contact_number' => $request->contact_number,
                'password' => $request->password,
            ]);
    
            Business::create([
                'user_id' => $user->id,
                'name' => $request->business_name,
                'address' => $request->address,
            ]);
        });

        return view('auth.signin');
    }

    public function authenticate(Request $request){
        $request->validate([
            "username" => 'required',
            "password" => 'required',
        ]);

        return DB::transaction(function () use($request) {
            // $user = User::create([
            //     'name' => $request->name,
            //     'username' => $request->username,
            //     'email' => $request->email,
            //     'contact_number' => $request->contact_number,
            //     'password' => $request->password,
            // ]);
            $user = User::where([
                'username' => $request->username
            ])->first();

            if(!$user || $user->password != $request->password){
                return back()->withErrors([
                    'invalid-credentials' => 'The provided credentials do not match our records.',
                ]);
            }
            Auth::login($user);
            $request->session()->regenerate();
            return redirect(route('home'));
        });

    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('home'));
    }
}