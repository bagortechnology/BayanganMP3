@extends('front.layout.app')

@section('main_content')
<div class="page-top">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $single_post_data->heading }}</h2>
            </div>
        </div>
    </div>
</div>

        <!-- BEGIN SHAREAHOLIC CODE -->
        <script data-cfasync="false" async src="https://cdn.shareaholic.net/assets/pub/shareaholic.js"></script>
        <!-- END SHAREAHOLIC CODE -->

<div class="page-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-12">
                <div class="featured-photo">
                    <img src="{{ asset('uploads/'.$single_post_data->photo) }}" alt="featured image" class="img-fluid rounded-bottom">
                </div>
                <div class="sub">
                    <div class="item">
                        <b><i class="fa fa-clock-o"></i> Updated</b>
                        {{ date('M d, Y', strtotime($single_post_data->updated_at)) }}
                    </div>
                    <div class="item">
                        <b><i class="fa fa-eye"></i> Views</b>
                        {{ $single_post_data->total_view }}
                    </div>
                </div>
                <div class="main-text">
                    {!! $single_post_data->content !!}
                </div>
                <div class="disqus-comment">
                    @include('front.layout.disqus-comment')
                </div>
            </div>



        </div>
    </div>
</div>
@endsection