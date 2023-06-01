<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterStoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login_page(){
        return view('auth.login');
    }
    public function register_page(){
        return view('auth.register');
    }
    public function home(){
        return view('admin.home');
    }

    public function register(RegisterStoreRequest $request){
        $data = [
            'role'=>'student',
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ];
        $user = User::create($data);
        Auth::login($user);
        return redirect()->route('home');
    }

    public function login(Request $request){
        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            
            if (Auth::user()->role == 'student') {
                return redirect()->route('student_home');
            }elseif (Auth::user()->role == 'teacher') {
                return redirect()->route('teacher_home');
            }else{
                return redirect()->route('admin.home');
            }
        }
        return redirect()->route('login_page');
    }

    public function logout(Request $request){
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect()->route('login_page');
    }
}
