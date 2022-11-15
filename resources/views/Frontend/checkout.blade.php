@extends('Frontend.frontend_layouts')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('fro/css/style.min.css')}}">

@endsection
@section('frontend.content')

<main class="main checkout">
			<div class="page-content pt-7 pb-10 mb-10">
				
				<div class="container mt-7">
					@if(Session::has('coupon'))
					@else
					<div class="card accordion">

						
						<div class="alert alert-light alert-primary alert-icon mb-4 card-header">
							<i class="fas fa-exclamation-circle"></i>
							<span class="text-body">Have a coupon?</span>
							<a href="#alert-body2" class="text-primary">Click here to enter your code</a>
						</div>
						<form action="{{route('user.coupon')}}" method="post">
							@csrf
						<div class="alert-body collapsed" id="alert-body2">
							<p>If you have a coupon code, please apply it below.</p>
							<div class="check-coupon-box d-flex">
								<input type="text" name="coupon_code"
									class="input-text form-control text-grey ls-m mr-4 mb-4" id="coupon_code" value=""
									placeholder="Coupon code">
								<button type="submit" id="coupon" class="btn btn-dark btn-rounded btn-outline mb-4">Apply
									Coupon</button>
							</div>
						</div>
					</form>
					</div>
					
					@endif
					<form action="{{route('payment.process')}}" class="form" method="post">
						@csrf
						<div class="row">
							<div class="col-lg-7 mb-6 mb-lg-0 pr-lg-4">
								<h3 class="title title-simple text-left text-uppercase">Billing Details</h3>
								<div class="row">
									<div class="col-xs-6">
										<label>First Name *</label>
										<input type="text" class="form-control" name="fname" required="" />
									</div>
									<div class="col-xs-6">
										<label>Last Name *</label>
										<input type="text" class="form-control" name="lname" required="" />
									</div>
								</div>
								
								<label>Country / Region *</label>
								<div class="select-box">
									<select name="country" class="form-control">
										<option value="us" selected>Bangladesh</option>
										<option value="uk"> United Kingdom</option>
										<option value="fr">France</option>
										<option value="aus">Austria</option>
									</select>
								</div>
								<label>Street Address *</label>
								<input type="text" class="form-control" name="address1" required=""
									placeholder="House number and street name" />
								<input type="text" class="form-control" name="address2" required=""
									placeholder="Apartment, suite, unit, etc. (optional)" />
								<div class="row">
									<div class="col-xs-6">
										<label>Town / City *</label>
										<input type="text" class="form-control" name="city" required="" id="city" />
									</div>
									<div class="col-xs-6">
										<label>State *</label>
										<input type="text" class="form-control" name="state" required="" />
									</div>
								</div>
								<div class="row">
									<div class="col-xs-6">
										<label>ZIP *</label>
										<input type="text" class="form-control" name="zip" required="" />
									</div>
									<div class="col-xs-6">
										<label>Phone *</label>
										<input type="text" class="form-control" name="phone" required="" />
									</div>
								</div>
								<label>Email Address *</label>
								<input type="text" class="form-control" name="email" required="" />
								
								
								
							</div>
							<aside class="col-lg-5 sticky-sidebar-wrapper">
								<div class="sticky-sidebar mt-1" data-sticky-options="{'bottom': 50}">
									<div class="summary pt-5">
										<h3 class="title title-simple text-left text-uppercase">Your Order</h3>
										<table class="order-table">
											<thead>
												<tr>
													<th>Product</th>
													<th></th>
												</tr>
											</thead>
											<tbody>
                                      
        	                          @foreach($cart as $data)
												
												<tr>
													<td class="product-name">{{$data->name}}<span
															class="product-quantity">×&nbsp;{{$data->qty}}</span></td>
													<td class="product-total text-body">{{$data->price}} TK</td>
												</tr>
												@endforeach
												@if(Session::has('coupon'))
												<tr class="summary-subtotal">

													<td>
														<h4 class="summary-subtitle">Subtotal</h4>
													</td>
													<td class="summary-subtotal-price pb-0 pt-0">{{Cart::subtotal()}} TK
													</td>
													
             
              <tr>
              	@if(Session()->get('coupon')['type'] == 'percentage')
              <td>Discount ({{Session()->get('coupon')['Amount']}}%):</td>
              <td>{{$dis=(double)Cart::subtotal()
                * (int)Session()->get('coupon')['Amount'] /100 }} TK</td>
                @else
                <td>Discount ({{Session()->get('coupon')['Amount']}}TK):</td>
                <td>{{(int)$dis=Session()->get('coupon')['Amount']}} TK</td>
                @endif
             </tr>
            
             
             					</tr>
												
												<tr class="summary-total">
													<td class="pb-0">
														<h4 class="summary-subtitle">Total</h4>
													</td>
													<td class=" pt-0 pb-0">
														<p class="summary-total-price ls-s text-primary" >{{$total=(double)Cart::subtotal()-(double)$dis}} TK</p>
														<input type="hidden" id="total" name="total" value="{{$total}}" />
														
													</td>
													@else
                                                     <tr class="summary-subtotal">

													<td>
														<h4 class="summary-subtitle">Subtotal</h4>
													</td>
													<td class="summary-subtotal-price pb-0 pt-0">{{Cart::subtotal()}} TK
													</td>
												</tr>
												<tr class="summary-total">
													<td class="pb-0">
														<h4 class="summary-subtitle">Total</h4>
													</td>
													<td class=" pt-0 pb-0">
														<p class="summary-total-price ls-s text-primary" id="total">{{Cart::subtotal()}} TK</p>
														<input type="hidden" id="total" name="total" value="{{$total=Cart::subtotal()}}" />
														
													</td>
												</tr>

													@endif
												</tr>
											</tbody>
										</table>
										
										
										
									</div>
								</div>
								<style>
                              .payment-box {
  background-color: #ffffff;
  -webkit-box-shadow: 0 2px 28px 0 rgba(0, 0, 0, 0.06);
          box-shadow: 0 2px 28px 0 rgba(0, 0, 0, 0.06);
  margin-top: 30px;
  padding: 30px;
}

