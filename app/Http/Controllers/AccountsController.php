<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AccountsController extends Controller
{
    public function index() {

        $user = Auth::user();
        return view('myaccount/index')->with(array("page" => "subpage", "user" => $user));
    }
    
    public function details() {

        $user = Auth::user();
        return view('myaccount/details')->with(array("page" => "subpage", "user" => $user));
    }
    
    public function password() {

        $user = Auth::user();
        return view('myaccount/password')->with(array("page" => "subpage", "user" => $user));
    }
    
    public function bookings() {

        $user = Auth::user();
        return view('myaccount/bookings')->with(array("page" => "subpage", "user" => $user));
    }
    
    public function quotes() {

        $user = Auth::user();
        return view('myaccount/quotes')->with(array("page" => "subpage", "user" => $user));
    }

    public function updateDetails(Request $request) {
        $request->validate([
            'name' =>  'required',
            'email' =>  'required|email|unique:users',
            'phone' =>  'nullable|numeric',
            'password' => 'required',
        ]);

        if (Hash::check($request->password, Auth::user()->password) == false)
        {
            return Redirect::back()->withErrors(['password' => 'Incorrect password provided']);
        } 

        $userId = Auth::id();
        $user = User::findOrFail($userId);
        $user->fill([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone
        ]);
        $user->save();

        return redirect('/myaccount')->with('success', 'Account successfully updated!');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'new_password' => 'required|string|confirmed|min:6|different:password'          
        ]);

        if (Hash::check($request->password, Auth::user()->password) == false)
        {
            return Redirect::back()->withErrors(['password' => 'Incorrect password provided']);
        } 

        $userId = Auth::id();
        $user = User::findOrFail($userId);
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect('/myaccount')->with('success', 'Password successfully updated!');
    }
}
