<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from d-themes.com/html/riode/demo1.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 10 Aug 2022 11:21:30 GMT -->
<head>
<meta charset="UTF-8">

@php

$header=DB::Table('headers')->first();

@endphp
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
<title>{{$header->title}}</title>

<meta name="keywords" content="HTML5 Template" />
<meta name="description" content="Riode - Ultimate eCommerce Template">
<meta name="author" content="D-THEMES">
<meta name="csrf-token" content="{{ csrf_token() }}" />

<!-- Favicon -->
<link rel="icon" type="image/png" href="images/icons/favicon.png">
<!-- Preload Font -->
<link rel="preload" href="fonts/riode115b.ttf?5gap68" as="font" type="font/woff2" crossorigin="anonymous">
<link rel="preload" href="vendor/fontawesome-free/webfonts/fa-solid-900.woff2" as="font" type="font/woff2"
crossorigin="anonymous">
<link rel="preload" href="vendor/fontawesome-free/webfonts/fa-brands-400.woff2" as="font" type="font/woff2"
crossorigin="anonymous">
<link rel="stylesheet" type="text/css" 
     href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
     <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>

<script>
    WebFontConfig = {
        google: { families: ['Poppins:300,400,500,600,700,800'] }
    };
    (function (d) {
        var wf = d.createElement('script'), s = d.scripts[0];
        wf.src = 'js/webfont.js';
        wf.async = true;
        s.parentNode.insertBefore(wf, s);
    })(document);
</script>

<script src="https://js.stripe.com/v3/"></script>

<style>
  
#productlist{

position:absolute;
top: 100%;
left: 0%;
width: 100%;
background:#fff;
z-index: 999;
border-radius:4px;
margin-top: 2px;


}




</style>

<link rel="stylesheet" type="text/css" href="{{asset('fro/vendor/fontawesome-free/css/all.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('fro/vendor/animate/animate.min.css')}}">

<!-- Plugins CSS File -->
<link rel="stylesheet" type="text/css" href="{{asset('fro/vendor/magnific-popup/magnific-popup.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('fro/vendor/owl-carousel/owl.carousel.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('fro/vendor/photoswipe/photoswipe.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('fro/vendor/photoswipe/default-skin/default-skin.min.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('fro/vendor/sticky-icon/stickyicon.css')}}">

<!-- Main CSS File -->
<link rel="stylesheet" type="text/css" href="{{asset('fro/css/demo1.min.css')}}">
<link rel="stylesheet" href="sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" 
     href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@yield('css')


</head>

<body class="home">

