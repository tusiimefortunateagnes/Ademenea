<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;
use App\Models\Admins;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class adminlogin extends Controller
{
     //function for logging users in.
     public function log_user_in(Request $request)
     {
     
         $username = $request->input('username');
         $password = $request->input('password');
     
         $user = admin::where('username', $username)
                 ->where('password', $password)
                 ->first();
     
         if ($user) {
     // lets put the admin id to the session.
            $admin = DB::table('Admins')
            ->select('admin_id')
            ->where('username', $username)
            ->first();
            //echo $admin->id;

            Session::put('id',$admin->admin_id);
            return redirect('/dashboard')->with('greeting','Hello'.' '.$username);
         } else {
             return redirect('/login')->with('Error','Wrong credentials!');
         }
     
     }


     //function for logging users out.
     public function logout(Request $request)
     {
     
             Session::flush();
            return redirect('/login');
        
     
     }





}
