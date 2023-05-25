<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
        <meta name="description" content="">
        <title>Bayangan Resort</title>        
		
        <link rel="icon" type="image/png" href="{{ asset('uploads/'.$global_setting_data->favicon) }}">

        @include('front.layout.styles')

        @include('front.layout.scripts')        
        



        <link href="https://fonts.googleapis.com/css2?family=Karla:wght@400;500&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Allura&display=swap" rel="stylesheet">
        
        <!-- Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ $global_setting_data->analytic_id }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', '{{ $global_setting_data->analytic_id }}');
        </script>

        <style>
            .main-nav nav .navbar-nav .nav-item a:hover,
            .main-nav nav .navbar-nav .nav-item:hover a,
            .slide-carousel.owl-carousel .owl-nav .owl-prev:hover, 
            .slide-carousel.owl-carousel .owl-nav .owl-next:hover,
            .home-feature .inner .icon i,
            .home-rooms .inner .text .price,
            .home-rooms .inner .text .button a,
            .blog-item .inner .text .button a,
            .room-detail-carousel.owl-carousel .owl-nav .owl-prev:hover, 
            .room-detail-carousel.owl-carousel .owl-nav .owl-next:hover {
                color: {{ $global_setting_data->theme_color_1 }};
            }

            .slider .text .button a:hover{
                background-color: {{ $global_setting_data->theme_color_2 }}!important;
            }

            .main-nav nav .navbar-nav .nav-item .dropdown-menu li a:hover,
            .primary-color {
                color: {{ $global_setting_data->theme_color_1 }}!important;
            }

            .testimonial-carousel .owl-dots .owl-dot,
            .footer ul.social li a,
            .footer input[type="submit"],
            .scroll-top,
            .room-detail .right .widget .book-now {
                background-color: {{ $global_setting_data->theme_color_1 }};
            }

            .slider .text .button a:hover,
            .search-section button[type="submit"],
            .bg-website {
                background-color: {{ $global_setting_data->theme_color_1 }}!important;
            }

            .slide-carousel.owl-carousel .owl-nav .owl-prev:hover, 
            .slide-carousel.owl-carousel .owl-nav .owl-next:hover,
            .search-section button[type="submit"],
            .room-detail-carousel.owl-carousel .owl-nav .owl-prev:hover, 
            .room-detail-carousel.owl-carousel .owl-nav .owl-next:hover,
            .room-detail .amenity .item {
                border-color: {{ $global_setting_data->theme_color_1 }}!important;
            }

            .home-feature .inner .icon i,
            .slider .text .button a,
            .home-rooms .inner .text .button a,
            .blog-item .inner .text .button a,
            .home-rooms .big-button a,
            .room-detail .amenity .item,
            .cart .table-cart tr th {
                background-color: {{ $global_setting_data->theme_color_2 }}!important;
            }

            .home-rooms .inner .text .button a:hover,
            .blog-item .inner .text .button a:hover {
                background-color: {{ $global_setting_data->theme_color_1 }}!important;
                color: {{ $global_setting_data->theme_color_2 }};
            }

            .home-rooms .big-button a {
                border-color: {{ $global_setting_data->theme_color_2 }} !important;
            }
        </style>

    </head>
    <body>
        
        <div class="top">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 left-side">
                        <ul>

                            @if($global_setting_data->top_bar_phone != '')
                            <li class="phone-text">{{ $global_setting_data->top_bar_phone }}</li>
                            @endif
                            
                            @if($global_setting_data->top_bar_email != '')
                            <li class="email-text">{{ $global_setting_data->top_bar_email }}</li>
                            @endif

                        </ul>
                    </div>
                    <div class="col-md-6 right-side">
                        <ul class="right">

                            @if($global_page_data->cart_status == 1)
                            <li class="menu"><a href="{{ route('cart') }}">{{ $global_page_data->cart_heading }} @if(session()->has('cart_room_id'))<sup>{{ count(session()->get('cart_room_id')) }}</sup>@endif</a></li>
                            @endif

                            @if($global_page_data->checkout_status == 1)
                            <li class="menu"><a href="{{ route('checkout') }}">{{ $global_page_data->checkout_heading }}</a></li>
                            @endif


                            @if(!Auth::guard('customer')->check())

                                @if($global_page_data->signup_status == 1)
                                <li class="menu"><a href="{{ route('customer_signup') }}">{{ $global_page_data->signup_heading }}</a></li>
                                @endif

                                @if($global_page_data->signin_status == 1)
                                <li class="menu"><a href="{{ route('customer_login') }}">{{ $global_page_data->signin_heading }}</a></li>
                                @endif

                            @else   

                                <li class="menu"><a href="{{ route('customer_home') }}">Dashboard</a></li>

                            @endif

                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <div class="navbar-area sticky-top" id="stickymenu">

            <!-- Menu For Mobile Device -->
            <div class="mobile-nav">
                <a href="{{ route('home') }}" class="logo">
                    <img src="{{ asset('uploads/'.$global_setting_data->favicon) }}" alt="logo">
                </a>
            </div>
        
            <!-- Menu For Desktop Device -->
            <div class="main-nav">
                <div class="container">
                    <nav class="navbar navbar-expand-md navbar-light">
                        <a class="navbar-brand" href="{{ route('home') }}">
                            <img src="{{ asset('uploads/'.$global_setting_data->logo) }}" alt="">
                        </a>
                        <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto">        
                                <li class="nav-item">
                                    <a href="{{ route('home') }}" class="nav-link">Home</a>
                                </li>

                                @if($global_page_data->about_status == 1)
                                <li class="nav-item">
                                    <a href="{{ route('about') }}" class="nav-link">{{ $global_page_data->about_heading }}</a>
                                </li>
                                @endif

                                <li class="nav-item">
                                    <a href="javascript:void;" class="nav-link dropdown-toggle">Your Stay</a>
                                    <ul class="dropdown-menu">
                                        @foreach($global_room_data as $item)
                                        <li class="nav-item">
                                            <a href="{{ route('room_detail',$item->id) }}" class="nav-link">{{ $item->name }}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </li>


                                @if($global_page_data->photo_gallery_status == 1 || $global_page_data->video_gallery_status == 1)
                                <li class="nav-item">
                                    <a href="javascript:void;" class="nav-link dropdown-toggle">Gallery</a>
                                    <ul class="dropdown-menu">

                                        @if($global_page_data->photo_gallery_status == 1)
                                        <li class="nav-item">
                                            <a href="{{ route('photo_gallery') }}" class="nav-link">{{ $global_page_data->photo_gallery_heading }}</a>
                                        </li>
                                        @endif
                                        
                                        @if($global_page_data->video_gallery_status == 1)
                                        <li class="nav-item">
                                            <a href="{{ route('video_gallery') }}" class="nav-link">{{ $global_page_data->video_gallery_heading }}</a>
                                        </li>
                                        @endif

                                    </ul>
                                </li>
                                @endif


                                @if($global_page_data->blog_status == 1)
                                <li class="nav-item">
                                    <a href="{{ route('blog') }}" class="nav-link">{{ $global_page_data->blog_heading }}</a>
                                </li>
                                @endif

                                @if($global_page_data->contact_status == 1)
                                <li class="nav-item">
                                    <a href="{{ route('contact') }}" class="nav-link">{{ $global_page_data->contact_heading }}</a>
                                </li>
                                @endif

                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>

        
        @yield('main_content')


        <footer>

            <div class="footer py-0">
            <div class="position-relative overflow-hidden">
                <div class="row" style="">
                    <div class="col-md-12 col-lg-4 py-5 d-flex justify-content-center align-items-center">
                        <div class="item  container-fluid flex-column d-flex justify-content-center align-items-center">
                            <img src="{{ asset('uploads/logo.svg') }}" alt="" width="150px" height="180px">
                            <h2 class="text-center bayangan" style="font-family: 'Allura', cursive"> Bayangan Hotel and Beach Resort</h2>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 py-5" style='background-color: #1A5F7A; color: #FEFAE0'>
                        <div class="item  container-fluid">
                            <h2 class="heading" style='border-left: 6px solid #E38B29; padding-left: 1rem'>PLAN YOUR VISIT</h2>
                            <ul class="useful-links">
                                <li><a href="{{ route('home') }}">Home</a></li>
                                <li><a href="{{ route('about') }}">About Us</a></li>
                                <li><a href="{{ route('room') }}">Accommodation</a></li>
                                <li><a href="{{ route('photo_gallery') }}">Photo Gallery</a></li>
                                <li><a href="{{ route('video_gallery') }}">Video Gallery</a></li>
                                <li><a href="{{ route('blog') }}">Blog</a></li>
                                <li><a href="{{ route('contact') }}">Contact</a></li>
                                @if($global_page_data->terms_status == 1)
                                <li><a href="{{ route('terms') }}">{{ $global_page_data->terms_heading }}</a></li>
                                @endif
                                
                                @if($global_page_data->privacy_status == 1)
                                <li><a href="{{ route('privacy') }}">{{ $global_page_data->privacy_heading }}</a></li>
                                @endif

                                @if($global_page_data->faq_status == 1)
                                <li><a href="{{ route('faq') }}">{{ $global_page_data->faq_heading }}</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 py-5 " style='background-color: #1A5F7A; color: #FEFAE0'>
                        <div class="item container-fluid">
                            <h2 class="heading" style='border-left: 6px solid #E38B29; padding-left: 1rem'>HOTEL RESERVATION</h2>
                            <div class="list-item">
                                <div class="left">
                                    <i class="fa fa-map-marker"></i>
                                </div>
                                <div class="right">
                                    {!! nl2br($global_setting_data->footer_address) !!}
                                </div>
                            </div>
                            <div class="list-item">
                                <div class="left">
                                    <i class="fa fa-volume-control-phone"></i>
                                </div>
                                <div class="right">
                                    {{ $global_setting_data->footer_phone }}
                                </div>
                            </div>
                            <div class="list-item">
                                <div class="left">
                                    <i class="fa fa-envelope-o"></i>
                                </div>
                                <div class="right">
                                    {{ $global_setting_data->footer_email }}
                                </div>
                            </div>
                            <form action="{{ route('subscriber_send_email') }}" method="post" class="form_subscribe_ajax">
                                @csrf
                                <h3 class="lead">SIGN UP FOR HOTEL OFFERS</h3>
                                <div class="form-group">
                                    <input type="text" name="email" placeholder="EMAIL" class="form-control text-white" style="border-radius: 15px; border-color: #E38B29; background-color: #1A5F7A">
                                    <span class="text-danger error-text email_error"></span>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="SUBSCRIBE" style="background-color: #E38B29; border-radius: 15px">
                                </div>
                                <div class="mt-4">
                                    <span class="small">By subscribing, you agree to receive marketing email messages from 
                                        Bayangan Hotel and Beach Resort at the email address provided. Unsubscribe
                                         at any time. View our <a href="{{ route('privacy') }}" style="text-decoration: underline; color: #FEFAE0">Privacy Policy</a> and <a href="{{ route('terms') }}" style="text-decoration: underline; color: #FEFAE0">Terms of Services</a></span>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
