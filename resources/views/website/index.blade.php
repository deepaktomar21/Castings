@extends('website.partials.app')

@section('title', 'Home')

@section('content')
<div class="mfp-bg mfp-ready"></div>
<div class="mfp-wrap mfp-close-btn-in mfp-auto-cursor mfp-ready" tabindex="-1" style="overflow: hidden auto;"><div class="mfp-container mfp-s-ready mfp-inline-holder"><div class="mfp-content"><div class="container newsletter-popup-container" id="newsletter-popup-form">
  <div class="row justify-content-center">
      <div class="col-10">
          <div class="bg-white row no-gutters newsletter-popup-content">
              <div class="col-xl-3-5col col-lg-7 banner-content-wrap">
                  <div class="text-center banner-content">
                      <img src="assets/images/popup/newsletter/logo.png" class="logo" alt="logo" width="60" height="15">
                      <h2 class="banner-title">get <span>25<light>%</light></span> off</h2>
                      <p>Subscribe to the Molla eCommerce newsletter to receive timely updates from your favorite products.</p>
                      <form action="#">
                          <div class="input-group input-group-round">
                              <input type="email" class="form-control form-control-white" placeholder="Your Email Address" aria-label="Email Adress" required="">
                              <div class="input-group-append">
                                  <button class="btn" type="submit"><span>go</span></button>
                              </div><!-- .End .input-group-append -->
                          </div><!-- .End .input-group -->
                      </form>
                      <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="register-policy-2" required="">
                          <label class="custom-control-label" for="register-policy-2">Do not show this popup again</label>
                      </div><!-- End .custom-checkbox -->
                  </div>
              </div>
              <div class="col-xl-2-5col col-lg-5 ">
                  <img src="assets/images/popup/newsletter/img-1.jpg" class="newsletter-img" alt="newsletter">
              </div>
          </div>
      </div>
  </div>
<button title="Close (Esc)" type="button" class="mfp-close"><span>×</span></button></div></div><div class="mfp-preloader">Loading...</div></div></div>
<div class="fashion_section">
  <div id="main_slider" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="container">
          <h1 class="fashion_taital">Man & Woman Fashion</h1>
          <div class="fashion_section_2">
            <div class="row">
              <div class="col-lg-4 col-sm-4">
                <div class="box_main">
                  <h4 class="shirt_text">Man T -shirt</h4>
                  <p class="price_text">Price <span style="color: #262626;">$ 30</span></p>
                  <div class="tshirt_img"><img src="{{ asset('website/images/tshirt-img.png') }}"></div>
                  <div class="btn_main">
                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                    <div class="seemore_bt"><a href="#">See More</a></div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-4">
                <div class="box_main">
                  <h4 class="shirt_text">Man -shirt</h4>
                  <p class="price_text">Price <span style="color: #262626;">$ 30</span></p>
                  <div class="tshirt_img"><img src="{{ asset('website/images/dress-shirt-img.png') }}"
                      alt="Dress Shirt">
                  </div>
                  <div class="btn_main">
                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                    <div class="seemore_bt"><a href="#">See More</a></div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-4">
                <div class="box_main">
                  <h4 class="shirt_text">Woman Scart</h4>
                  <p class="price_text">Price <span style="color: #262626;">$ 30</span></p>
                  <div class="tshirt_img"><img src="{{ asset('website/images/women-clothes-img.png') }}"
                      alt="Women Clothes">
                  </div>
                  <div class="btn_main">
                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                    <div class="seemore_bt"><a href="#">See More</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <div class="container">
          <h1 class="fashion_taital">Man & Woman Fashion</h1>
          <div class="fashion_section_2">
            <div class="row">
              <div class="col-lg-4 col-sm-4">
                <div class="box_main">
                  <h4 class="shirt_text">Man T -shirt</h4>
                  <p class="price_text">Price <span style="color: #262626;">$ 30</span></p>
                  <div class="tshirt_img"><img src="{{ asset('website/images/tshirt-img.png') }}"></div>
                  <div class="btn_main">
                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                    <div class="seemore_bt"><a href="#">See More</a></div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-4">
                <div class="box_main">
                  <h4 class="shirt_text">Man -shirt</h4>
                  <p class="price_text">Price <span style="color: #262626;">$ 30</span></p>
                  <div class="tshirt_img"><img src="{{ asset('website/images/dress-shirt-img.png') }}"></div>
                  <div class="btn_main">
                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                    <div class="seemore_bt"><a href="#">See More</a></div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-4">
                <div class="box_main">
                  <h4 class="shirt_text">Woman Scart</h4>
                  <p class="price_text">Price <span style="color: #262626;">$ 30</span></p>
                  <div class="tshirt_img"><img src="{{ asset('website/images/tshirt-img.png') }}" alt="T-Shirt">
                  </div>
                  <div class="btn_main">
                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                    <div class="seemore_bt"><a href="#">See More</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <div class="container">
          <h1 class="fashion_taital">Man & Woman Fashion</h1>
          <div class="fashion_section_2">
            <div class="row">
              <div class="col-lg-4 col-sm-4">
                <div class="box_main">
                  <h4 class="shirt_text">Man T -shirt</h4>
                  <p class="price_text">Price <span style="color: #262626;">$ 30</span></p>
                  <div class="tshirt_img"><img src="{{ asset('website/images/tshirt-img.png') }}" alt="T-Shirt">
                  </div>
                  <div class="btn_main">
                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                    <div class="seemore_bt"><a href="#">See More</a></div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-4">
                <div class="box_main">
                  <h4 class="shirt_text">Man -shirt</h4>
                  <p class="price_text">Price <span style="color: #262626;">$ 30</span></p>
                  <div class="tshirt_img"><img src="{{ asset('website/images/dress-shirt-img.png') }}"
                      alt="Dress Shirt">
                  </div>
                  <div class="btn_main">
                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                    <div class="seemore_bt"><a href="#">See More</a></div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-4">
                <div class="box_main">
                  <h4 class="shirt_text">Woman Scart</h4>
                  <p class="price_text">Price <span style="color: #262626;">$ 30</span></p>
                  <div class="tshirt_img"><img src="{{ asset('website/images/women-clothes-img.png') }}"
                      alt="Women Clothes">
                  </div>
                  <div class="btn_main">
                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                    <div class="seemore_bt"><a href="#">See More</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
      <i class="fa fa-angle-left"></i>
    </a>
    <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
      <i class="fa fa-angle-right"></i>
    </a>
  </div>
</div>

@endsection