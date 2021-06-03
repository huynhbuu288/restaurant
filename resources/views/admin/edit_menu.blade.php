@extends('admin-layout')
@section('admin-content')
    

<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập Nhật Danh Mục Menu
                </header>
              
                    <?php
                    $message = Session::get('message');
                    if($message){
                        echo $message;
                        Session::put('message', null);
                    }
                ?>
                  <div class="panel-body">
                      @foreach($edit_menu as $key => $edit_value)
                  
                    <div class="position-center">
                        <form role="form" action="{{URL::to('/update-menu/'.$edit_value->menu_id)}}"
                             method="post">
                            {{csrf_field() }} 
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Danh Mục</label>
                            <input type="text" value="{{$edit_value->menu_name}}" name="menu_name"  class="form-control" 
                            id="exampleInputEmail1" placeholder="Tên Danh Mục">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô Tả Danh Mục</label>
                            <textarea  class="form-control" name="menu_desc" 
                            id="exampleInputPassword1">{{ $edit_value->menu_menu_desc}}

                            </textarea>
                        </div>
                        <button type="submit" name="update_menu" class="btn btn-info">Cập nhật danh muc</button>
                    </form>
                    </div>
                            
                    @endforeach
                </div>
            </section>

    </div>
    @endsection