</footer>

        <div class="copyright small">
            {{ $global_setting_data->copyright }}
        </div>
     
        <div class="scroll-top">
            <i class="fa fa-angle-up"></i>
        </div>
		
        @include('front.layout.scripts_footer')

        @if(session()->get('error'))
            <script>
                iziToast.error({
                    title: '',
                    position: 'topRight',
                    message: '{{ session()->get('error') }}',
                });
            </script>
        @endif

        @if(session()->get('success'))
            <script>
                iziToast.success({
                    title: '',
                    position: 'topRight',
                    message: '{{ session()->get('success') }}',
                });
            </script>
        @endif

        <script>
            (function($){
                $(".form_subscribe_ajax").on('submit', function(e){
                    e.preventDefault();
                    $('#loader').show();
                    var form = this;
                    $.ajax({
                        url:$(form).attr('action'),
                        method:$(form).attr('method'),
                        data:new FormData(form),
                        processData:false,
                        dataType:'json',
                        contentType:false,
                        beforeSend:function(){
                            $(form).find('span.error-text').text('');
                        },
                        success:function(data)
                        {
                            $('#loader').hide();
                            if(data.code == 0)
                            {
                                $.each(data.error_message, function(prefix, val) {
                                    $(form).find('span.'+prefix+'_error').text(val[0]);
                                });
                            }
                            else if(data.code == 1)
                            {
                                $(form)[0].reset();
                                iziToast.success({
                                    title: '',
                                    position: 'topRight',
                                    message: data.success_message,
                                });
                            }
                            
                        }
                    });
                });
            })(jQuery);
        </script>
        <div id="loader"></div>
		
   </body>
</html>