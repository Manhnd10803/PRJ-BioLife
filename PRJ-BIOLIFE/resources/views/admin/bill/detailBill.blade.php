@extends('layouts.appAdmin')
@section('content')
    <div class="page-contain checkout">
        <!-- Main content -->
        <div id="main-content" class="main-content">
            <div class="container sm-margin-top-37px">
                <div class="row">
                    <!--checkout progress box-->
                    <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
                        <div class="checkout-progress-wrap">
                            <ul class="steps">
                                <li class="step 1st">
                                    <div class="checkout-act active">
                                        <h3 class="title-box"><span class="number">.</span>Fill in the information</h3>
                                        <div class="box-content">
                                            <div class="login-on-checkout">
                                                <form action="{{ route('admin.bill.update',$bill->idBill) }}" name="frm-login" method="post" class="form-control">
                                                    @csrf
                                                    @method('POST')
                                                    <div class="form-outline mb-4">
                                                        <label class="form-label">Full Name Bill</label>
                                                        <input type="text" name="name" id="input_name" style="width: 100%;" value="{{$bill->fullnameBill}}" disabled>
                                                    </div>
                                                    <div class="form-outline mb-4">
                                                        <label class="form-label"">Address</label>
                                                        <input type="text" name="name" id="input_address" value="{{$bill->addressBill}}" style="width: 100%;" disabled>
                                                    </div>
                                                    <div class="form-outline mb-4">
                                                        <label class="form-label">Phone number</label>
                                                        <input type="text" name="name" id="input_phone" value="{{$bill->phoneBill}}" style="width: 100%;" disabled>
                                                    </div>
                                                    <div class="form-outline mb-4">
                                                        <label class="form-label">Email</label>
                                                        <input type="text" name="name" id="input_email" value="{{$bill->emailBill}}" style="width: 100%;" disabled>
                                                    </div>
                                                    <div class="form-outline mb-4">
                                                        <label class="form-label">Payment methods</label>
                                                        <input type="text" name="name" id="input_payment" value="{{$bill->paymentMethodBill}}" style="width: 100%;" disabled>
                                                    </div>
                                                    <div class="form-outline mb-4">
                                                        <label class="form-label">Date</label>
                                                        <input type="text" name="name" id="input_payment" value="{{$bill->dateBill}}" style="width: 100%;" disabled>
                                                    </div>
                                                    <div class="form-outline mb-4">
                                                        <label class="form-label">Total Bill</label>
                                                        <input type="text" name="name" id="input_payment" value="{{$bill->totalBill}}" style="width: 100%;" disabled>
                                                    </div>
                                                    <div class="form-outline mb-4">
                                                        <label class="form-label">Status Bill</label>
                                                        <input type="text" name="status" id="input_payment" value="{{$bill->statusBill}}" style="width: 100%;">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary btn-block mb-4">Detail Bill</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            {{-- <form action="" method="post">
                                <label for="">Full Name</label>
                                <input type="text" >
                            </form> --}}
                        </div>
                    </div>

                    <!--Order Summary-->
                    <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12 sm-padding-top-48px sm-margin-bottom-0 xs-margin-bottom-15px">
                        <div class="order-summary sm-margin-bottom-80px">
                            <div class="title-block">
                                <h3 class="title">Order Summary</h3>
                            </div>
                            <div class="cart-list-box short-type">
                                <ul class="subtotal">
                                    <li>
                                        <div class="subtotal-line">
                                            <b class="stt-name">Subtotal</b>
                                            <span class="stt-price">£170.00</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="subtotal-line">
                                            <b class="stt-name">Shipping</b>
                                            <span class="stt-price">£20.00</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="subtotal-line">
                                            <b class="stt-name">Tax</b>
                                            <span class="stt-price">£0.00</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="subtotal-line">
                                            <a href="#" class="link-forward">Promo/Gift Certificate</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="subtotal-line">
                                            <b class="stt-name">total:</b>
                                            <span class="stt-price">£190.00</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection