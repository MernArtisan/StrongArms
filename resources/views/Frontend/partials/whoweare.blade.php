 <section class="about-area section ">
     <div class="container">
         <div class="row">
             <div class="col-md-7 col-sm-12">
                 <div class="section-heading2">
                     <h2>{{ $cms_content[0]->item_1 }}</h2>
                 </div>
                 <div class="about-contents">
                     <p>{{ $cms_content[0]->description_1 ?? '' }}</p>
                     <blockquote>{{ $cms_content[0]->description_2 ?? '' }}</blockquote>
                     <p>{{ $cms_content[0]->description_3 ?? '' }}
                     </p>
                     <div class="buttons">
                         {{-- <a href="#" class="btn1">Read More</a> --}}
                     </div>
                 </div>
             </div>
             <div class="col-md-5 col-sm-12 ">
                 <div class="about-cata">
                     <div class="cata-list list-t1">
                         <div class="dbox">
                             <div class="dleft">
                                 <div class="content">
                                     <h4>{{ $cms_content[0]->item_2 }}</h4>
                                     {{-- <a href="#" class="btn3">Read More<i class="fas fa-arrow-right"></i></a> --}}
                                 </div>
                             </div>
                             <div class="dright">
                                 <div class="cate-ico">
                                     <img src="{{ asset('admin/assets/images/icons/01.png') }}" alt="" />
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="cata-list list-t2">
                         <div class="dbox">
                             <div class="dleft">
                                 <div class="content">
                                     <h4>{{ $cms_content[0]->item_3 }}</h4>
                                     {{-- <a href="#" class="btn3">Read More<i class="fas fa-arrow-right"></i></a> --}}
                                 </div>
                             </div>
                             <div class="dright">
                                 <div class="cate-ico">
                                     <img src="{{ asset('admin/assets/images/icons/02.png') }}" alt="" />
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="cata-list list-t1">
                         <div class="dbox">
                             <div class="dleft">
                                 <div class="content">
                                     <h4>{{ $cms_content[0]->item_4 }}</h4>
                                     {{-- <a href="#" class="btn3">Read More<i class="fas fa-arrow-right"></i></a> --}}
                                 </div>
                             </div>
                             <div class="dright">
                                 <div class="cate-ico">
                                     <img src="{{ asset('admin/assets/images/icons/03.png') }}" alt="" />
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
