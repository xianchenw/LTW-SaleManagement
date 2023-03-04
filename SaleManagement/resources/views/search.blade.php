@extends('layout')
@section('content')

<section class="bestselling">
    <div class="container">
        <div class="row">
            <div class="bestselling__heading-wrap">
                <div class="bestselling__heading">Tìm kiếm thấy {{count($product)}} kết quả</div>
            </div>
        </div>
        <section class="row">
            @foreach($product as $p)
                <div class=" bestselling__product col-lg-4 col-md-6 col-6">
                    <div class="bestselling__product-img-box">
                        <img src="/images/{{$p->image}}" alt="images" class="bestselling__product-img">
                    </div>
                    <div class="bestselling__product-text">
                        <h3 class="bestselling__product-title">
                            <a href="#" class="bestselling__product-link">{{$p->name}}</a>
                        </h3>

                        <div class="bestselling__product-rate-wrap">
                            <i class="fas fa-star bestselling__product-rate"></i>
                            <i class="fas fa-star bestselling__product-rate"></i>
                            <i class="fas fa-star bestselling__product-rate"></i>
                            <i class="fas fa-star bestselling__product-rate"></i>
                            
                        </div>

                        <span class="bestselling__product-price">
                            @php echo number_format($p->price, 0); @endphp
                        </span>

                        <div class="bestselling__product-btn-wrap">
                            <button  class="bestselling__product-btn">
                                <a href="{{ route('prodDetail', ['id'=>$p->id])}}" class="info_product_link" >Xem Hàng</a></span>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </section>
    </div>
      
</section>
@stop