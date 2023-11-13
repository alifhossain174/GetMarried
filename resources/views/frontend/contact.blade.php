@extends('frontend.master')

@section('content')
    <!-- Breadcrumbs Area -->
    <section class="breadcrumbs-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-8 col-12">
                    <div class="breadcrumbs-content">
                        <h3 class="breadcrumbs-title">যোগাযোগ করুন</h3>
                        <ul class="breadcrumbs-menu">
                            <li>
                                <a href="{{url('/')}}">হোম</a><i class="fi fi-rs-angle-small-right"></i>
                            </li>
                            <li class="active">
                                <a href="{{url('/contact')}}">যোগাযোগ</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Breadcrumbs Area -->

    <!-- Contact Us Area -->
    <section class="contact-us-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-xl-10 col-md-10 col-12">
                    <div class="contact-us-inner">
                        <div class="row g-0">
                            <div class="col-lg-6 col-12">
                                <form class="contact-form" action="#" method="post">
                                    <div class="form-group">
                                        <label>নাম</label>
                                        <input type="text" name="name" required />
                                    </div>
                                    <div class="form-group">
                                        <label>ইমেইল</label>
                                        <input type="email" name="email" required />
                                    </div>
                                    <div class="form-group">
                                        <label>বিষয়</label>
                                        <input type="text" name="subject" required />
                                    </div>
                                    <div class="form-group">
                                        <label>আপনার বার্তা</label>
                                        <textarea name="message" required></textarea>
                                    </div>
                                    <div class="contact-form-btn">
                                        <button type="submit" class="theme-btn">পাঠান</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="contact-us-map">
                                    <div class="gmap_canvas">
                                        <iframe id="gmap_canvas"
                                            src="https://maps.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.0104336321297!2d90.41270911479724!3d23.782642793461232!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b165a1921a09%3A0xb58f02520cb0cb41!2sSoftifyBD%20Ltd.!5e0!3m2!1sen!2sbd!4v1669619081345!5m2!1sen!2sbd"
                                            width="434" height="500"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact Us Area -->
@endsection
