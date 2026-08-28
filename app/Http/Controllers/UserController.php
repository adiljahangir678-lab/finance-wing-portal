<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth; 

class UserController extends Controller
{
   public function register (Request $request) {
        $data = $request->validate ([
             'branch_name' => 'required',
             'branch_incharge_name' => 'required',
             'password' => 'required|confirmed',
       ]);

      
       $user = User::create($data);

       
       if ($user){
            return redirect()->route('login');

       } 

   }

     public function login (Request $request){

     $credentials = $request->validate([
             'branch_name' => 'required',
             'password' => 'required',

     ]);
          if(Auth::attempt($credentials)){
               return redirect()->route('dashboard');
          }
     }
     
     public function dashboard()
     {
          if (Auth::check()){
           return view('dashboard');

          }
          else{
          return redirect()->route('login');     

          }
     }
     
     public function logout()
     {
          Auth::logout();
           return view('login'); 
      }
}
   

