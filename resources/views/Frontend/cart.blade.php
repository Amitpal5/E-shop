@extends('frontend.frontend_layouts')
@section('frontend.content')


@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('fro/css/style.min.css')}}">

@endsection

 <main class="main cart">
 	<div class="page-header"
				style="background-image: url('images/shop/page-header-back.jpg'); background-color: #3C63A4;">
				
				<h1 class="page-title">Cart</h1>
				
			</div>
            <div class="page-content pt-7 pb-10">
                
                <div class="container mt-7 mb-2">
                    <div class="row">
                        <div class="col-lg-8 col-md-12 pr-lg-4">
                            <table class="shop-table cart-table">
                                <thead>
                                    <tr>
                                        <th><span>Product</span></th>
                                        <th><span>Price</span></th>
                                        <th><span>quantity</span></th>
                                        <th>Subtotal</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	@foreach($cartitem as $data)
                                    <tr class="cartpage">
                                        
                                        <td class="product-name">
                                            <div class="product-name-section">
                                                <a href="product-simple.html">{{$data->name}}</a>
                                            </div>
                                        </td>
                                        <td class="product-subtotal">
                                            <span class="amount">{{$data->price}} TK</span>
                                        </td>
                                        <td class="product-quantity">
                                            <div class="input-group">
                                                
                                                <input type="number" name="qty" value="{{$data->qty}}" class="form-control" id="qty" style="width:60px;">
                                                
                                            </div>
                                        </td>
                                        <td class="product-price">
                                            <span id="stotal">{{$data->price * $data->qty}} TK</span>
                                        </td>
                                        <td>
                                        	<input type="hidden" id="id" value="{{$data->rowId}}">
                                            <button class="deleter btn btn-link btn-close"><i class="fas fa-times"></i><span class="sr-only">Close</span> </button>
                                        </td>
                                    </tr>
                                  @endforeach
                                    
                                </tbody>
                            </table>
                            <div class="cart-actions mb-6 pt-4">
                                <a href="{{url('/')}}" class="btn btn-dark btn-md btn-rounded btn-icon-left mr-4 mb-4"><i
                                        class="d-icon-arrow-left"></i>Continue Shopping</a>
                                
                            </div>
                           
                        </div>
                        <aside class="col-lg-4 sticky-sidebar-wrapper">
                            <div class="sticky-sidebar" data-sticky-options="{'bottom': 20}">
                                <div class="summary mb-4">
                                    <h3 class="summary-title text-left">Cart Totals</h3>
                                    <table class="shipping">
                                        <tr class="summary-subtotal">
                                            <td>
                                                <h4 class="summary-subtitle">Subtotal</h4>
                                            </td>
                                            <td>
                                                <p class="summary-subtotal-price"><span id="cart-price">{{Cart::subtotal()}} TK</p></span>
                                            </td>
                                        </tr>
                                       
                                    </table>
                                    
                                    <table class="total">
                                        <tr class="summary-subtotal">
                                            <td>
                                                <h4 class="summary-subtitle" id="tprice">Total</h4>
                                            </td>
                                            <td>
                                               <p class="summary-subtotal-price"><span id="cart-price">{{Cart::subtotal()}} TK</p></span>
                                            </td>
                                        </tr>
                                    </table>
                                    <a href="{{route('user.checkout')}}" class="btn btn-dark btn-rounded btn-checkout">Proceed to
                                        checkout</a>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>

        </main>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">


$(document).ready(function(){

	
    
    $(document).on('click','.deleter',function(){



    var id=$(this).closest(".cartpage").find("#id").val();
    
    if(id){
$.ajax({
url:"{{url('cartitem/delete')}}/"+id,
type:"GET",
dataType:"json",
 success:function(data) {
   
  if(data.status){
  
 $('span#cart-price').text(data.amounts);
$('span#cart-count').text(data.counts);
  
  location.reload(false);
  }

},
});
}



  });

     
$(document).on('change','#qty',function(){

var id=$(this).closest(".cartpage").find("#id").val();
    var qty=$(this).closest(".cartpage").find("#qty").val();
   $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

 $.ajax({
url:"{{url('cart/update')}}",
type:"POST",
data:{

  id:id,
  qty:qty,
},
dataType:"json",
 success:function(data) {
   
  if(data.status){


$('span#cart-price').text(data.amount);
$('span#cart-count').text(data.counts);
  	thisclick.closest(".cartpage").find("#stotal").text(data.line);


  }

},
});



  });



});
     
 




</script>

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