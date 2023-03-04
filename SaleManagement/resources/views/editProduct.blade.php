
@extends('layout')
@section('content')
<link rel="stylesheet"  type="text/css" href="css/product.css">
    @if( $errors-> any())
        <div class="elert elert-danger">
            <ul>
                @foreach($errors-> all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container" style="justify-content: center;  align-items: center;">
            
        <div class="col-lg-12 col-md-12 col-sm-12 " style="margin-bottom: 70px; margin-top: 30px; display:flex">
            <div  class="col-3" >
                <img src="/images/{{$product->image}}" alt="" style="width: 200px; height: 200px; margin: 20px"/>

            </div>
           
            <form method ="post" action ="{{Route('editPro2')}}" class="form-horizontal col-9">
               
                <div class="form-group row col-12">
                    
                    <label class="col-3 ">Tên sản phẩm:</label>
                    <div class="col-lg-9">
                        <input type="text" value="{{$product->name}}" name="name" id="name" class="form-control">
                    </div>
                </div>
                <div class="form-group row col-12">
                    <label class="col-lg-3 " for="price">Giá</label>
                    <div class="col-lg-9">
                    <input type="number" value="{{$product->price}}" name="price" id="price" class="form-control" >
                    </div>
                </div>
                <div class="form-group row col-12">
                    <label class="col-lg-3 ">Số lượng</label>
                    <div class="col-lg-9">
                        <input type="number" value="{{$product->num}}" name="num" id="num" class="form-control" >
                    </div>
                </div>

                <div class="form-group row col-12">
                    <label class="col-lg-3 " for="manufacturer">Nhà cung cấp</label>
                    <div class="col-lg-9">
                        <input type="text" value="{{$product->manufacturer}}" name="manufacturer" id="manufacturer" class="form-control">
                    </div>
                </div>
                <div class="form-group row col-12">
                    <label class="col-lg-3 " for="example-textarea">Mô tả</label>
                    <div class="col-lg-9">
                        <input  class="form-control" value="{{$product->description}}" name="description" id="description" rows="5" placeholder="Tối đa 255 ký tự"/>
                    </div>
                </div>
                <div class="form-group row col-12">
                    <label class="col-lg-3 ">Loại sản phẩm</label>
                    <div class="col-lg-9">
                        <select class="form-control" name="category_id" id="category_id">
                            @foreach($category as $c)
                                <option value="{{$c->id}}" {{$c->id==$product->category_id ? 'selected' :""}}>{{$c->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row float-right">
                    <button style="font-size: 1.6rem; margin-right: 60px" type="submit" class="btn btn-primary">Sửa</button>
                </div>
            </form>
        
        </div>
    </div>
 
@stop