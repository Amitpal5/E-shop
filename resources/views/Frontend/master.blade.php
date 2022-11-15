@extends('frontend.frontend_layouts')
@section('frontend.content')

<main class="main">
    <div class="page-content">
        <section class="intro-section">
            <div class="owl-carousel owl-theme row owl-dot-inner owl-dot-white intro-slider animation-slider cols-1 gutter-no"
            data-owl-options="{
            'nav': false,
            'dots': true,
            'loop': false,
            'items': 1,
            'autoplay': false,
            'autoplayTimeout': 8000
        }">

        @php

       $slider=DB::Table('sliders')->get()


        @endphp
        @foreach($slider as $sliders)
        <div class="banner banner-fixed intro-slide1">
            <figure>
                <img src="{{asset('/image/'.$sliders->image)}}" alt="intro-banner" width="1903"
                height="630" style="background-color: #34ace5;" />
            </figure>
            <div class="container">
                <div class="banner-content y-50">
                    
            <h4 class="banner-title font-weight-bold text-white lh-1 ls-md slide-animate"
            data-animation-options="{'name': 'fadeInUpShorter', 'duration': '1.2s', 'delay': '1s'}">
        </h4>
        <h3 class="font-weight-normal lh-1 ls-l text-white slide-animate"
        data-animation-options="{'name': 'fadeInUpShorter', 'duration': '1.2s', 'delay': '1s'}">
    {{$sliders->heading}}</h3>
    <p class="slide-animate text-white ls-s mb-7"
    data-animation-options="{'name': 'fadeInUpShorter', 'duration': '1.2s', 'delay': '1s'}">
{{$sliders->smallheading}}</p>
<a href="{{url('/catagorywise/'.$sliders->link)}}" class="btn btn-dark btn-rounded slide-animate"
data-animation-options="{'name': 'fadeInUpShorter', 'duration': '1s', 'delay': '1.8s'}">Shop
Now<i class="d-icon-arrow-right"></i></a>
</div>
</div>
</div>
@endforeach




</div>

<div class="container mt-6 appear-animate">
<div class="service-list">
    <div class="owl-carousel owl-theme row cols-lg-3 cols-sm-2 cols-1" data-owl-options="{
    'items': 3,
    'nav': false,
    'dots': false,
    'loop': true,
    'autoplay': false,
    'autoplayTimeout': 5000,
    'responsive': {
    '0': {
    'items': 1
},
'576': {
'items': 2
},
'768': {
'items': 3,
'loop': false
}
}
}">
<div class="icon-box icon-box-side icon-box1 appear-animate" data-animation-options="{
'name': 'fadeInRightShorter',
'delay': '.3s'
}">
<i class="icon-box-icon d-icon-truck"></i>
<div class="icon-box-content">
<h4 class="icon-box-title text-capitalize ls-normal lh-1">Free Shipping &amp;
    Return
</h4>
<p class="ls-s lh-1">Free shipping on orders over $99</p>
</div>
</div>

<div class="icon-box icon-box-side icon-box2 appear-animate" data-animation-options="{
'name': 'fadeInRightShorter',
'delay': '.4s'
}">
<i class="icon-box-icon d-icon-service"></i>
<div class="icon-box-content">
<h4 class="icon-box-title text-capitalize ls-normal lh-1">Customer Support 24/7
</h4>
<p class="ls-s lh-1">Instant access to perfect support</p>
</div>
</div>

<div class="icon-box icon-box-side icon-box3 appear-animate" data-animation-options="{
'name': 'fadeInRightShorter',
'delay': '.5s'
}">
<i class="icon-box-icon d-icon-secure"></i>
<div class="icon-box-content">
<h4 class="icon-box-title text-capitalize ls-normal lh-1">100% Secure Payment
</h4>
<p class="ls-s lh-1">We ensure secure payment!</p>
</div>
</div>
</div>
</div>
</div>
</section>

<section class="pt-10 mt-7 appear-animate" data-animation-options="{
'delay': '.3s'
}">
<div class="container">
<h2 class="title title-center mb-5">Our Categories</h2>
<div class="row">
    @php
    $cata=DB::Table('catagories')->get();
    @endphp
    @foreach($cata as $data)
    <div class="col-xs-6 col-lg-3 mb-4">
        <div class="category category-default1 category-absolute banner-radius overlay-zoom">
            <a href="{{url('/catagorywise',$data->id)}}">
                <figure class="category-media">
                    <img src="{{asset('/Image/'.$data->picture)}}" alt="category"  style="background-color: #8c8c8d;" />
                </figure>
            </a>
            <div class="category-content">
                <h4 class="category-name font-weight-bold ls-l"><a href="{{url('/catagorywise',$data->id)}}">{{$data->catagoryname}}</a></h4>
            </div>
        </div>
    </div>
    @endforeach
   
