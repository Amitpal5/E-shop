@extends('frontend.frontend_layouts')
@section('frontend.content')


@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('fro/css/style.min.css')}}">

@endsection

<main class="main order">
			<div class="page-content pt-7 pb-10 mb-10">
			
				<div class="container mt-8">
					<div class="order-message mr-auto ml-auto">
						<div class="icon-box d-inline-flex align-items-center">
							<div class="icon-box-icon mb-0">
								<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
									xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 50 50"
									enable-background="new 0 0 50 50" xml:space="preserve">
									<g>
										<path fill="none" stroke-width="3" stroke-linecap="round"
											stroke-linejoin="bevel" stroke-miterlimit="10" d="
											M33.3,3.9c-2.7-1.1-5.6-1.8-8.7-1.8c-12.3,0-22.4,10-22.4,22.4c0,12.3,10,22.4,22.4,22.4c12.3,0,22.4-10,22.4-22.4
											c0-0.7,0-1.4-0.1-2.1"></path>
										<polyline fill="none" stroke-width="4" stroke-linecap="round"
											stroke-linejoin="bevel" stroke-miterlimit="10" points="
											48,6.9 24.4,29.8 17.2,22.3 	"></polyline>
									</g>
								</svg>
							</div>
							<div class="icon-box-content text-left">
								<h5 class="icon-box-title font-weight-bold lh-1 mb-1">Thank You!</h5>
								<p class="lh-1 ls-m">Your order has been received</p>
							</div>
						</div>
					</div>


					<div class="order-results">
						<div class="overview-item">
							<span>Order number:</span>
							<strong>{{$order->order_id}}</strong>
						</div>
						<div class="overview-item">
							<span>Status:</span>
							<strong>Pending</strong>
						</div>
						<div class="overview-item">
							<span>Date:</span>
							<strong>{{$order->day}}/{{$order->month}}/{{$order->year}}</strong>
						</div>
						
						<div class="overview-item">
							<span>Total:</span>
							<strong>{{$order->subtotal}} TK</strong>
						</div>
						<div class="overview-item">
							<span>Payment method:</span>
							<strong>{{$order->Payment_method}}</strong>
						</div>
					</div>

					<h2 class="title title-simple text-left pt-4 font-weight-bold text-uppercase">Order Details</h2>
					<div class="order-details">
						<table class="order-details-table">
							<thead>
								<tr class="summary-subtotal">
									<td>
										<h3 class="summary-subtitle">Product</h3>
									</td>
									<td></td>
								</tr>
							</thead>
							<tbody>
								@foreach($order_detail as $data)
								<tr>
									<td class="product-name">{{$data->product_Name}}<span> <i class="fas fa-times"></i>
											{{$data->Qty}}</span></td>
									<td class="product-price">{{$data->Totla_price}} TK</td>
								</tr>
								@endforeach
								
								
								<tr class="summary-subtotal">
									<td>
										<h4 class="summary-subtitle">Subtotal:</h4>
									</td>
									<td class="summary-subtotal-price">{{$order->subtotal}} TK</td>
								</tr>
								
								<tr class="summary-subtotal">
									<td>
										<h4 class="summary-subtitle">Payment method:</h4>
									</td>
									<td class="summary-subtotal-price">{{$order->Payment_method}}</td>
								</tr>
								<tr class="summary-subtotal">
									<td>
										<h4 class="summary-subtitle">Total:</h4>
									</td>
									<td>
										<p class="summary-total-price">{{$order->subtotal}} TK</p>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					

					<a href="{{url('/')}}" class="btn btn-icon-left btn-dark btn-back btn-rounded btn-md mb-4" style="margin-top:40px;"><i
							class="d-icon-arrow-left"></i> Back to List</a>
				</div>
			</div>

		</main>








@endsection