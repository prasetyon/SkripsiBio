<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //
    public function index(Request $request)
    {   
        if(!$request->session()->has('username'))
            return view('login');
        else if($request->session()->get('role')=='admin')
            return redirect()->route('dashboard');
        else if($request->session()->get('role')=='dosen')
            return redirect()->route('dosen');
        else if($request->session()->get('role')=='mhs')
            return redirect()->route('mahasiswa');
    }
    
    public function login(Request $request)
    {
        $username = $request->username;
        $pwd = $request->password;
        
        $auth = User::select('name','password','role')->where('username','=',$username)->get();
                
//        dd($auth);
        
        if(isset($auth[0]->role) && Hash::check($pwd, $auth[0]->password)){
            $name = $auth[0]->name;
            $role = $auth[0]->role;
            $username = $username;

            $request->session()->put('name', $name);
            $request->session()->put('role', $role);
            $request->session()->put('username', $username);
            
            if($role=='admin')
                return redirect()->route('dashboard');
            else if($role=='dosen')
                return redirect()->route('dosen');
            else if($role=='mhs')
                return redirect()->route('mahasiswa');
        }
        else{
            return redirect()->route('login');
        } 
    }
    
    public function changePassword(Request $request)
    {
        if($request->isMethod('get')){
            return view('changepassword');
        }
        else if($request->isMethod('post')){
            $role = $request->session()->get('role');
            $pwd = $request->oldpassword;
            
            $pass1 = $request->newpassword1;
            $pass2 = $request->newpassword2;
            
            $auth = User::select('name','password')->where('username','=',$request->session()->get('username'))->get();
            
            if(Hash::check($pwd, $auth[0]->password))
            {
                if($pass1==$pass2){
                    $password = User::where('username','=',$request->session()->get('username'))
                    ->update(['password'=>bcrypt($pass1)]);
                    
                    if($role=='admin')
                        return redirect()->route('dashboard')->with('alert-success', 'Password changed');
                    else if($role=='dosen')
                        return redirect()->route('dosen')->with('alert-success', 'Password changed');
                    else if($role=='mhs')
                        return redirect()->route('mahasiswa')->with('alert-success', 'Password changed');
                }
                else return view('change_password')->with('alert-danger', 'Failed to change password! Please make sure you retype the password correctly!');
            }
            else  return view('changepassword')->with('alert-danger', 'Failed to change password! Please put your old password correctly');
        }
        
    }
    
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('/');
    }
}