.payment-box .payment-method p [type="radio"]:checked, .order-details .payment-box .payment-method p [type="radio"]:not(:checked) {
  display: none;
}

.payment-box .payment-method p [type="radio"]:checked + label, .order-details .payment-box .payment-method p [type="radio"]:not(:checked) + label {
  padding-left: 27px;
  cursor: pointer;
  display: block;
  color: #252525;
  position: relative;
  margin-bottom: 8px;
  font-weight: 600;
}

.payment-box .payment-method p [type="radio"]:checked + label::before, .order-details .payment-box .payment-method p [type="radio"]:not(:checked) + label::before {
  content: '';
  position: absolute;
  left: 0;
  top: 3px;
  width: 18px;
  height: 18px;
  border: 1px solid #dddddd;
  border-radius: 50%;
  background: #ffffff;
}

.payment-box .payment-method p [type="radio"]:checked + label::after, .order-details .payment-box .payment-method p [type="radio"]:not(:checked) + label::after {
  content: '';
  width: 12px;
  height: 12px;
  background: #ff1949;
  position: absolute;
  top: 6px;
  left: 3px;
  border-radius: 50%;
  -webkit-transition: 0.5s;
  transition: 0.5s;
}

.payment-box .payment-method p [type="radio"]:not(:checked) + label::after {
  opacity: 0;
  visibility: hidden;
  -webkit-transform: scale(0);
          transform: scale(0);
}

.payment-box .payment-method p [type="radio"]:checked + label::after {
  opacity: 1;
  visibility: visible;
  -webkit-transform: scale(1);
          transform: scale(1);
}

.payment-box .default-btn {
  margin-top: 15px;
  -webkit-box-shadow: 0px 5px 28.5px 1.5px rgba(149, 152, 200, 0.2);
          box-shadow: 0px 5px 28.5px 1.5px rgba(149, 152, 200, 0.2);
  border-radius: 3px;
}
								</style>
								<div class="payment-box">
                            <div class="payment-method">
                                <h5 class="title">Select Payment Method</h5>
                                <p>
                                    <input type="radio" id="Stripe" name="payment" checked value="Stripe">
                                    <label for="Stripe">Stripe</label>
                                </p>
                                <p>
                                    <input type="radio" id="bkash" name="payment" checked value="bkash">
                                    <label for="bkash">Bkash</label>
                                </p>
                                <p>
                                    <input type="radio" id="rocket" name="payment" value="rocket">
                                    <label for="rocket">Rocket</label>
                                </p>
                                <p>
                                    <input type="radio" id="shureCash" name="payment" value="cod">
                                    <label for="shureCash">Cash on Delivery</label>
                                </p>
                                                               </div>

                            <button type="submit"  class="btn btn-dark btn-rounded btn-order"><i class='bx bx-paper-plane icon-arrow before'></i><span class="label">Payment Process</span><i class="bx bx-paper-plane icon-arrow after"></i></button>
                        </div>
                    </div>
							</aside>
						</div>
					</form>
				</div>
			</div>

		</main>













@endsection