<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Trang chủ - Linh kiện ÍCNEWS</title>
    <link href="images1/iconweb.PNG" rel="shortcut icon"/>
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/app.min.js"></script>
    <script src="js/vendor.min.js"></script>
    <script src="js/flickity.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Paytone+One&display=swap" rel="stylesheet">
    <base href="{{asset('')}}" >
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/home.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/flickity.min.css">
    <link rel="stylesheet" type="text/css" href="css/app.min.css">
    <link rel="stylesheet" type="text/css" href="css/icons.min.css">
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="fonts/fontawesome/css/all.min.css">  
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    
    
</head>
<body>
    <div class="app">
        <header id="header">
        <!-- header bottom -->
            <div class="header__bottom">
                <div class="container">
                    <section class="row">
                        <div class="col-lg-3 col-md-4 col-sm-12 header__logo">
                            <h1 class="header__heading">
                                <a href="#" class="header__logo-link">
                                    <img src="images/banner/LogoIc.jpg" alt="Logo" class="header__logo-img">
                                </a>
                            </h1>
                        </div>

                        <form class="col-lg-6 col-md-7 col-sm-0 header__search" methob="get" action=" {{route('search')}}">
                            <select name="" id="" class="header__search-select">
                                @foreach( $category as $c)
                                    <option value="{{$c->id}}">{{$c->name}}</option>
                                @endforeach 
                                
                                
                            </select>
                            
                            <input type="text" name = "key" class="header__search-input" placeholder="Tìm kiếm tại đây...">
                            <button class="header__search-btn" type="submit">
                                <div class="header__search-icon-wrap">
                                    <i class="fas fa-search header__search-icon"></i>
                                </div>
                            </button>

                         
                           
                        </form>

                        <div class="col-lg-2 col-md-0 col-sm-0 header__call">
                            <div class="header__call-icon-wrap">
                                <i class="fas fa-phone-alt header__call-icon"></i>  
                            </div>
                            <div class="header__call-info">
                                <div class="header__call-text">
                                    Gọi điện tư vấn
                                </div>
                                <div class="header__call-number">
                                    0949048542
                                </div>
                            </div>
                        </div>

                        <a href="javascript:;" onclick="showCard()" class="col-lg-1 col-md-1 col-sm-0 header__cart">
                            <div class="header__cart-icon-wrap">
                                <span class="header__notice">{{count($cart)}}</span>
                                <i class="fas fa-shopping-cart header__nav-cart-icon"></i>
                            </div>
                        </a>
                    </section>
                </div>   
            </div>
            <!--end header bottom -->
            
            <!-- header nav -->
            <div class="header__nav">
                <div class="container">
                    <section class="row">
                        <div class="header__nav-menu-wrap col-lg-3 col-md-0 col-sm-0">
                            <i class="fas fa-bars header__nav-menu-icon"></i>
                            <div class="header__nav-menu-title">Danh mục sản phẩm</div>
                        </div>

                        <div class="header__nav col-lg-9 col-md-0 col-sm-0">
                            <ul class="header__nav-list">
                                <li class="header__nav-item">
                                    <a href="{{route('index')}}" class="header__nav-link">Trang chủ</a>
                                </li>
                                <li class="header__nav-item">
                                    <a href="#categoryList" class="header__nav-link">Danh mục sản phẩm</a>
                                </li>
                                
                                <li class="header__nav-item">
                                    <a href="{{route('contact')}}" class="header__nav-link">Liên hệ</a>
                                </li>
                                <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="header__nav-item">
                                        <a class="header__nav-link" href="{{ route('login') }}">Đăng nhập</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="header__nav-item">
                                        <a  class="header__nav-link" href="{{ route('register') }}">Đăng ký</a>
                                    </li>
                                @endif
                            @else
                                @if (Auth::user()->user_role_id==1)
                                <li class="header__nav-item">
                                    <a href="{{route('Stars')}}" class="header__nav-link">Thống kê</a>
                                </li>
                                @endif
                                @if (Auth::user()->user_role_id==1 || Auth::user()->user_role_id==3)
                                <li class="header__nav-item dropdown">
                                    <a id="navbarDropdown" class="header__nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        Quản lý
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{route('indexUser')}}">
                                            <h3>Nhân viên</h3>
                                        </a>
                                        <a class="dropdown-item" href="{{route('saleOrder')}}">
                                            <h3>Đơn hàng</h3>
                                        </a>
                                    </div>
                                </li>
                                @endif
                                @if (Auth::user()->user_role_id==1 || Auth::user()->user_role_id==3 || Auth::user()->user_role_id==4)
                                
                                <li class="header__nav-item">
                                    <a href="{{route('prodAdd')}}" class="header__nav-link">Quản lý sản phẩm</a>
                                </li>
                                @endif
                                <li class=" header__nav-item dropdown">
                                    <a id="navbarDropdown" class="header__nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                        <img src=" /images/{{ Auth::user()->image }}" alt="user-image" class="rounded-circle" style="width: 30px; height: 30px">
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('uDetail', ['id'=>auth ()->user ()->id])}}">
                                            <h3>Tài khoản</h3>
                                        </a>
                                        <a class="dropdown-item" href="{{route('userOrder')}}">
                                            <h3>Đơn hàng</h3>
                                        </a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            <h3>Đăng xuất</h3>
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest

                            </ul>
                        </div>
                    </section>
                </div>
            </div>
        </header>
        <!--end header nav -->
        @yield('content') 
        <!-- footer -->
        <footer>
            <section class="footer__top">
                <div class="container" >
                    <div class="row">
                        <article class="footer__top-intro col-lg-5 col-md-4 col-sm-6">
                            <h4 class="footer__top-intro-heading">
                                Về chúng tôi
                            </h4>
                            <div class="footer__top-intro-content">
                                Linh kiện ÍCNEWS là cửa hàng chuyên bán về các sản phẩm điện thoại ,
                                laptop, phụ kiện đi kèm, luôn cung cấp cho các bạn những mẫu mã tốt nhất và có bảo hành đầy đủ.
                                <br>
                                Điện thoại: 0949048542 <br>
                            
                            </div>
                        </article>

                        <article class="footer__top-policy col-lg-3 col-md-4 col-sm-6">
                            <h4 class="footer__top-policy-heading">
                                Chính sách mua hàng
                            </h4>

                            <ul class="footer__top-policy-list">
                                <li class="footer__top-policy-item">
                                    <a href="#" class="footer__top-policy-link">Hình thức đặt hàng</a>
                                </li>
                                <li class="footer__top-policy-item">
                                    <a href="#" class="footer__top-policy-link">Hình thức thanh toán</a>
                                </li>
                                <li class="footer__top-policy-item">
                                    <a href="#" class="footer__top-policy-link">Phương thức vận chuyển</a>
                                </li>
                                <li class="footer__top-policy-item">
                                    <a href="#" class="footer__top-policy-link">Chính sách đổi trả</a>
                                </li>
                                <li class="footer__top-policy-item">
                                    <a href="#" class="footer__top-policy-link">Hướng dẫn sử dụng</a>
                                </li>
                            </ul>
                        </article>

                        <article class="footer__top-contact-wrap col-lg-4 col-md-4 col-sm-6">
                            <h4 class="footer__top-contact-heading">
                                Hotline liên hệ
                            </h4>

                            <div class="footer__top-contact">
                                <div class="footer__top-contact-icon">
                                    <img src="images/phone_top.png" class="footer__top-contact-img">
                                </div>

                                <div class="footer__top-contact-phone-wrap">
                                    <div class="footer__top-contact-phone">
                                        0949048542
                                    </div>
                                    <div class="footer__top-contact-des">
                                        (Giải đáp thắc mắc 24/24)
                                    </div>
                                </div>
                            </div>
                        
                            <h4 class="footer__top-contact-heading">
                                Kết nối với chúng tôi
                            </h4>

                            <div class="footer__top-contact-social">
                                <a href="#" class="footer__top-contact-social-link">
                                    <img src="images/facebook.png">
                                </a>
                                <a href="#" class="footer__top-contact-social-link">
                                    <img src="images/youtube.png">
                                </a>
                                <a href="#" class="footer__top-contact-social-link">
                                    <img src="images/tiktok.png">
                                </a>
                                <a href="#" class="footer__top-contact-social-link">
                                    <img src="images/zalo.png">
                                </a>
                            </div>
                        </article>
                    </div>
                </div>
            </section>
            <section class="footer__bottom">Linh kiện ÍCNEWS
                <div class="container">
                    <div class="row">
                        <span class="footer__bottom-content">@Bản quyền thuộc về Linh kiện ÍCNEWS  </span>
                    </div>
                </div>
            </section>
        </footer>
        
        <section class ="Cart_Product">
            <i class="fas fa-times"></i>
            <h2 style="text-align: center; margin-bottom: 20px; color: tomato;"> GIỎ HÀNG CỦA BẠN</h2>
            <form action="">
                <table class="tbCard tbCard-bordered" id="table-cart">
                    <thead>
                        <tr >
                            <th></th>
                            <th>Sản Phẩm</th>
                            <th>Đơn giá</th>
                            <th>Số Lượng</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="tbd">
                        @foreach ($cart as $c)
                        <tr id="tr{{$c->id}}">
                            <td>
                                <input class="check" id="check{{$c->id}}" onclick="cartTotal()" type="checkbox" name="product" value="{{$c->id}}">
                            </td>
                            <td class="cart__body-name-title" style=" padding: 8px;  font-size: 1.5rem;">
                                <span class= "title" style="font-size: 1.5rem">{{$c->Product->name}}</span>
                            </td>
                            <td style=" padding: 8px;  font-size: 1.5rem;">
                                <span class="price" style="font-size: 1.5rem">{{$c->Product->price}}</span>
                            </td>
                            <td style=" padding: 8px;  font-size: 1.5rem;" >
                                <input class="quantity" style="width:65px;text-align:center; cursor:pointer; font-size: 1.5rem" type="number"  min="1" max="100" name="quantity" value="{{$c->quantity}}">
                            </td>
                            <td style = "cursor: pointer; padding: 8px;  font-size: 1.5rem;">
                                <a href="{{route('removeproduct', ['id'=>$c->Product->id, 'UserId'=>Auth::user()->id])}}" style="font-size: 1.5rem;">Xóa</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
                <div style="text-align:right;color:red" class="price_total">
                    <p style="font-weight: bold; font-size: 1.5rem; padding: 20px;">Tổng Tiền: <Span id="total-money" style="font-size: 1.5rem;">0</Span>  <sup>vnd</sup></p>
                </div>
                <div class="Order">
                    @if(Auth::user())
                    <h3 class="doimausale">
                        Quý khách vui lòng để lại thông tin cá nhân để mua hàng
                    </h3>
                    <form id ="FormOrderP" action="" method="get">
                        <div>
                            <input value="{{Auth::user()->name}}" type="text" id="Customer_Name" aria-describedby="emailHelp" placeholder="Họ tên của bạn..." required>
                            <span class="required"></span>
                        </div>
                        <div>
                            <input value="{{Auth::user()->phone}}" type="number" id="Customer-Phone" aria-describedby="emailHelp" placeholder="Số điện thoại của bạn..." required>
                            <span class="required"></span>
                        </div>
                        <div>
                            <input value="{{Auth::user()->Address}}" type="text" id="Customer-address" aria-describedby="emailHelp" placeholder="Địa chỉ của bạn..." required>
                            <span class="required"></span>
                        </div>
                        <!-- <p>Bạn muốn mua điện thoại trả góp bao nhiều tháng?</p>
                        <label class="radio-inline"><input type="radio" name="optradio" checked>3 Tháng</label>
                        <label class="radio-inline"><input type="radio" name="optradio">6 Tháng</label>
                        <label class="radio-inline"><input type="radio" name="optradio">9 Tháng</label>
                        <label class="radio-inline"><input type="radio" name="optradio">12 Tháng</label>
                        <textarea name="" id="" cols="200" rows="15" placeholder="Ghi chú..."></textarea>  -->
                        <button onclick="submitOrder()" class="btn btn-primary">Gửi liên hệ</button>
                    </form>
                    @else
                    <h3 class="doimausale">
                        Vui lòng <a style="font-size: 1.5rem" href="{{ route('login') }}">đăng nhập</a> để mua hàng
                    </h3>
                    @endif
                </div>
                <button onclick="btorder()" class="bto">
                    Đặt hàng
                </button>
            </form>
        </section>
        <button onclick="topFunction()" id="myBtn-scroll" title="Go to top"><i class="fas fa-chevron-up"></i></i></button>
    </div>
    
    <!-- end footer -->
	<script src="js/jq.js"></script>
    <script src="js/card.js"></script>
    <script> 
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 3,
            spaceBetween: 30,
            slidesPerGroup: 1,
            loop: true,
            loopFillGroupWithBlank: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                0: {
                    slidesPerView: 1,
                    spaceBetween: 5,

                },
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                950: {
                    slidesPerView: 3,
                    spaceBetween: 10,
                },

            },
        });

    </script>
	</body>
</html>
