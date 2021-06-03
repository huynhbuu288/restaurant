<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class TypeController extends Controller
{
    public function add_type_controller(){
        $cate = DB::table('tbl_menu')->orderby('menu_id','desc')->get();
        $room = DB::table('tbl_room')->orderby('room_id','desc')->get();
        return view('admin.add_type')->with('cate', $cate)->with('room', $room);
    }
    public function all_room_controller(){
        $all_room = DB::table('tbl_room')->get();
        $manager_room = view('admin.all_room')->with('all_room', $all_room);
        return view('admin-layout')->with('admin.all_room', $manager_room); 
    }
    public function save_type(Request $request){
        $data = array();
        $data['type_name'] = $request->type_name;
        $data['type_price'] = $request->type_price;
        $data['type_desc'] = $request->type_desc;
        $data['type_content'] = $request->type_content;
        $data['menu_id'] = $request->menu_id;
        $data['room_id'] = $request->room_id;
        $data['type_status'] = $request->type_status;
        $get_image = $request->file('type_image');
        if($get_image){
            $new_image = rand(0,99). '.' .$get_image->getClienOriginalExtension();
            $get_image->move('public/uploads/type',$new_image)
            $data['type_image'] = $new_image;
        DB::table('tbl_type')->insert($data);
        Session::put('message','Thêm Phòng Thành Công');
        return Redirect::to('add-type');
        }
        $data['type_image'] = '';
        DB::table('tbl_type')->insert($data);
        Session::put('message','Thêm Phòng Thành Công');
        return Redirect::to('/add-type');
       
    }
    public function unactive_room($room_id){
      DB::table('tbl_room')->where('room_id',$room_id)->update(['room_status'=>1]);
      Session::put('message','Không Kích Hoạt Loại Phòng Thành Công');
      return Redirect::to('all-room');
    }
    public function active_room($room_id){
        DB::table('tbl_room')->where('room_id',$room_id)->update(['room_status'=>0]);
        Session::put('message','Kích Hoạt Loại Phòng Thành Công');
        return Redirect::to('all-room');
      }
 
    public function edit_room($room_id){
        $edit_room = DB::table('tbl_room')->where('room_id',$room_id)->get();
        $manager_room = view('admin.edit_room')->with('edit_room', $edit_room);
        return view('admin-layout')->with('admin.edit_room', $manager_room); 
    }
    public function update_room(Request $request, $room_id){
        $data = array();
        $data['room_name'] = $request->room_name;
        $data['room_desc'] = $request->room_desc;
        DB::table('tbl_room')->where('room_id',$room_id)->update($data); 
        Session::put('message',' Update Loại Phòng Thành Công');
        return Redirect::to('all-room');
    }
    public function delete_room($room_id){
        DB::table('tbl_room')->where('room_id',$room_id)->delete();
        Session::put('message',' Xóa Danh Mục Thành Công');
        return Redirect::to('all-room');
    }
}
