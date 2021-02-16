<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class UserController extends Controller
{
 

    public function signup_page()
    {
        return view('user.signup');
    }

    public function signup(Request $request){
        $validated = $request->validate([
            "name" => "required",
            "email" => "required|email|unique:users,email",
            "password" => "required|min:6|confirmed",
            "address" => "required",
            "phone" => "required|numeric",
        ]);

        $user = new User([
            'email' => $validated["email"],
            'name' => $validated["name"],
            'password' => bcrypt($validated["password"]),
            'address' => $validated["address"],
            'phone' => $validated['phone'],
            'role' => 'MEMBER',
        ]);

        $user->save();
        return back()->with('success', 'Akun sudah berhasil dibuat');
    }


    public function login_page(){
        return view('user.login');
    }

    

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $remember = $request->has('remember') ? true : false;

        
        if(Auth::viaRemember()){
            return redirect()->intended();
        }

        if(Auth::attempt($credentials, $remember)){
            if($remember == true){
                $customRememberMeTimeInMinutes = 120;
                $cookieRememberTokenKey = Auth::getRecallerName();
                Cookie::queue($cookieRememberTokenKey, Cookie::get($cookieRememberTokenKey),$customRememberMeTimeInMinutes);
            }
            return redirect()->intended();
        }
        else {
            return back()->withErrors("Terjadi kesalahan saat memuat akun");
        }

    }

    public function logout() {
        Auth::logout();
        return redirect()->intended();
    }

    public function get() {
        $users = User::paginate(10);
        
        return view('user.get', ['users' => $users]);
    }

    public function update_page($id) {
        $user = User::find($id);
        return view('user.update',['user' => $user]);
    }

    public function update($id, Request $req) {
        $validated = $req->validate([
            "name" => "required",
            "email" => "required|email|unique:users,email",
            "password" => "required|min:6|confirmed",
            "address" => "required",
            "phone" => "required|numeric",
        ]);
        
        $user = User::find($id);
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->password = $validated['password'];
        $user->address = $validated['address'];
        $user->phone = $validated['phone'];

        
        $user->save();
        return back()->with('success', 'Profile berhasil di update');
    }

    public function delete($id) {
        User::where(['id' => $id])->delete();
        return back();
    }
}