</div>
</section>

<section class="product-wrapper container appear-animate mt-6 mt-md-10 pt-4 pb-8"
data-animation-options="{
'delay': '.3s'
}">
<h2 class="title title-center mb-5">Best Sellers</h2>
<div class="owl-carousel owl-theme row owl-nav-full cols-2 cols-md-3 cols-lg-4" data-owl-options="{
'items': 10,
'nav': false,
'loop': false,
'dots': true,
'margin': 20,
'responsive': {
'0': {
'items': 2
},
'768': {
'items': 3
},
'992': {
'items': 5,
'dots': false,
'nav': true
}
}
}">

@php

$fet=DB::Table('products')->where('bestseller',1)->orderBy('id','desc')->limit(10)->join('catagories','products.catagoryid','catagories.id' )
->select('products.*','catagories.catagoryname')->get();

@endphp

@foreach($fet as $data2)
<div class="product text-center">
    <figure class="product-media">
        <a href="{{url('/single-product',$data2->productname)}}">
            <img src="{{asset('/Image/'.$data2->productimage)}}" alt="Blue Pinafore Denim Dress"
            width="280" height="315" style="background-color: #f2f3f5;" />
        </a>
         @if($data2->discountprice == NULL)
             @else
        @php
        $amount=$data2->price - $data2->discountprice;
        $discount= $amount/$data2->price*100;
        @endphp
        <div class="product-label-group">
            <span class="product-label label-sale">-{{intval($discount)}}% off</span>
        </div>
        @endif
        <div class="product-action-vertical">
           <button class="addcart btn-product-icon btn-cart" data-id="{{$data2->id}}"> <i class="d-icon-bag"></i></button>
           <button class="Wishlist btn-product-icon" data-id="{{$data2->id}}"><i class="d-icon-heart"></i></button>

           
            
            </div>
           
        </figure>
        <div class="product-details">

            <div class="product-cat">
                <a href="{{url('/catagorywise',$data2->catagoryid)}}">{{$data2->catagoryname}}</a>
            </div>
            <h3 class="product-name">
                <a href="{{url('/single-product',$data2->productname)}}">{{$data2->productname}}</a>
            </h3>
            <div class="product-price">
                @if($data2->discountprice == NULL)
                 {{$data2->price}} TK
                @else


                <ins class="new-price">{{$data2->discountprice}} TK</ins><del class="old-price">{{$data2->price}} TK</del>
                @endif
            </div>
            
        </div>
    </div>
    @endforeach
  
     
            
            </div>
        </section>

        <section class="banner-group mt-4">
            <div class="container">
                <h2 class="title d-none">Banner Group</h2>
                @php
                $fa='fixed';
                $coupon=DB::Table('coupons')->where('coupon_type',$fa)->first();

                @endphp

                <div class="row justify-content-center">
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="banner banner-3 overlay-zoom banner-fixed banner-radius content-middle appear-animate"
                        data-animation-options="{'name': 'fadeInLeftShorter', 'duration': '1s', 'delay': '.2s'}">
                        <figure>
                            <img src="{{asset('fro/images/demos/demo1/banners/3.jpg')}}" alt="banner" width="380"
                            height="207" style="background-color: #836648;" />
                        </figure>
                        <div class="banner-content">
                            <h3 class="banner-title text-white mb-1">For You's</h3>
                            <h4 class="banner-subtitle text-uppercase font-weight-normal text-white">
                                Use This Coupon Code {{$coupon->couponcode}}
                            </h4>
                            <h3 class="banner-title text-white mb-1">{{$coupon->Amount}} TK OFF</h3>
                           
                            </div>
                        </div>
                    </div>
                    @php
                    
                    $pe='Percentage';
                    $per=DB::Table('coupons')->where('coupon_type',$pe)->first();

                    @endphp
                    <div class="col-lg-4 col-sm-6 mb-4 order-lg-auto order-sm-last">
                        <div class="banner banner-4 banner-fixed banner-radius overlay-effect2 content-middle content-center appear-animate"
                        data-animation-options="{'name': 'fadeIn', 'duration': '1s', 'delay': '.2s'}">
                        <figure>
                            <img src="{{asset('fro/images/demos/demo1/banners/banner2.jpg')}}" alt="banner" width="350"
                            height="177" style="background-color: #1e1e1e;" />
                        </figure>
                        <div class="banner-content d-flex align-items-center w-100 text-left">
                            <div class="mr-auto mb-4 mb-md-0">
                                <h3 class="banner-title text-white mb-1">
                                    Up to {{$per->Amount}}% Off<br><span class="ls-l"></span>
                                </h3>
                                <br>
                               <h4 class="banner-subtitle text-uppercase font-weight-normal text-white">
                                Use This Coupon Code {{$per->couponcode}}
                            </h4>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4">
                    <div class="banner overlay-zoom banner-5 banner-fixed banner-radius content-middle appear-animate"
                    data-animation-options="{'name': 'fadeInRightShorter', 'duration': '1s', 'delay': '.2s'}">
                    <figure>
                        <img src="{{asset('fro/images/demos/demo1/banners/banner3.jpg')}}" alt="banner" width="380"
                        height="207" style="background-color: #97928b;" />
                    </figure>
                    <div class="banner-content">
                        <h3 class="banner-title text-white mb-1">Fashions</h3>
                        <h4 class="banner-subtitle text-uppercase font-weight-normal text-white">30% Off
                        </h4>
                        <hr class="banner-divider">
                        <a href="shop.html" class="btn btn-white btn-link btn-underline">Shop Now<i
                            class="d-icon-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="product-wrapper mt-6 mt-md-10 pt-4 mb-10 pb-2 container appear-animate"
    data-animation-options="{
    'delay': '.6s'
}">
<h2 class="title title-center">Our Featured</h2>
<div class="owl-carousel owl-theme row cols-2 cols-md-3 cols-lg-4 cols-xl-5" data-owl-options="{
'items': 5,
'nav': false,
'loop': false,
'dots': true,
'margin': 20,
'responsive': {
'0': {
'items': 2
},
'768': {
'items': 3
},
'992': {
'items': 4
},
'1200': {
'items': 5,
'dots': false,
'nav': true
}
}
}">
@php

