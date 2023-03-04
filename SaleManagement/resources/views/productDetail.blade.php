@extends('layout')
@section('content')
    <link rel="stylesheet"  type="text/css" href="css/product.css">
    <section class="product">
        <div class="container">
            <div class="row bg-white pt-4 pb-4 border-bt pc">
                <nav class="menu__nav col-lg-3 col-md-12 col-sm-0">
                    <ul class="menu__list">
                        <li class="menu__item menu__item--active">
                            <a href="#" class="menu__link">
                            <img src="images1/item/phone.jfif" alt=""  class="menu__item-icon" id="Capa_1" enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" width="512">
                            Điện thoại</a>
                        </li>
                        <li class="menu__item">
                            <a href="#" class="menu__link">
                                <img src="images1/item/tablet.webp" alt="" class="menu__item-icon"  viewBox="0 0 512 512" width="1012" height="512">

                            Máy tính bảng</a>
                        </li>
                        <li class="menu__item">
                            <a href="#" class="menu__link">
                            <img src="images1/item/laptop.jfif" alt="" class="menu__item-icon" id="Capa_1" enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" width="512">
                            Laptop</a>
                        </li>
                    </ul>
                </nav>
                <article class="product__main col-lg-9 col-md-12 col-sm-12">
                    <div class="row">
                        <div class="slide__left product__main-img col-lg-4 col-md-4 col-sm-12">
                           
                            <img src="/images/{{$product->image}}" class="d-block w-100" alt="...">
                                    
                        </div>

                        <div class="product__main-info col-lg-8 col-md-8 col-sm-12">
                            <div class="product__main-info-breadcrumb">
                                Trang chủ / Sản phẩm
                            </div>
                            
                            <a href="#" class="product__main-info-title">
                                <h2 class="product__main-info-heading">
                                    {{$product->name}}
                                </h2>
                            </a>

                            <div class="product__main-info-rate-wrap">
                                <i class="fas fa-star product__main-info-rate"></i>
                                <i class="fas fa-star product__main-info-rate"></i>
                                <i class="fas fa-star product__main-info-rate"></i>
                                <i class="fas fa-star product__main-info-rate"></i>
                                
                            </div>

                            <div class="product__panel-price">
                                <span class="product__panel-price-old">
                                    
                                </span>
                                <span class="product__panel-price-current">
                                    @php echo number_format($product->price, 0); @endphp
                                </span>
                            </div> 

                            

                            <div class="product__main-info-description">
                                 {{$product->description}}
                            </div> 

                            <div class="product__main-info-cart">
                                <!--<div class="product__main-info-cart-quantity">
                                    <input type="button" value="-"  class="product__main-info-cart-quantity-minus">
                                    <input type="number" step="1" min="1" max="999" value="1" class="product__main-info-cart-quantity-total">
                                    <input type="button" value="+" class="product__main-info-cart-quantity-plus">
                                </div>-->
                                
                                @if(Auth::user())
                                <a href="{{route('addtocart', ['id'=>$product->id, 'UserId'=>Auth::user()->id])}}">
                                    <div class="product__main-info-cart-btn-wrap">
                                        <button class="product__main-info-cart-btn">
                                            Thêm vào giỏ hàng
                                        </button>
                                    </div>
                                </a>
                                @else
                                <a href="{{ route('login') }}">
                                    <div class="product__main-info-cart-btn-wrap">
                                        <button class="product__main-info-cart-btn">
                                            Thêm vào giỏ hàng
                                        </button>
                                    </div>
                                </a>
                                @endif
                            </div>

                            <div class="product__main-info-contact">
                                <a href="https://vi-vn.facebook.com/" class="product__main-info-contact-fb">
                                    <i class="fab fa-facebook-f"></i>
                                    Chat Facebook
                                </a>
                                <div class="product__main-info-contact-phone-wrap">
                                    <div class="product__main-info-contact-phone-icon">
                                        <i class="fas fa-phone-alt "></i>
                                    </div>
                                    
                                    <div class="product__main-info-contact-phone">
                                        <div class="product__main-info-contact-phone-title">
                                            Gọi điện tư vấn
                                        </div>
                                        <div class="product__main-info-contact-phone-number">
                                            ( 0949.048.542)
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row bg-white">
                        <div class="col-12 product__main-tab">
                            <a href="#" class="product__main-tab-link">
                                Đánh giá
                            </a>
                        </div>

                        <div class="col-12 product__main-content-wrap">
                            <div class="customer-reviews row pb-4 pb-4  py-4 pb-4 py-4 py-4">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <h3 >Bình luận sản phẩm</h3>
                                    <form id ="formgroupcomment" method="post">
                                        <div class="form-group">
                                            <label>Tên:</label>
                                            <input name="comm_name" required="" type="text" id ='form-name' class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Email:</label>
                                            <input name="comm_mail" required="" type="email"  class="form-control" id="pwd">
                                        </div>
                                        <div class="form-group">
                                            <label>Nội dung:</label>
                                            <textarea name="comm_details" required="" rows="8" id ='formcontent' class="form-control"></textarea>     
                                        </div>
                                        <button type="submit" name="sbm" id= "submitcomment" class="btn btn-primary">Gửi</button>
                                    </form> 
                                </div>
                            </div>
                                    
                            <div class="product-comment row pb-4 pb-4  py-4 pb-4 py-4 py-4">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="comment-item">
                                        <ul class = item-reviewer>
                                            <div class="comment-item-user">
                                                <img src="images/img/1.png" alt="" class="comment-item-user-img">
                                                
                                                <li><b>Nguyễn Nhung</b></li> 
                                            </div>
                                        
                                        <br>
                                            <li>2022-08-17 20:40:10</li>
                                            <li>
                                            <h4>Điện thoại mượt, đóng gói cẩn thận</h4>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="comment-item">
                                        <ul class = item-reviewer> 
                                        <div class="comment-item-user">
                                            <img src="images/img/2.png" alt="" class="comment-item-user-img">
                                            <li><b>Tùng Lương</b></li> 
                                        </div>
                                    
                                        <br>
                                            <li>2022-02-17 12:20:10</li>
                                            <li>
                                            <h4>Cấu hình ok ..không bị lag</h4>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="comment-item">
                                        <ul class = item-reviewer>
                                        <div class="comment-item-user">
                                            <img src="images/img/5.png" alt="" class="comment-item-user-img">
                                            <li><b>Trung Trần</b></li> 
                                        </div>
                                        
                                            <br>
                                        
                                            <li>2021-12-27 10:48:20</li>
                                            <li>
                                            <h4></h4>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="comment-item">
                                        <ul class = item-reviewer> 
                                        <div class="comment-item-user">
                                            <img src="images/img/6.png" alt="" class="comment-item-user-img">
                                            <li><b>Sơn Hoàng</b></li> 
                                        </div>
                                            <br>
                                        
                                            <li>2021-08-17 20:40:18</li>
                                            <li>
                                            <h4>Tôi rất hài lòng về shop</h4>
                                            </li>
                                        </ul>
                                    </div>  
                                </div>
                             </div>
                        
                        </div>
                    </div>
                </article>

                <aside class="product__aside col-lg-3 col-md-0 col-sm-0">
                    <div class="product__aside-top">
                        <div class="product__aside-top-item">
                            <img src="images/shipper.png">
                            <div class="product__aside-top-item-text">
                                <p>
                                    Giao hàng nhanh chóng
                                </p>
                                <span>
                                    Chỉ trong vòng 24h
                                </span>
                            </div>
                        </div>
                        <div class="product__aside-top-item">
                            <img src="images/brand.png">
                            <div class="product__aside-top-item-text">
                                <p>
                                    Sản phẩm chính hãng
                                </p>
                                <span>
                                    Bảo hành chính hãng linh kiện điện tử 1 năm tại các trung tâm bảo hành hãng
                                </span>
                            </div>
                        </div>
                        <div class="product__aside-top-item">
                            <img src="images/less.png">
                            <div class="product__aside-top-item-text">
                                <p>
                                    Mua hàng tiết kiệm
                                </p>
                                <span>
                                    Rẻ hơn từ 10% đến 30%
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="product__aside-bottom">
                        <h3 class="product__aside-heading">
                            Có thể bạn thích
                        </h3>
                        
                            <div class="product__aside-list">
                                <div class="Iphone-13 product__aside-item product__aside-item--border">
                                    <div class="product__aside-img-wrap">
                                        <img src="images1/product/iPhone-13-1.jpg" class="product__aside-img">
                                    </div>
                                    <div class="product__aside-title">
                                        <a href="#" class="product__aside-link">
                                            <h4 class="product__aside-link-heading">demo<span class ="doimausale">giảm giá 13%</span></h4>
                                        </a>

                                        <div class="product__aside-rate-wrap">
                                            <i class="fas fa-star product__aside-rate"></i>
                                            <i class="fas fa-star product__aside-rate"></i>
                                            <i class="fas fa-star product__aside-rate"></i>
                                            <i class="fas fa-star product__aside-rate"></i>
                                            <i class="fas fa-star product__aside-rate"></i>
                                        </div>

                                        <div class="product__panel-price">
                                            <span class="product__panel-price-old">
                                               
                                            </span>
                                            <span class="product__panel-price-current">
                                                76.000
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>
    <script src="js/product.js"></script>
@stop