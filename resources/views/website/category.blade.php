@extends('layouts.website')
  @section('content')
    
    <div class="site-cover site-cover-sm overlay single-page"
        style="background-image: url('{{asset('public/admin/post-img/category-bg.jpg')}}'); background-position: center center;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="post-entry text-center">
                        <h2 class="text-light font-weight-bold">Category</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="site-section bg-white">
        <div class="container">
            <div class="row">
                @foreach ($CategoryPost as $categories)
                <div class="col-lg-4 mb-4">
                    <div class="entry2">
                        <a href="{{ route('single.post',$categories->slug) }}"><img src="{{asset('public/admin/post-img/'.$categories->image)}}" alt="Image" class="img-fluid rounded"></a>
                        <div class="excerpt">
                            <span class="post-category text-white bg-success mb-3">{{ $categories->Category->name }}</span>

                            <h2><a href="{{ route('single.post',$categories->slug) }}">{{ $categories->title }}</a></h2>
                            <div class="post-meta align-items-center text-left clearfix">
                                @if ($categories->User->image == NULL)
                                    <figure class="author-figure mb-0 mr-3  d-inline-block"><img src="{{asset('public/admin/user-img/user.jpg')}}" alt="Image" class="img-fluid">
                                    </figure>
                                @else
                                    <figure class="author-figure mb-0 mr-3 d-inline-block"><img src="{{asset('public/admin/user-img/'.$categories->User->image)}}" alt="Image" class="img-fluid">
                                    </figure>
                                @endif
                                <span class="d-inline-block mt-1">By <a href="#">{{ $categories->User->name }}</a></span>
                                <span>&nbsp;-&nbsp; {{ date('M d, Y', strtotime($categories->publish_at)) }}</span>
                            </div>

                            <p>{!! Str::of($categories->description)->limit(120) !!}</p>
                            <p><a href="{{ route('single.post',$categories->slug) }}">Read More</a></p>
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
            <div class="row text-center pt-5 border-top">
                <div class="col-md-12">
                        {{ $CategoryPost->links() }}
                </div>
            </div>
        </div>
  </div>
    
    
   @endsection