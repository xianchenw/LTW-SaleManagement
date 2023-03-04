@extends('layout')
@section('content')
<link rel="stylesheet"  type="text/css" href="css/product.css">
    <section class="product">
        <div class="container">
            <div class="row bg-white pt-4 pb-4 border-bt pc">
                <a style="align-self: center;text-decoration:none;color:black;" class="col-md-2" href="/order/admin?status=1"><h3 style="text-align:center">PENDING</h3></a>
                <a style="align-self: center;text-decoration:none;color:black;" class="col-md-2" href="/order/admin?status=2"><h3 style="text-align:center">CONFIRMED</h3></a>
                <a style="align-self: center;text-decoration:none;color:black;" class="col-md-2" href="/order/admin?status=3"><h3 style="text-align:center">SHIPPING</h3></a>
                <a style="align-self: center;text-decoration:none;color:black;" class="col-md-2" href="/order/admin?status=4"><h3 style="text-align:center">DELIVERED</h3></a>
                <a style="align-self: center;text-decoration:none;color:black;" class="col-md-2" href="/order/admin?status=6"><h3 style="text-align:center">COMPLETED</h3></a>
                <a style="align-self: center;text-decoration:none;color:black;" class="col-md-2" href="/order/admin?status=7"><h3 style="text-align:center">CANCELLED</h3></a>
            </div>
            <br><br>
            <div class="row bg-white pt-4 pb-4 border-bt pc">
                <article class="product__main col-lg-9 col-md-12 col-sm-12 ">
                    @foreach($orders as $order)
                    <div class="order border rounded" style="padding:20px; margin-bottom:20px">
                        <div class="row" style="align-self:center;">
                            <h3 style="text-align: left;">KHÁCH HÀNG: {{$order->Customer->name}}</h3>
                            <h3 style="text-align: left;">Ngày đặt: {{$order->created_date}}</h3>
                            <h3 style="text-align: left;">Số điện thoại: {{$order->Customer->phone}}</h3>
                            <h3 style="text-align: left;">Địa chỉ: {{$order->Customer->Address->info}}, {{$order->Customer->Address->Ward->info}}, {{$order->Customer->Address->Ward->District->info}}, {{$order->Customer->Address->Ward->District->Province->info}}</h3>
                        </div>
                        <div class="row" style="align-self:center;">
                            <h3 style="text-align: right;">TRẠNG THÁI ĐƠN HÀNG: <span style="color:green"><h3>{{$order->OrderStatus->name}}</h3></span></h3>
                        </div>
                        <div class="row">
                            @foreach($order->OrderDetail->all() as $orderdetail)
                            <div class="row col-md-10 border-bottom" >
                                <div class=" bestselling__product col-lg-12 col-md-12 col-12">
                                    <div style="" class="col-md-3">
                                        <img src="/images/{{$orderdetail->Product->image}}" alt="images" class="bestselling__product-img">
                                    </div>
                                    <div class="col-md-9">
                                        <h3 class="col-md-12">
                                            <a href="#" class="bestselling__product-link">{{$orderdetail->Product->name}}</a>
                                        </h3>
                                        <div class="">
                                            <h3>X {{$orderdetail->quantity}}</h3>
                                        </div>
                                        <div  style="color:darkred;  vertical-align: bottom;">
                                            <h3 style="vertical-align:bottom">@php echo number_format($orderdetail->unit_price,0) @endphp đ</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="row" style="align-content:right">
                            <h2 style="text-align:right;color:orange;">@php echo number_format($order->total_money,0) @endphp đ</h2>
                        </div>
                        <br>
                        <div class="row" >
                            <div class="col-md-10"></div>
                            <div class="col-md-2">
                                <a style="width:100%;" href="/order/admin/?updateStatus={{$order->id}}"><button style="font-size:1.5rem; text-align:center; width:100%;" class="btn btn-success">XÁC NHẬN</button></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </article>
            </div>
        </div>
    </section>
@stop