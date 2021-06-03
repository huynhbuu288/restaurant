@extends('admin-layout')
@section('admin-content')
    

<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm Phòng
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
                        <form role="form" action="{{URL::to('/save_type')}}" method="post">
                            {{csrf_field()}};
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Phòng</label>
                            <input type="text" name="type_name"  class="form-control" 
                            id="exampleInputEmail1" placeholder="Tên Danh Mục">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">giá Phòng</label>
                            <input type="text" name="type_price"  class="form-control" 
                            id="exampleInputEmail1" placeholder="Gía Phòng">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình Ảnh Phòng</label>
                            <input type="file" name="type_image"  class="form-control" 
                            id="exampleInputEmail1" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô Tả Phòng</label>
                            <textarea  class="form-control" name="type_desc" 
                            id="exampleInputPassword1" placeholder="Mô Tả Phòng">
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nội Dung Phòng</label>
                            <textarea  class="form-control" name="type_content" 
                            id="exampleInputPassword1" placeholder="Nội Dung Phòng">
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Danh Mục</label>
                            <select name="product_cate" class="form-control input-sm m-bot15">
                                @foreach ($cate as $key=> $cate)
                                    
                              
                                <option value="0">{{($cate->menu_id)}}</option>
                                @endforeach
                               
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Loại Phòng</label>
                            <select name="product_room" class="form-control input-sm m-bot15">
                                @foreach ($room as $key=> $room)
                                <option value="0">{{($room->room_id)}}</option>
                                
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hiển Thị</label>
                            <select name="type_status" class="form-control input-sm m-bot15">
                                <option value="0">ẨN</option>
                                <option value="1">Hiển Thị</option>
                               
                            </select>
                        </div>
                        <div class="checkbox">
                      
                        </div>
                        <button type="submit" name="add_type" class="btn btn-info">Thêm phòng</button>
                    </form>
                    </div>

                </div>
            </section>

    </div>
    @endsection