@extends('Frontend.frontend_layouts')
@section('frontend.content')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('fro/css/style.min.css')}}">

@endsection

 <main class="main cart">

 	<style type="text/css">
 		Page Title CSS
=================================================*/
.page-title-area {
  position: relative;
  z-index: 1;
  background-color: #ff1949;
  background-position: center center;
  background-size: cover;
  background-repeat: no-repeat;
  padding-top: 330px;
  padding-bottom: 120px;
}

.page-title-area.page-title-style-two {
  padding-top: 280px;
  padding-bottom: 120px;
}

.page-title-area.page-title-style-three {
  padding-top: 180px;
  padding-bottom: 140px;
}

.page-title-area.item-bg1 {
  background-image: url(../img/page-title/1.jpg);
}

.page-title-area.item-bg2 {
  background-image: url(../img/page-title/2.jpg);
}

.page-title-area.item-bg3 {
  background-image: url(../img/page-title/3.jpg);
}

.page-title-area.item-bg4 {
  background-image: url(../img/page-title/4.jpg);
}

.page-title-content ul {
  padding-left: 0;
  margin-bottom: 12px;
  list-style-type: none;
}

.page-title-content ul li {
  display: inline-block;
  margin-right: 25px;
  position: relative;
  color: #ffffff;
}

.page-title-content ul li a {
  display: inline-block;
  color: #ffffff;
  opacity: .85;
}

.page-title-content ul li a:hover, .page-title-content ul li a:focus {
  color: #ff1949;
  opacity: 1;
}

.page-title-content ul li::before {
  content: "\e9fa";
  color: #ffffff;
  position: absolute;
  right: -25px;
  top: -4px;
  opacity: .85;
  font-family: "boxicons" !important;
  font-weight: normal;
  font-style: normal;
  font-variant: normal;
  font-size: 20px;
}

.page-title-content ul li:last-child {
  margin-right: 0;
}

.page-title-content ul li:last-child::before {
  display: none;
}

.page-title-content h2 {
  color: #ffffff;
  margin-bottom: 0;
  font-size: 42px;
  font-weight: 700;
}

.billing-details .title {
  margin-bottom: 30px;
  position: relative;
  padding-bottom: 10px;
  border-bottom: 1px solid #eeeeee;
  font-size: 20px;
  font-weight: 600;
}

.billing-details .title::before {
  content: '';
  position: absolute;
  background: #ff1949;
  bottom: -1px;
  left: 0;
  width: 50px;
  height: 1px;
}

.billing-details .form-group {
  margin-bottom: 25px;
}

.billing-details .form-group label {
  display: block;
  margin-bottom: 8px;
  font-weight: 500;
  font-size: 14px;
}

.billing-details .form-group label .required {
  color: red;
}

.billing-details .form-group .nice-select {
  float: unset;
  line-height: 48px;
  color: #727695;
  font-weight: normal;
  font-size: 15px;
  padding-top: 0;
  padding-bottom: 0;
}

.billing-details .form-group .nice-select .list {
  background-color: #ffffff;
  -webkit-box-shadow: 0px 0px 29px 0px rgba(102, 102, 102, 0.1);
          box-shadow: 0px 0px 29px 0px rgba(102, 102, 102, 0.1);
  border-radius: 0;
  margin-top: 0;
  width: 100%;
  padding-top: 10px;
  padding-bottom: 10px;
}

.billing-details .form-group .nice-select .list .option {
  -webkit-transition: 0.5s;
  transition: 0.5s;
  padding-left: 20px;
  padding-right: 20px;
}

.billing-details .form-group .nice-select .list .option:hover {
  background-color: #ff1949 !important;
  color: #ffffff;
}

.billing-details .form-group .nice-select .list .option.selected {
  background-color: transparent;
  font-weight: 600;
}

.billing-details .form-group .nice-select:after {
  right: 20px;
}

.billing-details .form-group .form-control {
  background: #f3f3f3;
  border-color: #f3f3f3;
}

.billing-details .form-group .form-control::-webkit-input-placeholder {
  color: #727695;
  -webkit-transition: 0.5s;
  transition: 0.5s;
}

.billing-details .form-group .form-control:-ms-input-placeholder {
  color: #727695;
  -webkit-transition: 0.5s;
  transition: 0.5s;
}

.billing-details .form-group .form-control::-ms-input-placeholder {
  color: #727695;
  -webkit-transition: 0.5s;
  transition: 0.5s;
}

.billing-details .form-group .form-control::placeholder {
  color: #727695;
  -webkit-transition: 0.5s;
  transition: 0.5s;
}

.billing-details .form-group .form-control:focus {
  background-color: transparent;
  border-color: #eeeeee;
}

.billing-details .form-group .form-control:focus::-webkit-input-placeholder {
  color: transparent;
}

.billing-details .form-group .form-control:focus:-ms-input-placeholder {
  color: transparent;
}

.billing-details .form-group .form-control:focus::-ms-input-placeholder {
  color: transparent;
}

.billing-details .form-group .form-control:focus::placeholder {
  color: transparent;
}

.billing-details .form-check {
  margin-bottom: 20px;
}

.billing-details .form-check .form-check-label {
  color: #252525;
}

.billing-details .form-check label {
  position: relative;
  left: -3px;
  top: 1px;
  font-weight: 500;
}

.billing-details .col-lg-12:last-child .form-group {
  margin-bottom: 0;
}



 	</style>
 	<style>
  /**
 * The CSS shown here will not be introduced in the Quickstart guide, but shows
 * how you can use CSS to style your Element's container.
 */
.StripeElement {
  box-sizing: border-box;
  height: 40px;
  width: 100%;
  padding: 10px 12px;
  border: 1px solid transparent;
  border-radius: 4px;
  background-color: white;
  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}