$our=DB::Table('products')->where('hot_deal',1)->orderBy('id','desc')->limit(10)->join('catagories','products.catagoryid','catagories.id' )
->select('products.*','catagories.catagoryname')->get();

@endphp


           @foreach($our as $data3)
  
    
            <div class="product text-center">
                <figure class="product-media">
                    <a href="{{url('/single-product',$data3->productname)}}">
                        <img src="{{asset('/Image/'.$data3->productimage)}}" alt="Blue Pinafore Denim Dress"
                        width="220" height="245" style="background-color: #f2f3f5;" />
                    </a>

                    @if($data3->discountprice == NULL)
             @else
        @php
        $amount=$data3->price - $data3->discountprice;
        $discount= $amount/$data3->price*100;
        @endphp
        <div class="product-label-group">
            <span class="product-label label-sale">-{{intval($discount)}}% off</span>
        </div>
        @endif
                    <div class="product-action-vertical">
                        <button class="addcart btn-product-icon btn-cart" data-id="{{$data3->id}}"> <i class="d-icon-bag"></i></button>
                        <button class="Wishlist btn-product-icon" data-id="{{$data3->id}}"><i class="d-icon-heart"></i></button>
                        
                        </div>
                        
                    </figure>
                    <div class="product-details">
                        <div class="product-cat">
                            <a href="{{url('/catagorywise',$data3->catagoryid)}}">{{$data3->catagoryname}}</a>
                        </div>
                        <h3 class="product-name">
                            <a href="{{url('/single-product',$data3->productname)}}">{{$data3->productname}}</a>
                        </h3>
                        <div class="product-price">
                            @if($data2->discountprice == NULL)
                 {{$data2->price}} TK
                @else


                <ins class="new-price">{{$data2->discountprice}} TK</ins><del class="old-price">{{$data2->price}} TK</del>
                @endif
                        </div>
                        
                    </div>
                </div>
                @endforeach
            </div>
        </section>

      


<section class="mt-2 pb-6 pt-10 pb-md-10 appear-animate" data-animation-options="{
'delay': '.3s'
}">
<h2 class="title d-none">Our Brand</h2>
<div class="container">
<div class="owl-carousel owl-theme row brand-carousel cols-xl-6 cols-lg-5 cols-md-4 cols-sm-3 cols-2"
data-owl-options="{
'nav': false,
'dots': false,
'autoplay': true,
'margin': 20,
'loop': true,
'responsive': {
'0': {
'items': 2
},
'576': {
'items': 3
},
'768': {
'items': 4
},
'992': {
'items': 5
},
'1200': {
'items': 6
}
}
}">
@php

