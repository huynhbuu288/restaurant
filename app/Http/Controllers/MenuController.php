<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class MenuController extends Controller
{
    public function add_menu_controller(){
        return view('admin.add_menu');  
    }
    public function all_menu_controller(){
        $all_menu = DB::table('tbl_menu')->get();
        $manager_menu = view('admin.all_menu')->with('all_menu', $all_menu);
        return view('admin-layout')->with('admin.all_menu', $manager_menu); 
    }
    public function save_menu(Request $request){
        $data = array();
        $data['menu_name'] = $request->menu_name;
        $data['menu_menu_desc'] = $request->menu_desc;
        $data['menu_menu_status'] = $request->menu_status;

        DB::table('tbl_menu')->insert($data);
        Session::put('message','Thêm Danh Mục Thành Công');
        return Redirect::to('add-menu');
       
    }
    public function unactive_menu($menu_id){
      DB::table('tbl_menu')->where('menu_id',$menu_id)->update(['menu_menu_status'=>1]);
      Session::put('message','Không Kích Hoạt Danh Mục Thành Công');
      return Redirect::to('all-menu');
    }
    public function active_menu($menu_id){
        DB::table('tbl_menu')->where('menu_id',$menu_id)->update(['menu_menu_status'=>0]);
        Session::put('message',' Kích Hoạt Danh Mục Thành Công');
        return Redirect::to('all-menu');
      }
    public function edit_menu($menu_id){
        $edit_menu = DB::table('tbl_menu')->where('menu_id',$menu_id)->get();
        $manager_menu = view('admin.edit_menu')->with('edit_menu', $edit_menu);
        return view('admin-layout')->with('admin.edit_menu', $manager_menu); 
    }
    public function update_menu(Request $request, $menu_id){
        $data = array();
        $data['menu_name'] = $request->menu_name;
        $data['menu_menu_desc'] = $request->menu_desc;
        DB::table('tbl_menu')->where('menu_id',$menu_id)->update($data);
        Session::put('message',' Update Danh Mục Thành Công');
        return Redirect::to('all-menu');
    }
    public function delete_menu($menu_id){
        DB::table('tbl_menu')->where('menu_id',$menu_id)->delete();
        Session::put('message',' Xóa Danh Mục Thành Công');
        return Redirect::to('all-menu');
    }
  
    
};