<div class="page-wrapper">
    <header class="header">
        <div class="header-top">
            <div class="container">
                <div class="header-left">
                    <p class="welcome-msg">{{$header->heading}}</p>
                </div>
                <div class="header-right">
                    
                  
                    <!-- End DropDown Menu -->
                    <span class="divider"></span>
                    
                     @if(Auth::id())
                     <a href="{{url('/order-tracking')}}" class="contact d-lg-show"><i class="d-icon-map"></i>Order Tracking</a>
                      <a href="{{url('/myaccount')}}" class="link-to-tab d-md-show"><i class="d-icon-user"></i>My Account</a>
                    @else
                    <a href="{{url('/login')}}" class="link-to-tab d-md-show"><i class="d-icon-user"></i>Sign
                    in</a>
                    <span class="delimiter">/</span>
                    <a href="{{url('/register')}}" class="link-to-tab d-md-show ml-0">Register</a>
                    @endif

                    <div class="dropdown login-dropdown off-canvas">
                        <div class="canvas-overlay"></div>
                        <!-- End Login Toggle -->
                        <div class="dropdown-box scrollable">
                            <div class="login-popup">
                                <div class="form-box">
                                    <div class="tab tab-nav-simple tab-nav-boxed form-tab">
                                        <ul class="nav nav-tabs nav-fill align-items-center border-no justify-content-center mb-5"
                                        role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active border-no lh-1 ls-normal"
                                            href="{{url('/login')}}">Login</a>
                                        </li>
                                        <li class="delimiter">or</li>
                                        <li class="nav-item">
                                            <a class="nav-link border-no lh-1 ls-normal"
                                            href="{{url('/register')}}">Register</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="signin">
                                            <form action="#">
                                                <div class="form-group mb-3">
                                                    <input type="text" class="form-control" id="singin-email"
                                                    name="singin-email"
                                                    placeholder="Username or Email Address *" required="">
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" class="form-control"
                                                    id="singin-password" name="singin-password"
                                                    placeholder="Password *" required="">
                                                </div>
                                                <div class="form-footer">
                                                    <div class="form-checkbox">
                                                        <input type="checkbox" class="custom-checkbox"
                                                        id="signin-remember" name="signin-remember">
                                                        <label class="form-control-label"
                                                        for="signin-remember">Remember
                                                    me</label>
                                                </div>
                                                <a href="#" class="lost-link">Lost your password?</a>
                                            </div>
                                            <button class="btn btn-dark btn-block btn-rounded"
                                            type="submit">Login</button>
                                        </form>
                                        <div class="form-choice text-center">
                                            <label class="ls-m">or Login With</label>
                                            <div class="social-links">
                                                <a href="#" title="social-link"
                                                class="social-link social-google fab fa-google border-no"></a>
                                                <a href="#" title="social-link"
                                                class="social-link social-facebook fab fa-facebook-f border-no"></a>
                                                <a href="#" title="social-link"
                                                class="social-link social-twitter fab fa-twitter border-no"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="register">
                                        <form action="#">
                                            <div class="form-group mb-3">
                                                <input type="email" class="form-control" id="register-email"
                                                name="register-email" placeholder="Your Email Address *"
                                                required="">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control"
                                                id="register-password" name="register-password"
                                                placeholder="Password *" required="">
                                            </div>
                                            <div class="form-footer">
                                                <div class="form-checkbox">
                                                    <input type="checkbox" class="custom-checkbox"
                                                    id="register-agree" name="register-agree"
                                                    required="">
                                                    <label class="form-control-label" for="register-agree">I
                                                        agree to the
                                                    privacy policy</label>
                                                </div>
                                            </div>
                                            <button class="btn btn-dark btn-block btn-rounded"
                                            type="submit">Register</button>
                                        </form>
                                        <div class="form-choice text-center">
                                            <label class="ls-m">or Register With</label>
                                            <div class="social-links">
                                                <a href="#" title="social-link"
                                                class="social-link social-google fab fa-google border-no"></a>
                                                <a href="#" title="social-link"
                                                class="social-link social-facebook fab fa-facebook-f border-no"></a>
                                                <a href="#" title="social-link"
                                                class="social-link social-twitter fab fa-twitter border-no"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button title="Close (Esc)" type="button" class="mfp-close"><span>×</span></button>
                    </div>
                </div>
                <!-- End Dropdown Box -->
            </div>
            <!-- End of Login -->
        </div>
    </div>
