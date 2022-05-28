<?php

namespace App\Http\Controllers;

use App\User;
use http\Cookie;
use Illuminate\Http\Request;
use function Sodium\compare;

class UserController extends Controller
{
    //
    public function registerPage(){
        return view('register');
    }

    public function loginPage(){
        return view('login');
    }

    public function register(Request $request){
        $this->validate($request,[
            'name' => 'required|string',
            'email' => 'required|email|unique:App\User',
            'password' => 'required|alpha_dash|min:5',
            'cp' => 'required|same:password',
            'gender' => 'required|in:male,female',
            'phone' => 'required|digits_between:8,12',
            'address' => 'required|min:10',
            'file' => 'mimes:png,jpg,jpeg|required'
        ]);

        $filename = time() . '.' . $request->file->extension();
        $request->file->move(public_path('storage'),$filename);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'address' => $request->address,
            'password' => bcrypt($request->password),
            'image' => $filename,
            'role' => 'user'
        ]);


        return redirect('/login');
    }

    public function login(Request $request){
        $email = $request->email;
        $password = $request->password;
        $remember = $request->rememberMe ? true:false;
        if(auth()->attempt(['email'=>$email, 'password'=>$password], $remember)){
//            if($remember){
                \Cookie::make('email', $email, 60);
//            }
            return redirect('/');

        }else{
            return redirect()->back();
        }
    }

    public function logout(Request $request){
        auth()->logout();
        return redirect('/login');
    }

    public function profile(Request $request){
        $user = auth()->user();
        return view('updateProfile', compact('user'));
    }

    public function updateProfile(Request $request){
        $this->validate($request,[
            'name' => 'required|string',
            'email' => 'required|email|unique:App\User',
            'gender' => 'required|in:male,female',
            'phone' => 'required|digits_between:8,12',
            'address' => 'required|min:10',
            'file' => 'mimes:png,jpg,jpeg|required'
        ]);
        $filename = time() . '.' . $request->file->extension();
        $request->file->move(public_path('storage'),$filename);

        User::where('id', $request->route('id'))->update([
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'address' => $request->address,
            'image' => $filename
        ]);
        return redirect('/');

    }

    public function manageUser(Request $request){
        $users = User::all();
        return view('manageUser', compact('users'));
    }

    public function updateUserPage(Request $request){
        $user = User::find($request->route('id'));
        return view('updateUser', compact('user'));
    }

    public function updateUser(Request $request){
        $this->validate($request,[
            'name' => 'required|string',
            'email' => 'required|email|unique:App\User',
            'gender' => 'required|in:male,female',
            'phone' => 'required|digits_between:8,12',
            'address' => 'required|min:10',
            'file' => 'mimes:png,jpg,jpeg|required'
        ]);
        $filename = time() . '.' . $request->file->extension();
        $request->file->move(public_path('storage'),$filename);

        User::where('id', $request->route('id'))->update([
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'address' => $request->address,
            'image' => $filename
        ]);
        return redirect('/manageuser');
    }

    public function deleteUser(Request $request){
        User::where('id', $request->route('id'))->delete();
        return redirect('/manageuser');
    }



}
