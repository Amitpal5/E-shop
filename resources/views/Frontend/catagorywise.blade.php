@extends('Frontend.frontend_layouts')
@section('frontend.content')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('fro/css/style.min.css')}}">

@endsection


<main class="main">
			<div class="page-header"
				style="background-image: url('images/shop/page-header-back.jpg'); background-color: #3C63A4;">
				<h3 class="page-subtitle">Categories</h3>
				<h1 class="page-title">{{$catagory->catagoryname}}</h1>
				
			</div>
			<!-- End PageHeader -->
			<div class="page-content mb-10 pb-6">
				<div class="container">
					<div class="row gutter-lg main-content-wrap">
						<aside
							class="col-lg-3 sidebar sidebar-fixed sidebar-toggle-remain shop-sidebar sticky-sidebar-wrapper">
							<div class="sidebar-overlay"></div>
							<a class="sidebar-close" href="#"><i class="d-icon-times"></i></a>
							<div class="sidebar-content">
								<div class="sticky-sidebar" data-sticky-options="{'top': 10}">
									<div class="filter-actions mb-4">
										<a href="#"
											class="sidebar-toggle-btn toggle-remain btn btn-outline btn-primary btn-rounded btn-icon-right">Filter<i
												class="d-icon-arrow-left"></i></a>
										
									</div>
									<div class="widget widget-collapsible">
										<h3 class="widget-title">All Categories</h3>
										<ul class="widget-body filter-items search-ul">
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
									</div>
									<div class="widget widget-collapsible">
										<h3 class="widget-title">Filter by Price</h3>
										<div class="widget-body mt-3">
											<form action="#">
												<div class="filter-price-slider"></div>

												<div class="filter-actions">
													<div class="filter-price-text mb-4">Price:
														<span class="filter-price-range"></span>
													</div>
													<button type="submit"
														class="btn btn-dark btn-filter btn-rounded">Filter</button>
												</div>
											</form><!-- End Filter Price Form -->
										</div>
									</div>
									
									
									<div class="widget widget-collapsible">
										<h3 class="widget-title">Brands</h3>
										@php
                                         $brand=DB::Table('brands')->get();
										@endphp
										<ul class="widget-body filter-items search-ul">
											@foreach($brand as $data5)
											<li><a href="{{url('/brandwise',$data5->id)}}">{{$data5->brandname}}</a></li>
											@endforeach
										</ul>
									</div>
								</div>
							</div>
						</aside>
						<div class="col-lg-9 main-content">
							
							<div class="row cols-2 cols-sm-3 cols-md-4 product-wrapper" style="padding-top:100px;">
								@foreach($cata as $data)
								<div class="product-wrap">
									<div class="product">
										<figure class="product-media">
											<a href="{{url('/single-product',$data->productname)}}">
												<img src="{{asset('/Image/'.$data->productimage)}}" alt="product" width="280" height="315">
											</a>
											
											<div class="product-action-vertical">
												<button class="addcart btn-product-icon btn-cart" data-id="{{$data->id}}"> <i class="d-icon-bag"></i></button>
												<a href="#" class="btn-product-icon btn-wishlist"
													title="Add to wishlist"><i class="d-icon-heart"></i></a>
											</div>
											
										</figure>
										<div class="product-details">
											<div class="product-cat">
												<a href="#">{{$data->catagoryname}}</a>
											</div>
											<h3 class="product-name">
												<a href="{{url('/single-product',$data->productname)}}">{{$data->productname}}</a>
											</h3>
											<div class="product-price">
												@if($data->discountprice==NULL)
                                                 {{$data->price}} TK
												@else
												<ins class="new-price">{{$data->discountprice}} TK</ins><del class="old-price">{{$data->price}} TK</del>
												@endif
											</div>
											
										</div>
									</div>
								</div>
								@endforeach
								
							</div>
							<nav class="toolbox toolbox-pagination">
								{{$cata->links()}}
								
							</nav>
						</div>
					</div>
				</div>
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















@endsection