@extends('Frontend.layout.layout')
@section('title', $blog->title)
@section('content')
<style>
    .text * {
        color: white !important;
    }
    .comments-area {
    margin-top: 40px;
    }
    .dbox {
        border-bottom: 1px solid #eee;
        padding-bottom: 15px;
    }
    .dleft figure {
        margin: 0;
    }
    .dright h5 {
        font-weight: 600;
    }

</style>


    <section class="breadcumb-area jarallax bg-img af">
        <div class="breadcumb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="content">
                            <h2>Blog Details</h2>
                            <ul>
                                <li><a href="/">Home</a></li>
                                <li><a href="javascript:void(0)">blog</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Breadcumb area end here-->
    <!--Blog details area start here-->
    <section class="blog-details section">
        <div class="container">
            <div class="row">

                <div class="col-sm-9">
                    <div class="blog-details">
                        <div class="blogs">
                            <figure>
                                <div class="date"><strong></strong><span>aug</span></div>
                                <img src="assets/images/blog/7.jpg" alt="" />
                            </figure>
                            <div class="content-post">
                                <div class="content">
                                    <ul>
                                        <li><i class="fas fa-user"></i><span>{{$blog->user->name}}</span></li>
                                        <li><i class="fa fa-comments"></i><span>547</span></li>
                                        <li><i class="fa fa-clone"></i><span>weapons market</span></li>
                                    </ul>
                                    <h4 style="color: #fff">{{$blog->title}}</h4>
                                </div>
                            <div class="text" style="color: white;">
                                <div class="text">
                                    <div class="container">
                                        <p>{!! $blog->content !!}</p>
                                    </div>
                                </div>
                            </div>

                            </div>
                        </div>
                      <div class="comments-area">
                            <h3>Comments <span>({{ count($blog_comments) }})</span></h3>
                            <div class="comment-list">
                                @foreach ($blog_comments as $comment)
                                    <div class="dbox d-flex mb-4">
                                        <div class="dleft me-3">
                                            <figure>
                                                <img src="{{ asset('assets/images/blog/default-user.png') }}" alt="User" width="60" height="60" style="border-radius: 50%;">
                                            </figure>
                                        </div>
                                        <div class="dright">
                                            <h5 class="mb-1">{{ $comment->name }} <span class="text-muted" style="font-size: 14px;">({{ $comment->email }})</span></h5>
                                            <p class="mb-0">{{ $comment->comment }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="comment-box">
                        <h3>Leave a <span>Comment</span></h3>
                        <form action="{{ route('blog.comment.submit') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="hidden" name="blog_id" value="{{$blog->id}}">
                                    <input type="text" name="name" placeholder="Your Name" class="form-control mb-3" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="email" name="email" placeholder="Your Email" class="form-control mb-3" required>
                                </div>
                                <div class="col-12">
                                    <textarea name="comment" rows="5" class="form-control mb-3" placeholder="Your Comment" required></textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Post Comment</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    </div>
                </div>
                  <div class="col-lg-3 col-md-12 sol-sm-12 col-12">
                    <div class="sibebar">
                    <div class="wighet post">
                            <h3>RECENT <span>NEWS</span></h3>
                        @foreach ($recent_blogs as $blog)
                        <div class="post-list">
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