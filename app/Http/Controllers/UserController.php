<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
   public function register (Request $request) {
        $data = $request->validate ([
             'branch_name' => 'required',
             'branch_incharge_name' => 'required',
             'password' => 'required|confirmed',
       ]);

      $data['role'] = 'user';
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
          // if(Gate::allows('isAdmin'))long method
          // { 
          //   return view('dashboard'); 
          // }
          // else{
          //      return "accesed denied";
          // }
          
          //Short Method

       //Gate::authorize('isAdmin');
       //return view('dashboard');
        
          //Gate::authorize('isB1');
          //return view('dashboard');
          //if (Gate::allows('isAdmin',)) {
          return view('dashboard');
    }


     //}
     //  public function b1()
     // {
     //       //Gate::authorize('isB1');
     //      // return view('b1');  
     //  }

     public function b1()
     {
          Gate::authorize('isB1');
          return view ('budget/budget1');// blade file
     }

     public function b2()
     {
          Gate::authorize('isB2');
          return view ('budget2');
     }

     public function b3()
     {
          Gate::authorize('isB3');
          return view ('budget3');
     }

     public function b4()
     {
          Gate::authorize('isB4');
          return view ('budget4');
     }
     public function b5()
     {
          Gate::authorize('isB5');
          return view(budget5);
     }
     public function b6()
     {
          Gate::authorize('isB6');
          return view(budet6);
     }

     public function a1()
     {
          Gate::authorize('isA1');
          return view(audit1);
     }

     public function a2()
     {
          Gate::authorize('isA2');
          return view(audit2);
     }
     public function a3()
     {
          Gate::authorize('isA3');
          return view(audit3);

     }




     
     public function logout()
     {
          Auth::logout();
           return view('login');  
      }
}
   

