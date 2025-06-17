@extends('Frontend.layout.layout')
@section('title', 'Blog')
@section('content')

    <section class="breadcumb-area jarallax bg-img af">
        <div class="breadcumb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="content">
                            <h2>Contact us</h2>
                            <ul>
                                <li><a href="/">Home</a></li>
                                <li><a href="javascript:void(0)">contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Breadcumb area end here-->
    <!--Contact area start here-->
    <section class="contact-area section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="map-area">
                        <a href="#" class="go-map">Go to Map</a>
                        <div class="map-full">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1737.6221882978507!2d-98.48650795000005!3d29.421653200000023!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x865c58aa57e6a56f%3A0xf08a9ad66f03e879!2sHenry+B.+Gonzalez+Convention+Center!5e0!3m2!1sen!2sus!4v1393884854786"></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mr-b50">
                <div class="col-lg-4 col-md-12 col-xs-12 col-sm-12">
                    <div class="contact-info">
                        <span><i class="fa fa-map-marker"></i></span>
                        <p>{{ $generals[0]->address }}
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-xs-12 col-sm-12">
                    <div class="contact-info">
                        <span><i class="fa fa-phone"></i></span>
                        <p>{{ $generals[0]->phone }}</p>

                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-xs-12 col-sm-12">
                    <div class="contact-info">
                        <span><i class="fa fa-envelope"></i></span>
                        <p>{{ $generals[0]->email }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="section-heading">
                        <h2>{{ $cms_content[2]->name ?? 'N/A' }}</h2>
                        <p>{!! $cms_content[2]->description ?? 'N/A' !!}.</p>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-area">
                        <form action="{{ route('contact.save') }}" method="POST">
                            @csrf
                            <fieldset>
                                <div class="row">
                                    <div class="col-sm-4 col-xs-12 feld">
                                        <input type="text" class="require" placeholder="Full Name *" required
                                            name="full_name">
                                        <span><i class="fa fa-user"></i></span>
                                    </div>
                                    <div class="col-sm-4 col-xs-12 feld">
                                        <input type="email" class="require" placeholder="Email *" required name="email">
                                        <span><i class="fa fa-envelope"></i></span>
                                    </div>
                                    <div class="col-sm-4 col-xs-12 feld">
                                        <input type="text" class="require" placeholder="Subject" required name="subject">
                                        <span><i class="fa fa-star"></i></span>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="feld">
                                    <textarea placeholder="Message" class="require" required name="message"></textarea>
                                    <span class="msg"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </fieldset>
                            <div class="btn-area text-center">
                                <div class="response"></div>
                                <input type="hidden" name="form_type" value="contact">
                                <div class="btn-center">
                                    <button type="submit" class="submitForm btn1"><span>Send now</span></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
