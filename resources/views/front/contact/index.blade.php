@extends('front.layout.master')

@section('title', 'Contact')

@section('body')

    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="./"><i class="fa fa-home"> Home</i></a>
                        <span>Contact</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Map Section Begin -->
    <div class="map spad">
        <div class="container">
            <div class="map-inner">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3835.733396310403!2d108.25016631465006!3d15.975293088939008!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142108997dc971f%3A0x1295cb3d313469c9!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBDw7RuZyBuZ2jhu4cgVGjDtG5nIHRpbiB2w6AgVHJ1eeG7gW4gdGjDtG5nIFZp4buHdCAtIEjDoG4!5e0!3m2!1svi!2s!4v1667629692368!5m2!1svi!2s"
                height="610" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
                <div class="icon">
                    <i class="fa fa-map-marker"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- Map Section End -->

    <!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="contact-title">
                        <h4>Contact us</h4>
                        <p> tqn ShoesShop cung cấp thông tin các mẫu giày dép đẹp, độc lạ, giá cả phải chăng đến với người tiêu dùng.
                            Nếu bạn có bất cứ thắc mắc gì về cửa hàng, sản phẩm, nhân viên, hãy liên hệ ngay với chúng tôi<br>
                            Thời gian làm việc: 7h30-17h | T2 - T7
                        </p>
                    </div>
                    <div class="contact-widget">
                        <div class="cw-item">
                            <div class="ci-icon">
                                <i class="ti-location-pin"></i>
                            </div>
                            <div class="ci-text">
                                <span>Address:</span>
                                <p>440 Tran Dai Nghia - Da Nang</p>
                            </div>
                        </div>
                        <div class="cw-item">
                            <div class="ci-icon">
                                <i class="ti-mobile"></i>
                            </div>
                            <div class="ci-text">
                                <span>Phone:</span>
                                <p>+84 364.287.702</p>
                            </div>
                        </div>
                        <div class="cw-item">
                            <div class="ci-icon">
                                <i class="ti-email"></i>
                            </div>
                            <div class="ci-text">
                                <span>Email:</span>
                                <p>tqnshoesshop@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <div class="contact-form">
                        <div class="leave-comment">
                            <h4>Để lại phản hồi</h4>
                            <p>Nhân viên chúng tôi sẽ liên hệ với bạn lại sau và giải đáp thắc mắc của bạn</p>
                            <form action="" method="post" class="comment-form">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ \Illuminate\Support\Facades\Auth::user()->id ?? null }}">

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <input type="text" placeholder="Your name" name="name" required>
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="email" placeholder="Your email" name="email" required>
                                        </div>
                                        <div class="col-lg-12">
                                            <textarea placeholder="Your message" name="messages" required></textarea>
                                            <button type="submit" class="site-btn">Send Message</button>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section Begin -->

@endsection
