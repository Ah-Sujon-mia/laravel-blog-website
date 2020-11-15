@extends('layouts.website')

@section('content')


<div class="site-cover site-cover-sm same-height overlay single-page"
    style="background-image: url('{{asset('public/admin/post-img/'.$SinglePost->image)}}');">
    <div class="container">
        <div class="row same-height justify-content-center">
            <div class="col-md-12 col-lg-10">
                <div class="post-entry text-center">
                    <span class="post-category text-white bg-success mb-3">{{ $SinglePost->Category->name }}</span>
                    <h1 class="mb-4"><a href="javascript:void()">{{ $SinglePost->title }}</a></h1>
                    <div class="post-meta align-items-center text-center">

                        @if ($SinglePost->User->image == NULL)
                        <figure class="author-figure mb-0 mr-3  d-inline-block"><img
                                src="{{asset('public/admin/user-img/user.jpg')}}" alt="Image" class="img-fluid">
                        </figure>
                        @else
                        <figure class="author-figure mb-0 mr-3 d-inline-block"><img
                                src="{{asset('public/admin/user-img/'.$SinglePost->User->image)}}" alt="Image"
                                class="img-fluid">
                        </figure>
                        @endif

                        <span class="d-inline-block mt-1">By {{ $SinglePost->User->name }}</span>
                        <span>&nbsp;-&nbsp; {{ date('M, d Y', strtotime($SinglePost->publish_at)) }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="site-section py-lg">
    <div class="container">

        <div class="row blog-entries element-animate">

            <div class="col-lg-8 col-md-12 main-content">

                <div class="post-content-body">
                    <p>{!! $SinglePost->description !!}</p>
                </div>

                <div class="pt-5">
                    <p>Categories: <a href="#">{{ $SinglePost->Category->name }}</a><br>
                        
                    </p>
                    <!-- Go to www.addthis.com/dashboard to customize your tools -->
                <div class="addthis_inline_share_toolbox"></div>
                </div>

                {{-- comment  --}}
                <div class="pt-5">
                    <h3 class="mb-5">6 Comments</h3>
                    <div id="disqus_thread"></div>
                    
                    <!-- END comment-list -->
                </div>

            </div>

            <!-- END main-content -->

            <div class="col-lg-4 col-md-12 sidebar">
                <div class="sidebar-box search-form-wrap">
                    <form action="#" class="search-form">
                        <div class="form-group">
                            <span class="icon fa fa-search"></span>
                            <input type="text" class="form-control" id="s" placeholder="Type a keyword and hit enter">
                        </div>
                    </form>
                </div>
                <!-- END sidebar-box -->
                <div class="sidebar-box">
                    <div class="bio text-center">
                        @if ($SinglePost->User->image == NULL)
                            <img src="{{asset('public/admin/user-img/user.jpg')}}" alt="Image" Placeholder" class="img-fluid mb-5">
                        @else
                            <img src="{{asset('public/admin/user-img/'.$SinglePost->User->image)}}" alt="Image" Placeholder" class="img-fluid mb-5">
                        @endif

                        <div class="bio-body">
                            <h2>{{ $SinglePost->User->name }}</h2>
                            <p class="mb-4">{!! $SinglePost->User->description !!}</p>
                            <p><a href="#" class="btn btn-primary btn-sm rounded px-4 py-2">Read my bio</a></p>
                            <p class="social">
                                <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                                <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                                <a href="#" class="p-2"><span class="fa fa-instagram"></span></a>
                                <a href="#" class="p-2"><span class="fa fa-youtube-play"></span></a>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- END sidebar-box -->
                <div class="sidebar-box">
                    <h3 class="heading">Popular Posts</h3>
                    <div class="post-entry-sidebar">
                        <ul>
                            @foreach ($Post as $PopulerPost)
                            <li>
                                <a href="{{ route('single.post',$PopulerPost->slug) }}">
                                    <img src="{{asset('public/admin/post-img/'.$PopulerPost->image)}}" alt="Image" placeholder"
                                        class="mr-4">
                                    <div class="text">
                                        <p class="text-dark" style="font-size: 17px;">{{ $PopulerPost->title }}</p>
                                        <div class="post-meta">
                                            <span class="mr-2">{{ date('M d, Y', strtotime($PopulerPost->publish_at)) }}</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- END sidebar-box -->

                <div class="sidebar-box">
                    <h3 class="heading">Categories</h3>
                    <ul class="categories">
                        @foreach ($Category as $category)
                            <li><a href="{{ route('category.post', $category->id) }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <!-- END sidebar-box -->

                <div class="sidebar-box">
                    <h3 class="heading">Tags</h3>
                    <ul class="tags">
                        @foreach ($Tag as $PostTag)
                        <li><a href="#">{{ $PostTag->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <!-- END sidebar -->

        </div>
    </div>
</section>

<div class="site-section bg-light">
    <div class="container">

        <div class="row mb-5">
            <div class="col-12">
                <h2>More Related Posts</h2>
            </div>
        </div>

        <div class="row align-items-stretch retro-layout">

            @foreach ($ReletedPost as $Value)
            <div class="col-lg-4 mb-4">
                <div class="entry2">
                    <a href="{{ route('single.post',$Value->slug) }}"><img style="width:100%; height:250px;" src="{{asset('public/admin/post-img/'.$Value->image)}}" alt="Image"
                            class="img-fluid rounded"></a>
                    <div class="excerpt">
                        <span class="post-category text-white bg-success rounded-0 mb-3">{{ $Value->Category->name }}</span>

                        <h2><a href="{{ route('single.post',$Value->slug) }}">{{ Str::of($Value->title)->limit(37) }}</a></h2>
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

    </div>
</div>


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
</div>



@endsection

@push('comment')

    <script>
    /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
    /*
    var disqus_config = function () {
    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    */
    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://blog-website-3.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                            
@endpush