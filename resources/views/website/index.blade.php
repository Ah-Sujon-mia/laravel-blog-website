@extends('layouts.website')

@section('content')
<div class="site-section bg-light">
    <div class="container">
        <div class="row align-items-stretch retro-layout-2">
            <div class="col-md-4">
                @foreach ($FastPost as $Posts)
                    <a href="{{ route('single.post',$Posts->slug) }}" class="h-entry mb-30 v-height gradient"
                    style="background-image: url('{{asset('public/admin/post-img/'.$Posts->image)}}');">

                        <div class="text">
                            <h2>{{ $Posts->title }}</h2>
                            <span class="date">{{ date('M, d Y', strtotime($Posts->publish_at)) }}</span>
                        </div>
                    </a>
                @endforeach

            </div>
            <div class="col-md-4">
                @foreach ($MiddlePost as $MPost)
                    <a href="{{ route('single.post',$MPost->slug) }}" class="h-entry img-5 h-100 gradient"
                    style="background-image: url('{{asset('public/admin/post-img/'.$MPost->image)}}');">

                        <div class="text">
                            <div class="post-categories mb-3">
                                <span class="post-category bg-danger">{{ $MPost->Category->name }}</span>
                            </div>
                            <h2>{{ $MPost->title }}</h2>
                            <span class="date">{{ date('M, d Y', strtotime($MPost->publish_at)) }}</span>
                        </div>
                    </a>
                @endforeach

            </div>
            <div class="col-md-4">

                @foreach ($LastPost as $item)
                    <a href="{{ route('single.post',$item->slug) }}" class="h-entry mb-30 v-height gradient"
                        style="background-image: url('{{asset('public/admin/post-img/'.$item->image)}}');">

                        <div class="text">
                            <h2>{{ $item->title }}</h2>
                            <span class="date">{{ date('M, d Y', strtotime($item->publish_at)) }}</span>
                        </div>
                    </a>
                @endforeach

            </div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12">
                <h2>Recent Posts</h2>
            </div>
        </div>
        <div class="row">

            @foreach ($Post as $Value)
            <div class="col-lg-4 mb-4">
                <div class="entry2">
                    <a href="{{ route('single.post',$Value->slug) }}"><img style="width:100%; height:250px;" src="{{asset('public/admin/post-img/'.$Value->image)}}" alt="Image"
                            class="img-fluid rounded"></a>
                    <div class="excerpt">
                        <span class="post-category text-white bg-success rounded-0 mb-3">{{ $Value->Category->name }}</span>

                        <h2><a href="{{ route('single.post',$Value->slug) }}">{{ Str::of($Value->title)->limit(35) }}</a></h2>
                        <div class="post-meta align-items-center text-left clearfix">
                            @if ($Value->User->image == NULL)
                                <figure class="author-figure mb-0 mr-3 float-left"><img
                                src="{{asset('public/admin/user-img/user.jpg')}}" alt="Image" class="img-fluid">
                                </figure>
                            @else
                                <figure class="author-figure mb-0 mr-3 float-left"><img
                                    src="{{asset('public/admin/user-img/'.$Value->User->image)}}" alt="Image" class="img-fluid">
                                </figure>
                            @endif

                            <span class="d-inline-block mt-1">By <a href="#">{{ $Value->User->name }}</a></span>
                            <span>&nbsp;-&nbsp; {{ date('M d,Y', strtotime($Value->publish_at)) }}</span>
                        </div>

                        <p>{!! Str::of($Value->description)->limit(120) !!}</p>
                        <p><a href="{{ route('single.post',$Value->slug) }}">Read More</a></p>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        <style>
            .pagination li a, .pagination li span {
                border-radius: 50% !important;
                width: 40px;
                height: 40px;
                line-height: 37px;
                padding: 0;
                margin: 0;
                display: inline-block;
                text-align: center;
                font-size: 18px;
                font-weight: 500;
            }
            .pagination li a.page-link,
            .pagination li span.page-link,
            .page-item.disabled .page-link
            {
                border-color: #2f89fc;
            }
        </style>
        <div class="row pt-5">
            <div class="col-md-12">
                <div class="">
                    {{$Post->links()}}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="site-section bg-light">
    <div class="container">

        <div class="row align-items-stretch retro-layout">

            <div class="col-md-5 order-md-2">
                @foreach ($FastPosts as $fast)
                    <a href="{{ route('single.post',$fast->slug) }}" class="hentry img-2 v-height mb30 h-100 gradient"
                    style="background-image: url('{{asset('public/admin/post-img/'.$fast->image)}}');">
                    <span class="post-category text-white bg-success">{{ $fast->Category->name }}</span>
                    <div class="text text-sm">
                        <h2>{{ $fast->title }}</h2>
                        <span>{{ date('M, d Y', strtotime($fast->publish_at)) }}</span>
                    </div>
                </a>
                @endforeach
            </div>

            <div class="col-md-7">

                @foreach ($MiddlePosts as $middle)
                    <a href="{{ route('single.post',$middle->slug) }}" class="hentry img-2 v-height mb30 gradient"
                    style="background-image: url('{{asset('public/admin/post-img/'.$middle->image)}}');">
                    <span class="post-category text-white bg-success">{{ $middle->Category->name }}</span>
                    <div class="text text-sm">
                        <h2>{{ $middle->title }}</h2>
                        <span>{{ date('M, d Y', strtotime($middle->publish_at)) }}</span>
                    </div>
                </a>
                @endforeach
                <style>
                    .two-col a:nth-child(1){
                        margin-right: 30px;
                    }
                </style>
                <div class="two-col d-block d-md-flex">
                    @foreach ($LastPosts as $last)
                        <a href="{{ route('single.post',$last->slug) }}" class="hentry img-2 v-height gradient"
                            style="background-image: url('{{asset('public/admin/post-img/'.$last->image)}}');">
                            <span class="post-category text-white bg-success">{{ $last->Category->name }}</span>
                            <div class="text text-sm">
                                <h2>{{ $last->title }}</h2>
                                <span>{{ date('M, d Y', strtotime($last->publish_at)) }}</span>
                            </div>
                        </a>
                    @endforeach
                </div>

            </div>
        </div>

    </div>
</div>
{{--  

<div class="site-section bg-lightx">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-md-5">
                <div class="subscribe-1 ">
                    <h2>Subscribe to our newsletter</h2>
                    <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit nesciunt error illum a
                        explicabo, ipsam nostrum.</p>
                    <form action="#" class="d-flex">
                        <input type="text" class="form-control" placeholder="Enter your email address">
                        <input type="submit" class="btn btn-primary" value="Subscribe">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>  --}}
@endsection