$brand=DB::Table('brands')->get();

@endphp
@foreach($brand as $data4)
<figure><a href="{{url('/brandwise',$data4->id)}}"><img src="{{asset('/Image/'.$data4->picture)}}" alt="brand" width="180" height="100" /></a>
</figure>
@endforeach

</div>
</div>
</section>

@php

$sales=DB::Table('products')->where('sales',1)->orderBy('id','desc')->limit(3)->join('catagories','products.catagoryid','catagories.id' )
->select('products.*','catagories.catagoryname')->get();


@endphp

<section class="product-widget-wrapper pb-2 pb-md-10 appear-animate">
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-sm-6 mb-4">
            <div class="widget widget-products appear-animate" data-animation-options="{
            'name': 'fadeInLeftShorter',
            'delay': '.5s'
        }">
        <h4 class="widget-title border-no lh-1 font-weight-bold">Sale Products</h4>
        <div class="products-col">
            @foreach($sales as $data5)
            <div class="product product-list-sm">
    <figure class="product-media">
        <a href="{{url('/single-product',$data5->productname)}}">
            <img src="{{asset('/Image/'.$data5->productimage)}}" alt="product"
            width="100" height="114" style="background-color: #f2f3f5;" />
        </a>
    </figure>
    <div class="product-details">
        <h3 class="product-name">
            <a href="{{url('/single-product',$data5->productname)}}">{{$data5->productname}}</a>
        </h3>
        <div class="product-price">

            @if($data5->discountprice == NULL)
                 {{$data5->price}} TK
                @else


                <ins class="new-price">{{$data5->discountprice}} TK</ins><del class="old-price">{{$data5->price}} TK</del>
                @endif
        </div>
        
    </div>
</div>

@endforeach
          
            
        </div>
    </div>
</div>
<div class="col-lg-3 col-sm-6 mb-4">
    <div class="widget widget-products appear-animate" data-animation-options="{
    'name': 'fadeInLeftShorter',
    'delay': '.3s'
}">
<h4 class="widget-title border-no lh-1 font-weight-bold">Latest Products</h4>
@php

$latest=DB::Table('products')->where('lproduct',1)->orderBy('id','desc')->limit(3)->join('catagories','products.catagoryid','catagories.id' )
->select('products.*','catagories.catagoryname')->get();


@endphp
<div class="products-col">
    @foreach($latest as $data6)
     <div class="product product-list-sm">
    <figure class="product-media">
        <a href="{{url('/single-product',$data6->productname)}}">
            <img src="{{asset('/Image/'.$data6->productimage)}}" alt="product"
            width="100" height="114" style="background-color: #f2f3f5;" />
        </a>
    </figure>
    <div class="product-details">
        <h3 class="product-name">
            <a href="{{url('/single-product',$data6->productname)}}">{{$data6->productname}}</a>
        </h3>
        <div class="product-price">

            @if($data6->discountprice == NULL)
                 {{$data6->price}} TK
                @else


                <ins class="new-price">{{$data6->discountprice}} TK</ins><del class="old-price">{{$data6->price}} TK</del>
                @endif
        </div>
        
    </div>
</div>

    @endforeach
   
   
</div>
</div>
</div>
<div class="col-lg-3 col-sm-6 mb-4">
<div class="widget widget-products appear-animate" data-animation-options="{
'name': 'fadeInRightShorter',
'delay': '.3s'
}">
<h4 class="widget-title border-no lh-1 font-weight-bold">Best of the Week</h4>
@php

$week=DB::Table('products')->where('bweek',1)->orderBy('id','desc')->limit(3)->join('catagories','products.catagoryid','catagories.id' )
->select('products.*','catagories.catagoryname')->get();


@endphp
<div class="products-col">
    @foreach($week as $data7)
   <div class="product product-list-sm">
    <figure class="product-media">
        <a href="{{url('/single-product',$data7->productname)}}">
            <img src="{{asset('/Image/'.$data7->productimage)}}" alt="product"
            width="100" height="114" style="background-color: #f2f3f5;" />
        </a>
    </figure>
    <div class="product-details">
        <h3 class="product-name">
            <a href="{{url('/single-product',$data7->productname)}}">{{$data7->productname}}</a>
        </h3>
        <div class="product-price">

            @if($data7->discountprice == NULL)
                 {{$data7->price}} TK
                @else


                <ins class="new-price">{{$data7->discountprice}} TK</ins><del class="old-price">{{$data7->price}} TK</del>
                @endif
        </div>
        
    </div>
