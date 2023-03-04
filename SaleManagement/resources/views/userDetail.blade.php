@extends('layout')
@section('content')
    <link rel="stylesheet"  type="text/css" href="css/product.css">
    <section class="product">
        <div class="container">
            <div class="row bg-white pt-4 pb-4 border-bt pc">
                <article class="product__main col-lg-9 col-md-12 col-sm-12">
                    <div class="row">
                        <div class="slide__left product__main-img col-lg-4 col-md-4 col-sm-12">
                           
                            <img src="/images/{{$users->image}}" class="d-block w-100" alt="...">
                                    
                        </div>

                        <div class="product__main-info col-lg-8 col-md-8 col-sm-12" style="padding: 30px">
                            <div class="product__main-info-breadcrumb" style="text-align: center">
                                <h1>Trang cá nhân</h1>
                            </div>
                            <div class="product__main-info-description">
                                Tên: {{$users->name}}
                            </div> 
                            <div class="product__main-info-description">
                                Ngày sinh:
                                 {{$users->email}}
                            </div> 
                            <div class="product__main-info-description">
                                Giới tính:
                                 {{$users->Gender->name}}
                            </div>
                            <div class="product__main-info-description">
                                Số điện thoại:
                                 {{$users->phone}}
                            </div>
                            <div class="product__main-info-description">
                               Địa chỉ:
                                 {{$users->Address->info}}, {{$users->Address->Ward->info}},
                                 {{$users->Address->Ward->District->info}}, {{$users->Address->Ward->District->Province->info}}
                            </div>
                            <div class="product__main-info-description">
                                Chức vụ:
                                 {{$users->UserRole->name}}
                            </div>
                            <div class="product__main-info-description">
                                Ngày tạo:
                                 {{$users->created_at}}
                            </div></br>
                            <td>
                                <div class="dropdown notification-list">
                                    <a  class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">

                                        <span class="pro-user-name ml-1" >
                                            <i class="material-icons" style="color: lightgray">settings</i>
                                        </span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                        <a href="" class="dropdown-item notify-item">
                                            <i class="fas fa-edit"></i>
                                            <span class="badge ">Sửa</span>
                                        </a>
                                        <a href="" class="dropdown-item notify-item">
                                            <i class="fas fa-trash-alt"></i>
                                            <span class="badge">Xóa</span>
                                        </a>
                                    </div>           
                                </div>  
                            </td>    
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>
    <script src="js/product.js"></script>
@stop