</div>
<!-- End HeaderTop -->
<div class="header-middle sticky-header fix-top sticky-content">
    <div class="container">
        <div class="header-left">
            <a href="#" class="mobile-menu-toggle">
                <i class="d-icon-bars2"></i>
            </a>
            <a href="{{url('/')}}" class="logo">
                <img src="{{asset('/image/'.$header->logo)}}" alt="logo" width="153" height="44" />
            </a>
            <!-- End Logo -->

            <div class="header-search hs-simple">
                <form action="#" class="input-wrapper">
                    <input type="text" class="form-control" name="serach"
                    id="tags" laceholder="Search..." required />
                    <button class="btn btn-search" type="submit" title="submit-button">
                        <i class="d-icon-search"></i>
                    </button>
                     <div id="productlist"></div>
                                            {{ csrf_field() }}
                </form>
            </div>
            <!-- End Header Search -->
        </div>
        <div class="header-right">
            <a href="tel:#" class="icon-box icon-box-side">
                <div class="icon-box-icon mr-0 mr-lg-2">
                    <i class="d-icon-phone"></i>
                </div>
                <div class="icon-box-content d-lg-show">
                    <h4 class="icon-box-title">Call Us Now:</h4>
                    <p>{{$header->phone}}</p>
                </div>
            </a>
            <span class="divider"></span>
            <div class="wishlist">

                @php

             $count=DB::Table('whishlists')->where('userid',Auth::id())->count();


                @endphp
                            <a href="{{url('/show-wishlist')}}">
                                <i class="d-icon-heart"><span class="cart-count" id="whis-count">{{$count}}</span></i>
                            </a>
                            <div class="canvas-overlay"></div>
                            <!-- End Wishlist Toggle -->
                            
                            <!-- End Dropdown Box -->
                        </div>
               
                <div class="canvas-overlay"></div>
                <!-- End Wishlist Toggle -->
                
                    <!-- End Dropdown Box -->
                </div>
                <div class="dropdown cart-dropdown type2 off-canvas mr-0 mr-lg-2">
                    <a href="#" class="cart-toggle label-block link">
                        <div class="cart-label d-lg-show">
                            <span class="cart-name">Shopping Cart:</span>
                            <span class="cart-price" id="cart-price">{{Cart::subtotal()}}TK</span>
                        </div>
                        <i class="d-icon-bag"><span class="cart-count" id="cart-count">{{Cart::count()}}</span></i>
                    </a>
                    <div class="canvas-overlay"></div>
                    <!-- End Cart Toggle -->
                    <div class="dropdown-box">
                        <div class="canvas-header">
                            <h4 class="canvas-title">Shopping Cart</h4>
                            <a href="#" class="btn btn-dark btn-link btn-icon-right btn-close">close<i
                                class="d-icon-arrow-right"></i><span class="sr-only">Cart</span></a>
                            </div>
                            <div class="products scrollable">
                                
                                <!-- End of Cart Product -->
                              
                                <!-- End of Cart Product -->
                            </div>
                            <!-- End of Products  -->
                            <div class="cart-total">
                                <label>Subtotal:</label>
                                <span class="price" id="cart-price">{{Cart::subtotal()}} TK</span>
                            </div>
                            <!-- End of Cart Total -->
                            <div class="cart-action">
                                <a href="{{url('/cart-content')}}" class="btn btn-dark btn-link">View Cart</a>
                                <a href="{{url('/user-check')}}" class="btn btn-dark"><span>Go To Checkout</span></a>
                            </div>
                            <!-- End of Cart Action -->
                        </div>
                        <!-- End Dropdown Box -->
                    </div>
                </div>
            </div>
        </div>

        <div class="header-bottom d-lg-show">
            <div class="container">
                <div class="header-left">
                    @php
                    $cata=DB::table('catagories')->get();
                    
                    
                    @endphp
                    <nav class="main-nav">
                        <ul class="menu">
                            @foreach($cata as $cat)
                         
                            <li>
                        <a href="{{url('/catagorywise',$cat->id)}}">{{$cat->catagoryname}}</a>
                        @php
                        $sub=DB::table('subcatagories')->where('cata_id',$cat->id)->get();
                        @endphp
                        @foreach($sub as $fa)    
                        @if($fa->subcatagory==NULL)
                                                    
                        @else      
                         <ul>
                        @foreach($sub as $res)
                         <li><a href="{{url('/subcatagorywise',$res->id)}}">{{$res->subcatagory}}</a></li>
                          @endforeach
                        </ul>
                       
                        @endif
                         
                        @endforeach
                       
                        </li>
                        
                        
                            
                                @endforeach
                            
                        
                    </ul>
                </nav>
            </div>
           
        </div>
    </div>
</header>
<!-- End Header -->
@yield('frontend.content')

@php

$footer=DB::Table('footers')->first();


@endphp

