<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contact');
    }

  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
          'name' => 'required|min:2|max:100',
          'email' => 'required|email',
          'message' => 'required|min:5|max:100',
        ]);

        Contact::create($data);

        return back()->with('success', 'تم الارسال بنجاح شكرا لك .');
    }



}