.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}
.StripeElement--invalid {
  border-color: #fa755a;
}
.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;
}
</style>

 	
            <!-- Start Page Title Area -->
    <div class="page-header"
				style="background-image: url('images/shop/page-header-back.jpg'); background-color: #3C63A4;">
				<h3 class="page-subtitle">Payment</h3>
				<h1 class="page-title">{{$a}}</h1>
				
			</div>
    <!-- End Page Title Area -->

     <!-- Start payment Area -->
		<section class="checkout-area" style="padding:50px;">
            <div class="container">
                                  <div class="row">
                       <div class="col-lg-6 sticky-sidebar-wrapper" style="margin-bottom: 50px;">
                       	  <form action="{{route('payment.bkash')}}" method="post" id="payment-form">
                            @csrf

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
									@foreach($cart as $data1)
												
												<tr>
													<td class="product-name">{{$data1->name}}<span
															class="product-quantity">×&nbsp;{{$data1->qty}}</span></td>
													<td class="product-total text-body">{{$data1->price}} TK</td>
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
														<p class="summary-total-price ls-s text-primary" >{{$ltotal=(double)Cart::subtotal()-(double)$dis}} TK</p>
													@php
                           $ltotal=(double)Cart::subtotal()-(double)$dis;
                          @endphp
														
													</td>
                          <tr class="summary-total">
                          <td class="pb-0">
                            <h4 class="summary-subtitle">Bkash Charge</h4>
                          </td>
                          <td class=" pt-0 pb-0">
                            <p class="summary-total-price ls-s text-primary" id="total">{{$ltotal * 0.018}} TK</p>
                            @php
                             
                             $charges=$ltotal * 0.018;
                             $tbkadh=$ltotal+$charges;
 
                            @endphp
                            
                          </td>
                        </tr>
                           <tr class="summary-total">
                          <td class="pb-0">
                            <h4 class="summary-subtitle">Grand Total</h4>
                          </td>
                          <td class=" pt-0 pb-0">
                            <p class="summary-total-price ls-s text-primary" id="total">{{$tbkadh}} TK</p>
                            <input type="hidden" id="total" name="total" value="{{$coubkadh}}" />
                            
                          </td>
                        </tr>
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
                            <h4 class="summary-subtitle">Bkash Charge</h4>
                          </td>
                          <td class=" pt-0 pb-0">
                            <p class="summary-total-price ls-s text-primary" id="total">{{Cart::subtotal() * 0.018}} TK</p>
                            @php
                             
                             $charges=Cart::subtotal() * 0.018;
                             $tbask=Cart::subtotal()+$charges;
 
                            @endphp
                            
                          </td>
                        </tr>
                          <tr class="summary-total">
                          <td class="pb-0">
                            <h4 class="summary-subtitle">Total</h4>
                          </td>
                          <td class=" pt-0 pb-0">
                            <p class="summary-total-price ls-s text-primary" id="total">{{Cart::subtotal()+$charges}} TK</p>
                            <input type="hidden" id="total" name="total" value="{{$tbask}}" />
                            
                          </td>
                        </tr>


													@endif
												</tr>
											</tbody>
										</table>
										
										
										
									</div>
								</div>
							</div>

                        
                       <input type="hidden" value="{{ $data['fname'] }}" name="fname">
                        <input type="hidden" value="{{ $data['lname'] }}" name="lname">
                        <input type="hidden" value="{{ $data['email'] }}" name="email">
                        <input type="hidden" value="{{ $data['phone'] }}" name="phone">
                        <input type="hidden" value="{{ $data['address'] }}" name="address1">
                        <input type="hidden" value="{{ $data['address2'] }}" name="address2">
                        <input type="hidden" value="{{ $data['town'] }}" name="city">
                        <input type="hidden" value="{{ $data['town'] }}" name="country">
                        <input type="hidden" value="{{ $data['state'] }}" name="state">
                        <input type="hidden" value="{{ $data['zip'] }}" name="zip">
                        <input type="hidden" value="{{ $data['payment'] }}" name="payment">
                          
                        
                        
                        <div class="col-lg-6 col-md-12">
                            <div class="billing-details">
                                <h3 class="title">Pay Now</h3>
                             
               <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>Bkash No.</label>
                                            <input type="text" class="form-control" value="01712532864" disabled>
                                            @php
                                            
                                           $charge=Cart::subtotal()*0.018;
                                           $total=$charge+Cart::subtotal();
                                            @endphp
                                            @if(Session::has('coupon'))
                                              <small class="text-danger">{{(int)$tbkadh}}Tk Send Money This Number</small>
                                            @else
                                        <small class="text-danger">{{(int)$total}}Tk Send Money This Number</small>
                                        @endif
                                                                                </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>Account Type</label>
                                            <input type="text" class="form-control" value="Personal" disabled>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label>Your Bkash No. <span class="required">*</span></label>
                                            <input type="number" class="form-control" name="payment_no" value="" placeholder="Your Bkash Account No" data-validation="required">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label>Money Transaction ID <span class="required">*</span></label>
                                            <textarea name="tnx_id" id="notes" cols="30" rows="5" placeholder="Balance Transaction ID" class="form-control" data-validation="required"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 text-right">
                                        <button type="submit"  class="btn btn-primary"><i class='bx bx-paper-plane icon-arrow before'></i><span class="label">Place Order</span><i class="bx bx-paper-plane icon-arrow after"></i></button>
                                    </div>
                                </div>
                            </div>
            </form>
                            </div>
                        </div>
                    </div>
                
            </div>
        </section>
		<!-- End payment Area -->


           

</main>













@endsection