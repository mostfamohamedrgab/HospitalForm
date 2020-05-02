<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{

    // check if he already login
    public function __construct(){
        $this->middleware('AdminLoged');
    }

    // start check admin data
    public function login(Request $request){

      $request->validate([
          'email' => 'required|email',
          'password' => 'required',
      ]);

      $data = $request->except(['_token']);

      if( auth('admin')->attempt($data) )
      {
        return redirect()->route('admin.');
      }

      return back()->with('error','بينات خاطئه !');
    }

    // show loign form
    public function showForm(){
      return view('admin.login');
    }
    // end class
}
