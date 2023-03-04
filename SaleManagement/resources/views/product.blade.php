
@extends('layout')
@section('content')
<script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
    <!-- slide - menu list -->
    <section class="menu-slide">
        <div class="container">
            <div class="row">
                <nav class="menu__nav col-lg-3 col-md-12 col-sm-0">
                    <ul class="menu__list">
                        @foreach( $category as $c)
                        <li class="menu__item menu__item--active">
                            <a href="#" class="menu__link">
                                {{$c->name}}
                            </a>
                        </li>
                      @endforeach  
                       
                    </ul>
                </nav>
                <div class="slider col-lg-9 col-md-12 col-sm-0">
                    <div class="row">
                        <div class="slide__left col-lg-8 col-md-0 col-sm-0">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="3000">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="images/banner/1.jpg" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                      <img src="images/banner/1.jpg" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                      <img src="images/banner/1.jpg" class="d-block w-100" alt="...">
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                                </a>
                            </div>
                            <div class="slide__left-bottom">
                                <div class="slide__left-botom-one">
                                    <img src="images/banner/banner1.gif" class="slide__left-bottom-one-img">
                                </div>
                                <div class="slide__left-bottom-two">
                                    <img src="images/banner/lazBanner.gif" class="slide__left-bottom-tow-img">
                                </div>
                            </div>
                        </div>

                        <div class="slide__right col-lg-4 col-md-0 col-sm-0">
                            <img src="images/banner/4.png" class="slide__right-img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end slide menu list -->
    <!-- score-top-->
    <!-- bestselling product -->
    <section class="bestselling">
        <div class="container">
            <div class="main-carousel">
                <div class="row justify-content-center">
                    <div class="carousel-phone__heading">Top sản phẩm hot</div>
                </div>
                
                <div class="main-carousel-phone">
                @foreach($product as $p)
                    <div class=" product__panel-item col-lg-3 col-md-4 col-sm-6 col-6">
                        <div class="product__panel-item-wrap">
                            <a href="{{ route('prodDetail', ['id'=>$p->id])}}" >
                                <div class="product__panel-img-wrap">
                                    <img src="/images/{{$p->image}}" alt="" class="product__panel-img">
                                </div>
                                
                                <div class="product__panel-text">
                                    <h3 class="product__panel-heading">
                                        <a href="#" class="product__panel-link">{{$p->name}}</a>
                                    </h3>
                                    <div class="product__panel-rate-wrap">
                                        <i class="fas fa-star product__panel-rate"></i>
                                        <i class="fas fa-star product__panel-rate"></i>
                                        <i class="fas fa-star product__panel-rate"></i>
                                        <i class="fas fa-star product__panel-rate"></i>
                                        <i class="fas fa-star product__panel-rate"></i>
                                    </div>
                                    <div class="product__panel-price">
                                        <span class="product__panel-price-current">
                                        @php echo number_format($p->price, 0); @endphp
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="bestselling__heading-wrap">
                    <img src="images/bestselling.png" alt="Sản phẩm bán chạy"
                    class="bestselling__heading-img">
                    <div class="bestselling__heading">Top Sản phẩm mới nhất</div>
                </div>
            </div>
            <section class="row">
                @foreach($productnew as $p)
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
            <div class="row bestselling__banner">

                <div class="bestselling__banner-left col-lg-6">
                    <img src="images/banner/1.jpg" alt="Banner quảng cáo"
                    class="bestselling__banner-left-img">
                </div>
                <div class="bestselling__banner-right col-lg-6">
                    <img src="images/banner/1.jpg" alt="Banner quảng cáo"
                    class="bestselling__banner-right-img">
                </div>
            </div>
        </div>  
    </section>
    <!-- end bestselling product -->

    <!-- product -->
    <section class="product">
        <div class="container">
            <div class="row">
                <aside class="product__sidebar col-lg-3 col-md-0 col-sm-12">
                    <div class="product__sidebar-heading">
                        <div class=""></div>
                        <h2 class="product__sidebar-title">
                        <!-- <img src="" alt="" class="menu__item-icon" id="Capa_1" enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" width="512"> -->
                       Phụ Kiện</h2>
                    </div>

                   

                    <div class="product__sidebar-img-wrap">
                        <!-- <img src="images1/product/Demon Slayer_ Kimetsu no Yaiba - Assista na Crunchyroll.png" width="255" height="350" alt=""> -->
                        <video width="255" height="200" controls>
                        <source src="video/vivo V21 5G x @J97 Jack  - Trọn Từng Phút Đẹp Từng Giây.mp4" type="video/mp4">
                        </video>
                        <!-- <img src="images/banner_7.jpg" alt="" class="product__sidebar-img"> -->
                    </div>
                    

                    <div class="product__sidebar-img-wrap">
                        <!-- <img src="images1/product/Demon Slayer_ Kimetsu no Yaiba - Assista na Crunchyroll.png" width="255" height="350" alt=""> -->
                        <video width="255" height="200" controls>
                        <source src="video/video gioi thieu.mp4" type="video/mp4">
                        </video>
                        <!-- <img src="images/banner_7.jpg" alt="" class="product__sidebar-img"> -->
                    </div>
                </aside>

                <article class="product__content col-lg-9 col-md-12">
                    <nav class="row">
                        <ul class="product__list hide-on-mobile">
                            <li class="product__item product__item--active">
                                <a href="#" class="product__link">Tool, Thiết Bị, Phụ Kiện</a>
                            </li>
                            <li class="product__item">
                                <a href="#" class="product__link"> Linh Kiện Bán Dẫn</a>
                            </li>
                            <li class="product__item">
                                <a href="#" class="product__link">Module</a>
                            </li>
                            <li class="product__item">
                                <a href="#" class="product__link">Tool Test</a>
                            </li>
                        </ul>

                        <div class="product__title-mobile">
                            <h2>Tool, Thiết Bị, Phụ Kiện</h2>
                        </div>
                    </nav>

                    <div class="row product__panel">
                        @foreach($product as $p)

                            <div class="product__panel-item col-lg-3 col-md-4 col-sm-6 col-6">
                                <div class="product__panel-item-wrap">
                                    <a href="{{ route('prodDetail', ['id'=>$p->id])}}" >
                                        <div class="product__panel-img-wrap">
                                            <img src="/images/{{$p->image}}" alt="" class="product__panel-img">
                                        </div>
                                        
                                        <div class="product__panel-text">
                                            <h3 class="product__panel-heading">
                                                <a href="#" class="product__panel-link">{{$p->name}}</a>
                                            </h3>
                                            <div class="product__panel-rate-wrap">
                                                <i class="fas fa-star product__panel-rate"></i>
                                                <i class="fas fa-star product__panel-rate"></i>
                                                <i class="fas fa-star product__panel-rate"></i>
                                                <i class="fas fa-star product__panel-rate"></i>
                                                <i class="fas fa-star product__panel-rate"></i>
                                            </div>
                                            <div class="product__panel-price">
                                                <span class="product__panel-price-current">
                                                @php echo number_format($p->price, 0); @endphp
                                                </span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </article>
            </div>
        </div>
    </section>
    <!--end product -->
    <!-- end post -->
    <!-- post -->
    <section class="posts" id="info" >
            <div class="container" >
                <div class="slide-user-online">
                    <div class="swiper mySwiper container">
                        <div class="swiper-wrapper content">
                            @foreach( $user as $u)
                            <div class="swiper-slide card ">
                                <div class="card-content">
                                    <div class="image">
                                        <img src="/images/{{$u->image}}" alt="">
                                    </div>
                                    <div class="name-profession">
                                        <span class="name">{{$u->name}}</span>
                                        <span class="profession">(Nhân viên tư vấn)</span>
                                    </div>
                                    <div class="button">
                                        <button class="aboutMe">
                                            <a href="javascript:0">
                                                <i class="fa fa-phone" aria-hidden="true" style=" font-size: 14px;"></i>
                                                Liên hệ
                                            </a>
                                        </button>
                                        <button class="hireMe">
                                            <a href="javascript:0">
                                                <i class="fa fa-comment" aria-hidden="true" style=" font-size: 14px;"></i>
                                                Nhắn tin
                                            </a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </section>
    
    <div class="main__modal">
        <div class="modal__overlay"></div>
        <div class="modal__body">
            <!-- resgist form -->
            <div class=" sale-off">
                <div class="sale-off__container">
                    <h2 class="sale-off__heading">
                        Nhận phiếu giảm giá <span class="sale-off__sp">40%</span>  khi mua sản phẩm mới ra mắt tại Shop Linh kiện ÍCNEWS
                    </h2>
                    <div class="sale-off__img">
                        <img src="/images/{{$p->image}}" width="300">
                    </div>
                    <span class="sale-off__name">{{$p->name}}</span><br>
                    <a href="{{ route('prodDetail', ['id'=>$p->id])}}"  class="sale-off__link">
                        <button class="sale-off__btn">Xem ngay</button>
                    </a>
                </div>

                <div class="sale-off__close">
                    <!-- <svg class="sale-off__close-icon" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times" class="svg-inline--fa fa-times fa-w-11" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512"><path fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"></path></svg> -->
                    x
                </div>
            </div>
        </div>
    </div>
    <script src="js/index.js"></script>
@stop