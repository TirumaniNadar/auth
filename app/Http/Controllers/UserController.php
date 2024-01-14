<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function dashboard()
    {
        $user = Auth::guard('user')->user();
        return view('dashboard', compact('user'));
        // OR
        // return view('dashboard', ['user']);
    }

    function register()
    {
        return view('register');
    }

    public function registerSubmit(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|min:5|max:30',
            'surname' => 'required|string|min:5|max:30',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|digits:10',
            'address' => 'required|string|min:5|max:100',
            'pincode' => 'required|digits:6',
            'state' => 'required',
            'city' => 'required',
            'password' => 'required|min:8|max:12|confirmed',
            // 'password_confirmation' => 'required|min:5|max:12|same:password',
        ]);

        // return $request->input();
        $user = new User();
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->pincode = $request->pincode;
        $user->state = $request->state;
        $user->city = $request->city;
        $user->password = bcrypt($request->password);
        if ($user->save()) {
            return redirect()->route('login')->with('success', 'User has been successfully registered');
        } else {
            return back()->with('error', 'Something went wrong');
        }
    }

    function login()
    {
        return view('login');
    }

    public function loginSubmit(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'email' => 'required|email|max:100',
            'password' => 'required|min:8|max:20',
        ]);

        // return $request->input();
        // $user = User::where('email', '=', $request->email)->first();
        // if ($user) {
        //     if (password_verify($request->password, $user->password)) {
        //         $request->session()->put('LoggedUser', $user->id);
        //         return redirect()->route('dashboard');
        //     } else {
        //         return back()->with('error', 'Invalid password');
        //     }
        // } else {
        //     return back()->with('error', 'No user found for this email');
        // }

        // OR

        $credentials = $request->only('email', 'password');
        if (Auth::guard('user')->attempt($credentials)) {
            // return redirect()->route('categories.index');
            return redirect()->route('dashboard')->with(['alert-type' => 'success', 'message' => 'Login Successfully.']);
        } else {
            return redirect()->back()->withErrors(["verification" => "Credentials doesn't match our records"]);
        }
    }

    function profile()
    {
        $user = auth('user')->user();
        // $user = Auth::guard('user')->user();
        // dd($user);
        return view('profile', compact('user'));
    }

    function logout()
    {
        Auth::guard('user')->logout();
        return redirect()->route('login')->with('success', 'User has been successfully logged out');
    }
}
