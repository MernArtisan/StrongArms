@extends('frontend.layout.layout')
@section('title', 'Blog')
@section('content')

    <section class="breadcumb-area jarallax bg-img af">
        <div class="breadcumb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="content">
                            <h2>Our Blog's</h2>
                            <ul>
                                <li><a href="index-2.html">Home</a></li>
                                <li><a href="javascript:void(0)">blog</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Breadcumb area end here-->
    <!--Blog page area start here-->
    <section class="blog-pages section">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12 col-12 ">
                    <div class="row">
                        @foreach ($blogs as $blog)
                        <div class="col-sm-6">
                            <div class="blog-list">
                                <figure>
                                    <img src="{{asset($blog->image)}}" alt="" style="width: 500px;height:300px"/>
                                    <div class="date">
                                        <strong>{{ $blog->created_at->format('d') }}</strong>
                                        <span>{{ $blog->created_at->format('M') }}</span>
                                    </div>
                                </figure>
                                <div class="content">
                                    <h3>{{ $blog->title }}</h3>
                                    <a href="{{route('blogs.detail', $blog->id)}}" class="btn3">Read More <i class="fa fa-angle-double-right"></i></a>
                                </div>
                            </div>
                        </div>
                       @endforeach
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 sol-sm-12 col-12">
                    <div class="sibebar">
                        <div class="wighet search">
                            <form>
                                <input type="search" placeholder="Search here">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                       
                    <div class="wighet post">
                            <h3>RECENT <span>NEWS</span></h3>
                        @foreach ($recent_blogs as $blog)
                        <div class="post-list">
                                <div class="thimb">
                                    <a href="#"><img src="{{asset($blog->image)}}" alt="" style="width: 60px; height: 60px;"/></a>
                                </div>
                        <div class="con">
                                    <a href="#"><h6>{{$blog->title}}</h6></a>
                                    <span>{{$blog->created_at}}</span>
                            </div>
                        </div>
                            
                        @endforeach
                    
                </div>
            </div>
        </div>
    </section>


@endsection
