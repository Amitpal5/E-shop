@extends('Frontend.frontend_layouts')
@section('frontend.content')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('fro/css/style.min.css')}}">

@endsection

<main class="main">
			<div class="page-header"
				style="background-image: url('images/shop/page-header-back.jpg'); background-color: #3C63A4;">
				<h3 class="page-subtitle"></h3>
				<h1 class="page-title">Order Tracking</h1>
				
			</div>
			<!-- End PageHeader -->
			<div class="page-content mb-10 pb-6">
				<div class="container">
					<div class="row gutter-lg main-content-wrap">
						 <div class="w-100" style="padding:40px;">
                                    <form class="pl-lg-2" action="{{url('/check-odertarcking')}}" method="post">
                                    	@csrf
                                        <h4 class="ls-m font-weight-bold">Order Tracking</h4>
                                        <p>To track your order please enter your Order ID in the box below and press the "Track" button.</p>
                                        <div class="row mb-2">
                                            
                                            <div class="col-md-8 mb-4">
                                                <input class="form-control" type="text" placeholder="Enter Your Order ID" name="orderid" required>
                                            </div>
                                            
                                        </div>
                                        <button class="btn btn-dark btn-rounded">Track</button>
                                    </form>
                                </div>
						</div>
					</div>
				</div>
			

		</main>




@endsection