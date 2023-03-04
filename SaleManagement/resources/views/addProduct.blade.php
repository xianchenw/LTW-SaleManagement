
@extends('layout')
@section('content')
<link rel="stylesheet"  type="text/css" href="css/product.css">


        <div class="container" style="justify-content: center;
    align-items: center;">
            
            <div class="col-lg-12 col-md-12 col-sm-12" style="margin-bottom: 70px; margin-top: 30px">
                                   
                @if( $errors-> any())
                    <div class="elert elert-danger">
                        <ul>
                            @foreach($errors-> all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="thongtin" style="justify-content: center; align-items: center;text-align: center;  margin-bottom: 20px;">
                    <p class ="doimausale" style="font-size: 17px;" >Hãy nhập thông tin sản phẩm cần thêm</p> 
                </div>
                @if(Session::has('addsuccess'))
                    <div class="alert alert-success" style="color: black; font-size: 16px">
                        {{Session::get('addsuccess')}}
                    </div>
                   
                @endif
                <form method ="POST" action ="{{route('insert')}}" enctype="multipart/form-data" class="form-horizontal">
                    {{csrf_field()}}
                    <div class="form-group row col-12">
                     
                        <label class="col-3 ">Tên sản phẩm:</label>
                        <div class="col-lg-9">
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row col-12">
                        <label class="col-lg-3 " for="price">Giá</label>
                        <div class="col-lg-9">
                        <input type="number" name="price" id="price" class="form-control" >
                        </div>
                    </div>
                    <div class="form-group row col-12">
                        <label class="col-lg-3 ">Số lượng</label>
                        <div class="col-lg-9">
                            <input type="number" name="num" id="num" class="form-control" >
                        </div>
                    </div>

                    <div class="form-group row col-12">
                        <label class="col-lg-3 " for="manufacturer">Nhà cung cấp</label>
                        <div class="col-lg-9">
                            <input type="text" name="manufacturer" id="manufacturer" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row col-12">
                        <label class="col-lg-3 " for="example-textarea">Mô tả</label>
                        <div class="col-lg-9">
                            <textarea class="form-control" name="description" id="description" rows="5" placeholder="Tối đa 255 ký tự"></textarea>
                        </div>
                    </div>
                    <div class="form-group row col-12">
                        <label class="col-lg-3 ">Loại sản phẩm</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="category_id" id="category_id">
                                @foreach($category as $c)
                                    <option value="{{$c->id}}">{{$c->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row col-12">
                        <label class="col-lg-3 " for="fileUpload">Ảnh sản phẩm</label>
                        <div class="col-lg-9">
                            <input type="file" name="fileUpload" id="fileUpload" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row float-right">
                        <button style="font-size: 1.6rem; margin-right: 60px" type="submit" class="btn btn-primary">Thêm</button>
                    </div>
                </form>
            
            </div>
             <!-- end row -->
             <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        @if(Session::has('thongbao'))
                            <div class="alert alert-danger" style="color: black; font-size: 16px">
                                {{Session::get('thongbao')}}
                            </div>
                            addsuccess
                        @endif
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                <th scope="col">Mã SP</th>
                                <th scope="col">Ngày thêm</th>
                                <th scope="col">Sản phẩm</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Nhà cung cấp</th>
                                <th scope="col">Loại sản phẩm</th>
                                <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach( $pro as $p)
                                    <tr>
                                        <th scope="row">LKIC{{$p->id}}</th>
                                        <td>{{$p->created_date}}</td>
                                        <td><img src="/images/{{$p->image}}" alt="" style="width: 50px; height: 50px"/> {{$p->name}}</td>
                                        <td>  @php echo number_format($p->price, 0); @endphp</td>
                                        <td>{{$p->num}}</td>
                                        <td>{{$p->manufacturer}}</td>
                                        <td>{{$p->Category->name}}</td>
                                        <td>
                                            <div class="dropdown notification-list">
                                                <a  class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">

                                                    <span class="pro-user-name ml-1" >
                                                        <i class="material-icons" style="color: lightgray">settings</i>
                                                    </span>
                                                </a>

                                                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                                    <a href="{{route('EditProduct', ['id'=>$p->id])}}" class="dropdown-item notify-item">
                                                        <i class="fas fa-edit"></i>
                                                        <span class="badge ">Sửa</span>
                                                    </a>
                                                    <a href="{{route('prodDel', ['id'=>$p->id])}}" class="dropdown-item notify-item">
                                                        <i class="fas fa-trash-alt"></i>
                                                        <span class="badge">Xóa</span>
                                                    </a>
                                                </div>           
                                            </div>        
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div style="font-size: 12rem; color: black" class="float-right">
                            {{$pro->links()}}
                        </div>
                        
                    </div>
                   
                </div>
            </div>
        </div>
 
@stop