<!-- End of Main -->
<footer class="footer">
<div class="container">
    <div class="footer-top">
        <div class="row align-items-center">
            <div class="col-lg-3">
                <a href="demo1.html" class="logo-footer">
                    <img src="{{asset('/image/'.$footer->logo)}}" alt="logo-footer" width="154" height="43" />
                </a>
                <!-- End FooterLogo -->
            </div>
            <div class="col-lg-9">
                <div class="widget widget-newsletter form-wrapper form-wrapper-inline">
                    <div class="newsletter-info mx-auto mr-lg-2 ml-lg-4">
                        <h4 class="widget-title">Subscribe to our Newsletter</h4>
                        <p>Get all the latest information, Sales and Offers.</p>
                    </div>
                    <form action="#" class="input-wrapper input-wrapper-inline">
                        <input type="email" class="form-control" name="email" id="email"
                        placeholder="Email address here..." required />
                        <button class="btn btn-primary btn-rounded btn-md ml-2" type="submit">subscribe<i
                            class="d-icon-arrow-right"></i></button>
                        </form>
                    </div>
                    <!-- End Newsletter -->
                </div>
            </div>
        </div>
        <!-- End FooterTop -->
        <div class="footer-middle">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="widget widget-info">
                        <h4 class="widget-title">Contact Info</h4>
                        <ul class="widget-body">
                            <li>
                                <label>Phone:</label>
                                <a href="tel:#">Toll Free {{$footer->phone}}</a>
                            </li>
                            <li>
                                <label>Email:</label>
                                <a href="mailto:{{$footer->email}}">{{$footer->email}}</a>
                            </li>
                            <li>
                                <label>Address:</label>
                                <a href="#">{{$footer->address}}</a>
                            </li>
                           
                           
                        </ul>
                    </div>
                    <!-- End Widget -->
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="widget ml-lg-4">
                        <h4 class="widget-title">My Account</h4>
                        <ul class="widget-body">
                            <li>
                                <a href="about-us.html">About Us</a>
                            </li>
                            <li>
                                <a href="#">Order History</a>
                            </li>
                            <li>
                                <a href="#">Returns</a>
                            </li>
                            <li>
                                <a href="#">Custom Service</a>
                            </li>
                            <li>
                                <a href="#">Terms &amp; Condition</a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Widget -->
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="widget ml-lg-4">
                        <h4 class="widget-title">Contact Info</h4>
                        <ul class="widget-body">
                            <li>
                                <a href="#">Sign in</a>
                            </li>
                            <li>
                                <a href="cart.html">View Cart</a>
                            </li>
                            <li>
                                <a href="wishlist.html">My Wishlist</a>
                            </li>
                            <li>
                                <a href="#">Track My Order</a>
                            </li>
                            <li>
                                <a href="#">Help</a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Widget -->
                </div>
              
            </div>
        </div>
        <!-- End FooterMiddle -->
        <div class="footer-bottom">
            <div class="footer-left">
                <figure class="payment">
                    <img src="{{asset('fro/images/payment.png')}}" alt="payment" width="159" height="29" />
                </figure>
            </div>
            <div class="footer-center">
                <p class="copyright">Pal Creative Ecommerce &copy; 2022. All Rights Reserved</p>
            </div>
            <div class="footer-right">
                <div class="social-links">
                    <a href="{{$footer->facebook}}" title="social-link" class="social-link social-facebook fab fa-facebook-f"></a>
                    <a href="{{$footer->twitter}}" title="social-link" class="social-link social-twitter fab fa-twitter"></a>
                    <a href="{{$footer->linkedin}}" title="social-link" class="social-link social-linkedin fab fa-linkedin-in"></a>
                </div>
            </div>
        </div>
        <!-- End FooterBottom -->
    </div>
</footer>
<!-- End Footer -->
</div>
<!-- Sticky Footer -->
<div class="sticky-footer sticky-content fix-bottom">
<a href="{{url('/')}}" class="sticky-link">
    <i class="d-icon-home"></i>
    <span>Home</span>
</a>
<a href="{{url('/shop')}}" class="sticky-link">
    <i class="d-icon-volume"></i>
    <span>Shop</span>
</a>
<a href="{{url('/show-wishlist')}}" class="sticky-link">
    <i class="d-icon-heart"><span class="cart-count" id="whis-count" style="font-size:20px;">{{$count}}</span></i>
    <span>Wishlist </span>
</a>
@if(Auth::id())

<a href="{{url('/myaccount')}}" class="sticky-link">
    <i class="d-icon-user"></i>
    <span>My Account</span>

@else
<a href="{{url('/login')}}" class="sticky-link">
    <i class="d-icon-user"></i>
    <span>Login</span>
