<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Validator;
use Symfony\Contracts\Service\Attribute\Required;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function authenticate(Request $request){
        $this->validate($request,[
            'email' => 'Required|email',
            'password' => 'Required'
        ]);
        if (Auth::guard('admin')->attempt(['email' => $request->email , 'password' => $request->password],$request->get('remember')))
        {
            return redirect()->route('admin.dashboard');
        }
        else{
            session()->flash('error' ,'Either Email/Password is incorrect');
            return back()->withInput($request->only('email'));
        }
    }

    // public function authenticate(Request $request)
    // {
    // $this->validate($request, [
    //     'email' => 'required|email',
    //     'password' => 'required'
    // ]);

    // // Attempt to authenticate the user
    // if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
    //     // Check if the admin has the 'user_status' set to 'on'
    //     $admin = Auth::guard('admin')->user();
    //     if ($admin->user_status == 'on') {
    //         return redirect()->route('admin.dashboard');
    //     } else {
    //         // If user_status is 'off', log them out and show an error message
    //         Auth::guard('admin')->logout();
    //         session()->flash('error', 'Your account is not active.');
    //         return back()->withInput($request->only('email'));
    //     }
    // } else {
    //     session()->flash('error', 'Either Email/Password is incorrect');
    //     return back()->withInput($request->only('email'));
    // }
    // }



     public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
