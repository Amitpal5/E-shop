@extends('Frontend.frontend_layouts')
@section('frontend.content')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('fro/css/style.min.css')}}">

@endsection

<main class="main mt-8 single-product">
		<div class="page-content mb-10 pb-6">
			<div class="container">
				<div class="product product-single row mb-8">
					<div class="col-md-6">
						<div class="product-gallery pg-vertical">
							<div
								class="product-single-carousel owl-carousel owl-theme owl-nav-inner row cols-1 gutter-no">
								<figure class="product-image">
									<img src="{{asset('/Image/'.$single->productimage)}}"
										data-zoom-image="{{asset('/Image/'.$single->productimage)}}"
										alt="Women's Brown Leather Backpacks" width="800" height="900">
								</figure>
								@if($single->image2== NULL)

								@else
								<figure class="product-image">
									<img src="{{asset('/Image/'.$single->image2)}}"
										data-zoom-image="{{asset('/Image/'.$single->image2)}}"
										alt="Women's Brown Leather Backpacks" width="800" height="900">
								</figure>
								@endif
								@if($single->image3== NULL)

								@else
								<figure class="product-image">
									<img src="{{asset('/Image/'.$single->image3)}}"
										data-zoom-image="{{asset('/Image/'.$single->image3)}}"
										alt="Women's Brown Leather Backpacks" width="800" height="900">
								</figure>
								@endif
								
							</div>
							<div class="product-thumbs-wrap">
								<div class="product-thumbs">
									<div class="product-thumb active">
										<img src="{{asset('/Image/'.$single->productimage)}}" alt="product thumbnail"
											width="109" height="122">
									</div>
									@if($single->image2== NULL)

								@else
									<div class="product-thumb">
										<img src="{{asset('/Image/'.$single->image2)}}" alt="product thumbnail"
											width="109" height="122">
									</div>
									@endif
									@if($single->image3== NULL)

								@else
									<div class="product-thumb">
										<img src="{{asset('/Image/'.$single->image3)}}" alt="product thumbnail"
											width="109" height="122">
									</div>

									@endif
									
								</div>
								
							</div>
						</div>
					</div>
					<div class="col-md-6 sticky-sidebar-wrapper">
						<div class="product-details sticky-sidebar" data-sticky-options="{'minWidth': 767}">
							

							<h1 class="product-name">{{$single->productname}}</h1>
							<div class="product-meta">
								SKU: <span class="product-sku">{{$single->product_code}}</span>
								@if($brand==NULL)
								@else
								BRAND: <span class="product-brand">{{$brand->brandname}}</span>
								@endif
							</div>
							@if($single->discountprice == NULL)
							<div class="product-price">{{$single->price}} TK</div>
							@else
							<div class="product-price"><ins class="new-price">{{$single->discountprice}} TK</ins><del class="old-price">{{$single->price}} TK</del></div>
							@endif
							@if($single->shortd	== NULL)
							@else
							<p class="product-short-desc">{{$single->shortd}}.</p>
							@endif

							<hr class="product-divider">
                             <form action="{{route('user.singleproductcart')}}" method="post">
                             	@csrf
							<div class="product-form product-qty">
								<div class="product-form-group">
									<div class="input-group mr-2">
										<input type="hidden" name="id" value="{{$single->id}}">
										<input class="quantity form-control" type="number" min="1" max="1000000" name="qty">
										
									</div>
									<button
										class="btn-product text-normal ls-normal font-weight-semi-bold btn btn-primary" style="display:block;max-width:14rem;line-height:2.9;padding:0 0.6em;text-align:center;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;color:#222;background-color:transparent;border:2px solid #ccc;margin-right:5px;border-radius:0.3rem"background: #a1a6da;><i
											class="d-icon-bag"></i>Add to
										Cart</button>
								</div>
							</div>
						</form>

							<hr class="product-divider mb-3">

							<div class="product-footer">
								<div class="social-links mr-4">
									<a href="#" class="social-link social-facebook fab fa-facebook-f"></a>
									<a href="#" class="social-link social-twitter fab fa-twitter"></a>
									<a href="#" class="social-link social-pinterest fab fa-pinterest-p"></a>
								</div>
								<span class="divider d-lg-show"></span>
								<div class="product-action">
									<a href="#" class="btn-product btn-wishlist mr-6"><i
											class="d-icon-heart"></i><span>Add to
											wishlist</span></a>
									<a href="#" class="btn-product btn-compare"><i class="d-icon-compare"></i>Add to
										compare</a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="tab tab-nav-simple product-tabs mb-4">
					<ul class="nav nav-tabs justify-content-center" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" href="#product-tab-description">Description</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#product-tab-additional">Additional information</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#product-tab-reviews">Reviews (2)</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active in" id="product-tab-description">
							<div class="row mt-6">
								<div class="col-md-12">
									@if($single->longd==NULL)

									@else
									<h5 class="description-title mb-4 font-weight-semi-bold ls-m">Features</h5>
									<p class="mb-2">
										Praesent id enim sit amet.Tdio vulputate eleifend in in tortor.
										ellus massa. siti iMassa ristique sit amet condim vel, facilisis
										quimequistiqutiqu amet condim Dilisis Facilisis quis sapien. Praesent id
										enim sit amet.
									</p>
									@endif
									
									
								</div>
								
							</div>
						</div>
						<div class="tab-pane" id="product-tab-additional">
							<ul class="list-none">
								<li><label>Catagory:</label>
									<p>{{$single->catagoryname}}</p>
								</li>
								<li><label>Sub Catagory:</label>
									<p>{{$single->subcatagory}}</p>
								</li>
								@if($brand==NULL)
								@else
								<li><label>Brands:</label>
									<p>{{$brand->brandname}}</p>
								</li>
								@endif
								@if($single->product_colour == NULL)
								@else
								<li><label>Color:</label>
									<p>{{$single->product_colour}}</p>
								</li>
								@endif
								@if($single->productsize == NULL)
								@else
								<li><label>Size:</label>
									<p>{{$single->productsize}}</p>
								</li>
								@endif
							</ul>
						</div>
						<div class="tab-pane" id="product-tab-reviews">
							<div class="row">
								<div class="col-lg-4 mb-6">
									<div class="avg-rating-container">
										<mark>5.0</mark>
										<div class="avg-rating">
											<span class="avg-rating-title">Average Rating</span>
											<div class="ratings-container mb-0">
												<div class="ratings-full">
													<span class="ratings" style="width:100%"></span>
													<span class="tooltiptext tooltip-top"></span>
												</div>
												<span class="rating-reviews">(2 Reviews)</span>
											</div>
										</div>
									</div>
									<div class="ratings-list mb-2">
										<div class="ratings-item">
											<div class="ratings-container mb-0">
												<div class="ratings-full">
													<span class="ratings" style="width:100%"></span>
													<span class="tooltiptext tooltip-top"></span>
												</div>
											</div>
											<div class="rating-percent">
												<span style="width:100%;"></span>
											</div>
											<div class="progress-value">100%</div>
										</div>
										<div class="ratings-item">
											<div class="ratings-container mb-0">
												<div class="ratings-full">
													<span class="ratings" style="width:80%"></span>
													<span class="tooltiptext tooltip-top">4.00</span>
												</div>
											</div>
											<div class="rating-percent">
												<span style="width:0%;"></span>
											</div>
											<div class="progress-value">0%</div>
										</div>
										<div class="ratings-item">
											<div class="ratings-container mb-0">
												<div class="ratings-full">
													<span class="ratings" style="width:60%"></span>
													<span class="tooltiptext tooltip-top">4.00</span>
												</div>
											</div>
											<div class="rating-percent">
												<span style="width:0%;"></span>
											</div>
											<div class="progress-value">0%</div>
										</div>
										<div class="ratings-item">
											<div class="ratings-container mb-0">
												<div class="ratings-full">
													<span class="ratings" style="width:40%"></span>
													<span class="tooltiptext tooltip-top">4.00</span>
												</div>
											</div>
											<div class="rating-percent">
												<span style="width:0%;"></span>
											</div>
											<div class="progress-value">0%</div>
										</div>
										<div class="ratings-item">
											<div class="ratings-container mb-0">
												<div class="ratings-full">
													<span class="ratings" style="width:20%"></span>
													<span class="tooltiptext tooltip-top">4.00</span>
												</div>
											</div>
											<div class="rating-percent">
												<span style="width:0%;"></span>
											</div>
											<div class="progress-value">0%</div>
										</div>
									</div>
									<a class="btn btn-dark btn-rounded submit-review-toggle" href="#">Submit
										Review</a>
								</div>
								<div class="col-lg-8 comments pt-2 pb-10 border-no">
									]
									<ul class="comments-list">
										<li>
											<div class="comment">
												<figure class="comment-media">
													<a href="#">
														<img src="images/blog/comments/1.jpg" alt="avatar">
													</a>
												</figure>
												<div class="comment-body">
													<div class="comment-rating ratings-container">
														<div class="ratings-full">
															<span class="ratings" style="width:100%"></span>
															<span class="tooltiptext tooltip-top"></span>
														</div>
													</div>
													<div class="comment-user">
														<span class="comment-date">by <span
																class="font-weight-semi-bold text-uppercase text-dark">John
																Doe</span> on
															<span class="font-weight-semi-bold text-dark">Nov 22,
																2018</span></span>
													</div>

													<div class="comment-content mb-5">
														<p>Sed pretium, ligula sollicitudin laoreet viverra, tortor
															libero sodales leo,
															eget blandit nunc tortor eu nibh. Nullam mollis. Ut
															justo.
															Suspendisse potenti.
															Sed egestas, ante et vulputate volutpat, eros pede
															semper
															est, vitae luctus metus libero eu augue.</p>
													</div>
													<div class="file-input-wrappers">
														<img class="btn-play btn-img pwsp"
															src="images/products/product1.jpg" width="280"
															height="315" alt="product" />


														<img class="btn-play btn-img pwsp"
															src="images/products/product3.jpg" width="280"
															height="315" alt="product" />

														<a class="btn-play btn-iframe"
															style="background-image: url(images/product/product.jpg);background-size: cover;"
															href="video/memory-of-a-woman.mp4">
															<i class="d-icon-play-solid"></i>
														</a>
													</div>
													<div class="feeling mt-5">
														<button
															class="btn btn-link btn-icon-left btn-slide-up btn-infinite like mr-2">
															<i class="fa fa-thumbs-up"></i>
															Like (<span class="count">0</span>)
														</button>
														<button
															class="btn btn-link btn-icon-left btn-slide-down btn-infinite unlike">
															<i class="fa fa-thumbs-down"></i>
															Unlike (<span class="count">0</span>)
														</button>
													</div>
												</div>
											</div>
										</li>
										<li>
											<div class="comment">
												<figure class="comment-media">
													<a href="#">
														<img src="images/blog/comments/2.jpg" alt="avatar">
													</a>
												</figure>

												<div class="comment-body">
													<div class="comment-rating ratings-container">
														<div class="ratings-full">
															<span class="ratings" style="width:100%"></span>
															<span class="tooltiptext tooltip-top"></span>
														</div>
													</div>
													<div class="comment-user">
														<span class="comment-date">by <span
																class="font-weight-semi-bold text-uppercase text-dark">John
																Doe</span> on
															<span class="font-weight-semi-bold text-dark">Nov 22,
																2018</span></span>
													</div>

													<div class="comment-content">
														<p>Sed pretium, ligula sollicitudin laoreet viverra, tortor
															libero sodales leo, eget blandit nunc tortor eu nibh.
															Nullam
															mollis.
															Ut justo. Suspendisse potenti. Sed egestas, ante et
															vulputate volutpat,
															eros pede semper est, vitae luctus metus libero eu
															augue.
															Morbi purus libero,
															faucibus adipiscing, commodo quis, avida id, est. Sed
															lectus. Praesent elementum
															hendrerit tortor. Sed semper lorem at felis. Vestibulum
															volutpat.</p>
													</div>
													<div class="feeling mt-5">
														<button
															class="btn btn-link btn-icon-left btn-slide-up btn-infinite like mr-2">
															<i class="fa fa-thumbs-up"></i>
															Like (<span class="count">0</span>)
														</button>
														<button
															class="btn btn-link btn-icon-left btn-slide-down btn-infinite unlike">
															<i class="fa fa-thumbs-down"></i>
															Unlike (<span class="count">0</span>)
														</button>
													</div>
												</div>

											</div>
										</li>
									</ul>
								
								</div>
							</div>
							<!-- End Comments -->
							<div class="review-form-section">
								<div class="review-overlay"></div>
								<div class="review-form-wrapper">
									<div class="title-wrapper text-left">
										<h3 class="title title-simple text-left text-normal">Add a Review</h3>
										<p>Your email address will not be published. Required fields are marked *
										</p>
									</div>
									<div class="rating-form">
										<label for="rating" class="text-dark">Your rating * </label>
										<span class="rating-stars selected">
											<a class="star-1" href="#">1</a>
											<a class="star-2" href="#">2</a>
											<a class="star-3" href="#">3</a>
											<a class="star-4 active" href="#">4</a>
											<a class="star-5" href="#">5</a>
										</span>

										<select name="rating" id="rating" required="" style="display: none;">
											<option value="">Rate…</option>
											<option value="5">Perfect</option>
											<option value="4">Good</option>
											<option value="3">Average</option>
											<option value="2">Not that bad</option>
											<option value="1">Very poor</option>
										</select>
									</div>
									<form action="#">
										<textarea id="reply-message" cols="30" rows="6" class="form-control mb-4"
											placeholder="Comment *" required></textarea>

										<div class="review-medias">
											<div class="file-input form-control image-input"
												style="background-image: url(images/product/placeholder.png);">
												<div class="file-input-wrapper">
												</div>
												<label class="btn-action btn-upload" title="Upload Media">
													<input type="file" accept=".png, .jpg, .jpeg"
														name="riode_comment_medias_image_1">
												</label>
												<label class="btn-action btn-remove" title="Remove Media">
												</label>
											</div>
											<div class="file-input form-control image-input"
												style="background-image: url(images/product/placeholder.png);">
												<div class="file-input-wrapper">
												</div>
												<label class=" btn-action btn-upload" title="Upload Media">
													<input type="file" accept=".png, .jpg, .jpeg"
														name="riode_comment_medias_image_2">
												</label>
												<label class="btn-action btn-remove" title="Remove Media">
												</label>
											</div>
											<div class="file-input form-control video-input"
												style="background-image: url(images/product/placeholder.png);">
												<video class="file-input-wrapper" controls=""></video>
												<label class="btn-action btn-upload" title="Upload Media">
													<input type="file" accept=".avi, .mp4"
														name="riode_comment_medias_video_1">
												</label>
												<label class="btn-action btn-remove" title="Remove Media">
												</label>
											</div>
										</div>
										<p>Upload images and videos. Maximum count: 3, size: 2MB</p>
										<button type="submit" class="btn btn-primary btn-rounded">Submit<i
												class="d-icon-arrow-right"></i></button>
									</form>
								</div>
							</div>
							<!-- End Reply -->
						</div>
					</div>
				</div>

				@if($related_product==NULL)
                 <h2 class="title">This Sub catagory Doesn,t have Related Products </h2>
				@else
				<section class="pt-3 mt-10">
					<h2 class="title justify-content-center">Related Products</h2>

					<div class="owl-carousel owl-theme owl-nav-full row cols-2 cols-md-3 cols-lg-4"
						data-owl-options="{
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
								'items': 4,
								'dots': false,
								'nav': true
							}
						}
					}">
					@foreach($related_product as $res)
						<div class="product shadow-media">
							<figure class="product-media">
								<a href="{{url('/single-product',$res->productname)}}">
									<img src="{{asset('/Image/'.$res->productimage)}}" alt="product" width="280" height="315">
								</a>
								
								<div class="product-action-vertical">
									<a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
										data-target="#addCartModal" title="Add to cart"><i
											class="d-icon-bag"></i></a>
									<a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i
											class="d-icon-heart"></i></a>
								</div>
								
							</figure>
							<div class="product-details">
								<div class="product-cat">
									<a href="shop-grid-3col.html">{{$res->catagoryname}}</a>
								</div>
								<h3 class="product-name">
									<a href="{{url('/single-product',$res->productname)}}">{{$res->productname}}</a>
								</h3>
								<div class="product-price">
									 @if($res->discountprice == NULL)
                 <span class="price">{{$res->price}} TK</span>
                @else

                 <span class="price"><ins class="new-price">{{$res->discountprice}} TK</ins><del class="old-price">{{$res->price}} TK</del></span>
                
                @endif
									
								</div>
								
							</div>
						</div>
						@endforeach
						@endif
						
					</div>
				</section>
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