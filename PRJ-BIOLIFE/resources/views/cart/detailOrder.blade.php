@extends('layouts.app')
@section('content')
    <!--Navigation section-->
    <div class="container">
        <nav class="biolife-nav">
            <ul>
                <li class="nav-item"><a href="/" class="permal-link">Home</a></li>
                <li class="nav-item"><a href="{{ route('orderLookup') }}" class="permal-link">Order Lookup</a></li>
                <li class="nav-item"><span class="current-page">Order Detail</span></li>
            </ul>
        </nav>
    </div>

    <div class="page-contain checkout">
        <!-- Main content -->
        <div id="main-content" class="main-content">
            <div class="container sm-margin-top-37px">
                <div class="row">
                    <!--checkout progress box-->
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h4>Order Information</h4> 
                        <table>
                            <thead>
                                <th>ID</th>
                                <th>Fullname</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Order Date</th>
                                <th>Payment Method</th>
                                <th>Status</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $bill->idBill }}</td>
                                    <td>{{ $bill->fullnameBill }}</td>
                                    <td>{{ $bill->phoneBill }}</td>
                                    <td>{{ $bill->addressBill }}</td>
                                    <td>{{ $bill->dateBill }}</td>
                                    <td>@if ( $bill->paymentMethodBill == 1)
                                        Payment on delivery
                                    @elseif($bill->paymentMethodBill == 2)
                                        Online payment
                                    @endif</td>
                                    <td>
                                        @if ($bill->statusBill == 1)
                                            New orders
                                        @elseif($bill->statusBill == 2)
                                            Orders are being prepared
                                        @elseif($bill->statusBill == 3)
                                            Order is being shipped
                                        @elseif($bill->statusBill == 4)
                                            Your order is being delivered to you
                                        @elseif($bill->statusBill == 5)
                                            Order delivered failed
                                        @elseif($bill->statusBill == 6)
                                            Order delivered successfully
                                        @elseif($bill->statusBill == 7)
                                            Completed order
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <h4>Product information in the order</h4>
                        <table>
                            <thead>
                                <th>STT</th>
                                <th>Product Name</th>
                                <th>Image</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th>
                            </thead>
                            <tbody>
                                @php
                                    $stt = 1;
                                @endphp
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $stt }}</td>
                                        <td>{{ $product->nameProduct }}</td>
                                        <td><img src="{{ asset('storage/'.$product->srcImage) }}" alt="" width="100"></td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>${{ $product->priceSaleProduct }}</td>
                                        <td>${{ $product->quantity*$product->priceSaleProduct }}</td>
                                    </tr>
                                @php
                                    $stt++;
                                @endphp
                                @endforeach
                            </tbody>
                            <tfoot>
                                <td colspan="5">Total</td>
                                <td><b>${{ $total }}</b></td>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection