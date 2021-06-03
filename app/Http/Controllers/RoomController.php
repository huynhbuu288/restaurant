<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class RoomController extends Controller
{
    public function add_room_controller(){
        return view('admin.add_room');  
    }
    public function all_room_controller(){
        $all_room = DB::table('tbl_room')->get();
        $manager_room = view('admin.all_room')->with('all_room', $all_room);
        return view('admin-layout')->with('admin.all_room', $manager_room); 
    }
    public function save_room(Request $request){
        $data = array();
        $data['room_name'] = $request->room_name;
        $data['room_desc'] = $request->room_desc;
        $data['room_status'] = $request->room_status;

        DB::table('tbl_room')->insert($data);
        Session::put('message','Thêm Phòng Thành Công');
        return Redirect::to('add-room');
       
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