</div>
@endforeach


</div>
</div>
</div>
<div class="col-lg-3 col-sm-6 mb-4">
<div class="widget widget-products appear-animate" data-animation-options="{
'name': 'fadeInRightShorter',
'delay': '.5s'
}">

@php

$popular=DB::Table('products')->where('popular',1)->orderBy('id','desc')->limit(3)->join('catagories','products.catagoryid','catagories.id' )
->select('products.*','catagories.catagoryname')->get();


@endphp
<h4 class="widget-title border-no lh-1 font-weight-bold">Popular</h4>
<div class="products-col">
  @foreach($popular as $data8)
   <div class="product product-list-sm">
    <figure class="product-media">
        <a href="{{url('/single-product',$data8->productname)}}">
            <img src="{{asset('/Image/'.$data8->productimage)}}" alt="product"
            width="100" height="114" style="background-color: #f2f3f5;" />
        </a>
    </figure>
    <div class="product-details">
        <h3 class="product-name">
            <a href="{{url('/single-product',$data8->productname)}}">{{$data8->productname}}</a>
        </h3>
        <div class="product-price">

            @if($data8->discountprice == NULL)
                 {{$data8->price}} TK
                @else


                <ins class="new-price">{{$data8->discountprice}} TK</ins><del class="old-price">{{$data8->price}} TK</del>
                @endif
        </div>
        
    </div>
</div>
@endforeach
</div>
</div>
</div>
</div>
</div>
</section>
</div>

</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">


$(document).ready(function(){
    
    
$('.addcart').on('click',function(){


var id=$(this).data('id');
if(id){

$.ajax({
url:"{{url('add/to/product')}}/"+id,
type:"GET",
dataType:"json",
 success:function(data) {
     
    if(data.status){
    
    $('span#cart-count').text(data.item);
    
    $('span#cart-price').text(data.amounts);
    $(".products").empty();
   fetchdata();
        
    const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar: true,
          didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
          }
        })

        if($.isEmptyObject(data.error)){
            
        Toast.fire({
          icon: 'success',
          title: 'Succefully Added To Cart',
        })  


            
        }

        


    
    }

else{
    Toast.fire({
  icon: 'error',
  title: 'data.error',
})  
    
    
}
},

});

}


});

fetchdata();

     function fetchdata(){

     $.ajax({
url:"{{url('/fetch_data')}}",
type:"GET",
dataType:"json",
 success:function(response) {
$.each(response.carts,function(key,item){

$('.products').append('<div class="product product-cart"><figure class="product-media"><a href="product.html"><img src="{{asset('/Image/'.'+item.options+')}} width="50px" height="50px" alt="product" width="80"height="88" /></a><button class="delete btn btn-link btn-close"><i class="fas fa-times"></i><span class="sr-only">Close</span> </button></figure><div class="product-detail"><a href="product.html" class="product-name">'+ item.name + '</a><input type="hidden" class="qty" id="id" value="'+item.rowId+'"><div class="price-box"><span class="product-quantity">'+item.qty+'</span><span class="product-price">'+item.price+'</span></div></div>');


});




 



},
});



     }


      $(document).on('click','.delete',function(){




    var id=$(this).closest(".product").find("#id").val();
    
    if(id){
$.ajax({
url:"{{url('cart/delete')}}/"+id,
type:"GET",
dataType:"json",
 success:function(data) {
   
  if(data.status){
  
 $('span#cart-price').text(data.amounts);
$('span#cart-count').text(data.counts);
  
  $(".products").empty();
   fetchdata();
  
  }

},
});
}



  });




});

</script>
<script type="text/javascript">
    
$(document).ready(function(){

$(".Wishlist").on('click',function(){
var id=$(this).data('id');

$.ajax({

url:"{{url('/addtowishlist')}}/"+id,
type:"get",
datatype:"json",
success:function(data){


    if(data.status==200){

        alertify.set('notifier','position', 'top-right');
      alertify.error('Plase login First');

    }

    else if(data.status==250){
        $('span#whis-count').text(data.counts);
        alertify.set('notifier','position', 'top-right');
      alertify.error('Product are already in Wishlist');



    }


    else if(data.status==400){

       $('span#whis-count').text(data.counts);
      alertify.set('notifier','position', 'top-right');
      alertify.success('Product are Succefully Added in Wishlist');

    }



}



});


});




});





</script>






@endsection