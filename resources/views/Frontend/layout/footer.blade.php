<footer class="jarallax">
    <div class="footer-top section">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="foo-about">
                        <figure><img src="{{ asset('assets/images/logo/logo.png') }}" alt="" /></figure>
                        <div class="contents">
                            <p>All modern weapons can appreciate our broad services. Lorem Ipsum placeholder.</p>
                            {{-- <a href="#" class="btn3">Read more <i class="fas fa-arrow-right"></i></a> --}}
                        </div>
                        <ul class="foo-social">
                            <li><a href="{{ $generals[0]->facebook }}" target="_blank"><i
                                        class="fab fa-facebook-f"></i></a> </li>
                            <li><a href="{{ $generals[0]->twitter }}"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="{{ $generals[0]->instagram }}"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="{{ $generals[0]->linkedin }}"><i class="fab fa-linkedin-in"></i></a></li>
                        </ul>
                    </div>
                </div>
                {{-- <div class="col-md-4">
                    <h2>Latest News</h2>
                    <div class="foo-news">
                        <div class="newslists">
                            <div class="dbox">
                                <div class="dleft">
                                    <figure><img src="{{ asset('assets/images/blog/sm-1.jpg') }}" alt="" />
                                    </figure>
                                </div>
                                <div class="dright">
                                    <h4><a href="#">Weapons 2024</a></h4>
                                    <p>Weapons can appreciate our services.</p>
                                    <span><i class="fas fa-calendar"></i> 12 Jan 2024</span>
                                </div>
                            </div>
                        </div>
                        <div class="newslists">
                            <div class="dbox">
                                <div class="dleft">
                                    <figure><img src="{{ asset('assets/images/blog/sm-2.jpg') }}" alt="" />
                                    </figure>
                                </div>
                                <div class="dright">
                                    <h4><a href="#">Weapons 2024</a></h4>
                                    <p>Weapons can appreciate our services.</p>
                                    <span><i class="fas fa-calendar"></i> 12 Jan 2024</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="col-md-4">
                    <h2>Product Shop</h2>
                    <div class="products-foo">
                        <ul>
                            <li><a href="#"><img src="{{ asset('assets/images/products/sm1.jpg') }}"
                                        alt="" /></a></li>
                            <li><a href="#"><img src="{{ asset('assets/images/products/sm2.jpg') }}"
                                        alt="" /></a></li>
                            <li><a href="#"><img src="{{ asset('assets/images/products/sm3.jpg') }}"
                                        alt="" /></a></li>
                            <li><a href="#"><img src="{{ asset('assets/images/products/sm4.jpg') }}"
                                        alt="" /></a></li>
                        </ul>
                        <p>For more products and guns click here!</p>
                        <a href="{{ route('productview.index') }}" class="btn1">Our Shop</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="mb-0">© 2024 <a href="{{ url('/') }}" class="text-white font-weight-bold">Strong
                            Arms</a>. All rights reserved.</p>

                </div>
                <div class="col-md-6">
                    <ul class="foo-links">
                        <li><a href="#" data-bs-toggle="modal" data-bs-target="#privacyModal">{{$cms_content[13]->name}}</a>
                        </li>
                        <li><a href="#" data-bs-toggle="modal" data-bs-target="#termsModal">{{$cms_content[14]->name}}</a>
                        </li>
                        <li><a href="#" data-bs-toggle="modal" data-bs-target="#copyrightModal">{{$cms_content[15]->name}}</a></li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Privacy Policy Modal -->
<div class="modal fade" id="privacyModal" tabindex="-1" aria-labelledby="privacyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header" style="color:saddlebrown">
                <h5 class="modal-title" id="privacyModalLabel">{{$cms_content[13]->name}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" >
                <p style="color:black">{{$cms_content[13]->description}}</p>
            </div>
        </div>
    </div>
</div>

<!-- Terms & Conditions Modal -->
<div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header" style="color:saddlebrown">
                <h5 class="modal-title" id="termsModalLabel">{{$cms_content[14]->name}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p style="color:black">{{$cms_content[14]->description}}</p>
            </div>
        </div>
    </div>
</div>

<!-- Copyright Policy Modal -->
<div class="modal fade" id="copyrightModal" tabindex="-1" aria-labelledby="copyrightModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header" style="color:saddlebrown">
                <h5 class="modal-title" id="copyrightModalLabel">{{$cms_content[15]->name}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p style="color:black">{{$cms_content[15]->description}}</p>
            </div>
        </div>
    </div>
</div>
