@extends('admin-layout')
@section('admin-content')
    

<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập Nhật Loại Phòng
                </header>
              
                    <?php
                    $message = Session::get('message');
                    if($message){
                        echo $message;
                        Session::put('message', null);
                    }
                ?>
                  <div class="panel-body">
                      @foreach($edit_room as $key => $edit_value)
                  
                    <div class="position-center">
                        <form role="form" action="{{URL::to('/update-room/'.$edit_value->room_id)}}"
                             method="post">
                            {{csrf_field() }} 
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Danh Mục</label>
                            <input type="text" value="{{$edit_value->room_name}}" name="room_name"  class="form-control" 
                            id="exampleInputEmail1" placeholder="Tên Danh Mục">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô Tả Danh Mục</label>
                            <textarea  class="form-control" name="room_desc" 
                            id="exampleInputPassword1">{{ $edit_value->room_desc}}

                            </textarea>
                        </div>
                        <button type="submit" name="update_room" class="btn btn-info">Cập nhật danh muc</button>
                    </form>
                    </div>
                            
                    @endforeach
                </div>
            </section>

    </div>
    @endsection