<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contact;

class MsgsController extends Controller
{
    // all msgs
    public function index(){

      $msgs = Contact::all();

      return view('admin.msgs.index', compact('msgs'));
    }


    // delete
    public function delete($id){

      $msg = Contact::findOrFail($id);
      $msg->delete();

      return back()->with('success','تم الحذف بنجاح');
    }

}
