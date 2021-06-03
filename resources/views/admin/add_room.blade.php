@extends('admin-layout')
@section('admin-content')
    

<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm Loại Phòng
                </header>
                <div class="panel-body">
                    <?php
                    $message = Session::get('message');
                    if($message){
                        echo $message;
                        Session::put('message', null);
                    }
                ?>
                    <div class="position-center">
                        <form role="form" action="{{URL::to('/save_room')}}" method="post">
                            {{csrf_field()}};
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Loại Phòng</label>
                            <input type="text" name="room_name"  class="form-control" 
                            id="exampleInputEmail1" placeholder="Tên Danh Mục">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô Tả Phòng</label>
                            <textarea  class="form-control" name="room_desc" 
                            id="exampleInputPassword1" placeholder="Mô Tả Danh Mục">
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hiển Thị</label>
                            <select name="room_status" class="form-control input-sm m-bot15">
                                <option value="0">ẨN</option>
                                <option value="1">Hiển Thị</option>
                               
                            </select>
                        </div>
                        <div class="checkbox">
                      
                        </div>
                        <button type="submit" name="add_menu" class="btn btn-info">Thêm Phòng</button>
                    </form>
                    </div>

                </div>
            </section>

    </div>
    @endsection