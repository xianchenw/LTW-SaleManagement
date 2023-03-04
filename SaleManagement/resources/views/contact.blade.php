@extends('layout')
@section('content')
<link rel="stylesheet"  type="text/css" href="css/product.css">
<link rel="stylesheet"  type="text/css" href="css/contact.css">
<section class="contact">
    	<div class="container">
    		<div class="row mt-4 mb-50 pc">
                <nav class="menu__nav col-lg-3 col-md-12 col-sm-0">
                    <ul class="menu__list">
                        <ul class="menu__list">
                            @foreach( $category as $c)
                                <li class="menu__item menu__item--active">
                                    <a href="#" class="menu__link">
                                        {{$c->name}}
                                    </a>
                                </li>
                            @endforeach 
                        </ul>
                    </ul>
                </nav>

                <div class="col-12 contact__map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.9307587752796!2d106.67637871474926!3d10.81661089229422!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528e195f816b7%3A0xfb5c0101490d8870!2zMzcxIE5ndXnhu4VuIEtp4buHbSwgUGjGsOG7nW5nIDMsIEfDsiBW4bqlcCwgVGjDoG5oIHBo4buRIEjhu5MgQ2jDrSBNaW5oIDcwMDAwLCBWaWV0bmFt!5e0!3m2!1sen!2s!4v1670470292271!5m2!1sen!2s" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>

    		<div class="row mt-4 mb-4">
                <div class="col-lg-6 col-md-6 col-sm-12 contact__self">
                    <h3 class="mb-4">
                        Liên hệ với chúng tôi
                    </h3>
                    <p>
                        Để không ngừng nâng cao chất lượng dịch vụ và đáp ứng tốt hơn nữa các yêu cầu mua thiết bị điện tử(Điện thoại, Laptop, máy tính bảng, ...) của Quý khách, chúng tôi mong muốn nhận được các thông tin phản hồi. Nếu Quý khách có bất kỳ thắc mắc hoặc đóng góp nào, xin vui lòng liên hệ với chúng tôi theo thông tin dưới đây. Chúng tôi sẽ phản hồi lại Quý khách trong thời gian sớm nhất.
                    </p>
                    <h3 class="mt-4 mb-4">
                        Thông tin liên hệ
                    </h3>
                    
                    <ul class="contact__self-list">
                        <li class="contact__self-item">
                            <a class="contact__self-link" href="#">Nhân sự Cửa hàng Linh kiện ÍCNEWS</a>
                        </li>
                        <li class="contact__self-item">
                            <a class="contact__self-link" href="#">Quản lý Nhân Viên: Nguyễn Thị triệu Vi - 0949.048.542 </a>
                        </li>
                        <li class="contact__self-item">
                            <a class="contact__self-link" href="#">Quản lý thị trường: Trần Thị Bích Hồng - 0774.255.630</a>
                        </li>
                        <li class="contact__self-item">
                            <a class="contact__self-link" href="#">Quản lý kinh doanh: Trần Thị Thu hiền - 0964.345.626</a>
                        </li>
                        
                        <li class="contact__self-item">
                            <a class="contact__self-link" href="#">Quản lý Hàng Hóa: Trần Cơ Hùng - 0986.456.777</a>
                        </li>
                        <li class="contact__self-item">
                            <a class="contact__self-link" href="#">Địa chỉ: 371 Nguyễn Kiệm, phường 3, Gò Vấp, Thành Phố Hồ Chí Minh</a>
                        </li>
                    </ul>
                </div>
    			<div class="col-lg-6 col-md-6 col-sm-12 contact__regist" >
    				<h3 class="mb-4">
    					LIÊN HỆ
    				</h3>

    				<p>Quý khách vui lòng để lại thông tin để nhân viên tư vấn điện lại cho bạn sớm nhất!</p>

    				<form>
					    <input type="text" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Họ tên của bạn...">

					    <input type="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email của bạn...">

					    <input type="number" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Số điện thoại...">
						
						<textarea name="" id="" cols="200" rows="15" placeholder="Nội dung cần tư vấn..."></textarea> 
					  <button type="submit">Gửi liên hệ</button>
					</form>
    			</div>
    		</div>
    	</div>
    </section>
@stop