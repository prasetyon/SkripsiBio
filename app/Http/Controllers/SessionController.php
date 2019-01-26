<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SessionController extends Controller {
   public function accessSessionData(Request $request){
      if($request->session()->has('username'))
         echo $request->session()->get('username');
      else
         echo 'No data in the session';
   }
    
   public function deleteSessionData(Request $request){
      $request->session()->flush();
      echo "Data has been removed from session.";
   }
    
}