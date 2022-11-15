@extends('Frontend.frontend_layouts')
@section('frontend.content')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('fro/css/style.min.css')}}">


@endsection

 <main class="main cart">
 	<div class="page-header"
				style="background-image: url('images/shop/page-header-back.jpg'); background-color: #3C63A4;">
				
				<h1 class="page-title">Wishlist</h1>
				
			</div>

	<div class="container">

     <div class="page-content pt-7 pb-10">
                
                <div class="container mt-7 mb-2">
                    <div class="row">
                        <div class="col-lg-10 col-md-12 pr-lg-4">
                            <table class="shop-table cart-table">
                                <thead>
                                    <tr>
                                        <th><span>Product Image</span></th>
                                        <th><span>Product Name</span></th>
                                        <th><span>Price</span></th>
                                        
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	@foreach($whislist as $data)
                                    <tr class="cartpage">
                                        
                                        <td class="product-name">
                                            <div class="product-name-section">
                                                <img src="{{asset('/image/'.$data->productimage)}}">
                                            </div>
                                        </td>
                                        <td class="product-name">
                                            <span class="amount">{{$data->productname}} </span>
                                        </td>
                                        
                                        <td class="product-name">
                                            <span id="stotal">{{$data->price}} TK</span>
                                        </td>
                                        <td>
                                        	<a href="{{url('/useraddtocart',$data->id)}}"><i class="fa fa-shopping-basket" style="font-size:20px;"></i></a>
                                            <a href="{{url('/userdeletewishlist',$data->id)}}"><i class="fas fa-times" style="font-size:20px;"></i></a>
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
                       
                    </div>
                </div>
            </div>



	</div>







</main>
















@endsection