</a>
@endif

</div>


<!-- MobileMenu -->
<div class="mobile-menu-wrapper">
<div class="mobile-menu-overlay">
</div>
<!-- End of Overlay -->
<a class="mobile-menu-close" href="#"><i class="d-icon-times"></i></a>
<!-- End of CloseButton -->
<div class="mobile-menu-container scrollable">
    <form action="#" class="input-wrapper">
        <input type="text" class="form-control" name="search" autocomplete="off"
        placeholder="Search your keyword..." required />
        <button class="btn btn-search" type="submit" title="submit-button">
            <i class="d-icon-search"></i>
        </button>
    </form>
    <!-- End of Search Form -->
    <ul class="mobile-menu mmenu-anim">

        @php
                                          $catas=DB::Table('catagories')->get();
                                            @endphp
                                            @foreach($catas as $data2)
                                            <li>
                                                <a href="{{url('/catagorywise',$data2->id)}}">{{$data2->catagoryname}}</a>
                                                @php
                        $sub=DB::table('subcatagories')->where('cata_id',$data2->id)->get();
                        @endphp
                        @foreach($sub as $fa)    
                        @if($fa->subcatagory==NULL)
                                                    
                        @else      
                                                <ul>
                                                    @foreach($sub as $res)
                                                    <li><a href="{{url('/subcatagorywise',$res->id)}}">{{$res->subcatagory}}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                             @endif
                         
                        @endforeach
                                            @endforeach

            
            
 
             
            </ul>
        </li>
    </ul>
    <!-- End of MobileMenu -->
        <!-- <ul class="mobile-menu mmenu-anim">
            <li><a href="login.html">Login</a></li>
            <li><a href="cart.html">My Cart</a></li>
            <li><a href="wishlist.html">Wishlist</a></li>
        </ul> -->
        <!-- End of MobileMenu -->
    </div>
</div>

<script
src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script> $(document).ready(function(){



   $('#tags').keyup(function(){

    var a=$(this).val();
    if(a != ''){

      var _token=$('input[name="_token"]').val();
      $.ajax({

        url:"{{ route('autocompleteuser.fetch') }}",
        method:"POST",
        data:{a:a, _token:_token},
        success:function(data){

         $('#productlist').fadeIn();
         $('#productlist').html(data);

       }

     })

    }

  });

   $(document).on('click','li',function(){

     $('#productlist').fadeOut();


   })

  

  $(document).on('click','.product',function(){

  

   var id = $(this).find('.id').val();
   if(id){

   window.location="/single-product/"+id;

}


  });





 });






 


 </script>



<!-- Plugins JS File -->
<script src="{{asset('fro/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('fro/vendor/parallax/parallax.min.js')}}"></script>
<script src="{{asset('fro/vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('fro/vendor/elevatezoom/jquery.elevatezoom.min.js')}}"></script>
<script src="{{asset('fro/vendor/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('fro/vendor/owl-carousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('fro/vendor/photoswipe/photoswipe.min.js')}}"></script>
    <script src="{{asset('fro/vendor/photoswipe/photoswipe-ui-default.min.js')}}"></script>
<!-- Main JS File -->
<script src="{{asset('fro/js/main.min.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<script>
  
  @if(Session::has('message'))
  toastr.options =
  {
    "closeButton" : true,
    "progressBar" : true
  }
      toastr.success("{{ session('message') }}");
  @endif

  @if(Session::has('error'))
  toastr.options =
  {
    "closeButton" : true,
    "progressBar" : true
  }
      toastr.error("{{ session('error') }}");
  @endif

  @if(Session::has('info'))
  toastr.options =
  {
    "closeButton" : true,
    "progressBar" : true
  }
      toastr.info("{{ session('info') }}");
  @endif

  @if(Session::has('warning'))
  toastr.options =
  {
    "closeButton" : true,
    "progressBar" : true
  }
      toastr.warning("{{ session('warning') }}");
  @endif
</script>




   
   
</body>


<!-- Mirrored from d-themes.com/html/riode/demo1.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 10 Aug 2022 11:22:27 GMT -->
</html>