<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class AdminController extends Controller
{
    public function index(){
        return view('admin-login');
    }
    public function show_dashboard(){
        return view('admin.dashboard');
    }
    public function dashboard(Request $Request){
       $admin_email = $Request->admin_email;
       $admin_password = md5($Request->admin_password);

       $result = DB::table('tablename')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
        if($result){
            Session::put('admin_email',$result->admin_name);
            Session::put('admin_id',$result->admin_id);
            return Redirect::to('/dashboard');
        }else{
            Session::put('message','mật khẩu hoặc tài khoản chưa đúng');
            return Redirect('/admin');
        }   
    }
    public function logout(){
        Session::put('admin_email', null);
        Session::put('admin_id', null );
        return Redirect::to('/admin');
    }
  
};
