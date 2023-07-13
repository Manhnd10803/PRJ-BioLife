@extends('layouts.app')
@section('content')
    <!--Navigation section-->
    <div class="container">
        <nav class="biolife-nav">
            <ul>
                <li class="nav-item"><a href="/" class="permal-link">Home</a></li>
                <li class="nav-item"><span class="current-page">Order Lookup</span></li>
            </ul>
        </nav>
        {{-- Khi không có đơn hàng --}}
        @if (count($bills) == 0)
        <h3>You don't have any orders yet</h3>
        @endif
    </div>

    <div class="page-contain checkout">
        <!-- Main content -->
        <div id="main-content" class="main-content">
            <div class="container sm-margin-top-37px">
                <div class="row">
                    <!--checkout progress box-->
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        {{-- Khi có đơn hàng --}}
                        @if (count($bills) != 0)
                            <table>
                                <thead>
                                    <th>STT</th>
                                    <th>ID</th>
                                    <th>Order Date</th>
                                    <th>Payment Method</th>
                                    <th>Total Bill</th>
                                    <th>Quantity Product</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @php
                                        $stt = 1;
                                    @endphp
                                    @foreach ($bills as $bill)
                                    <tr>
                                        <td>{{ $stt }}</td>
                                        <td>#OD{{ $bill->idBill }}VN</td>
                                        <td>{{ $bill->bill->dateBill }}</td>
                                        <td>@if ( $bill->bill->paymentMethodBill == 1)
                                            Payment on delivery
                                        @elseif($bill->bill->paymentMethodBill == 2)
                                            Online payment
                                        @endif</td>
                                        <td>${{ $bill->bill->totalBill }}</td>
                                        <td>{{ $bill->quantityProduct }}</td>
                                        <td>
                                            {{-- {{ $bill->bill->statusBill }} --}}
                                            @if ($bill->bill->statusBill == 1)
                                                New orders
                                            @elseif($bill->bill->statusBill == 2)
                                                Orders are being prepared
                                            @elseif($bill->bill->statusBill == 3)
                                                Order is being shipped
                                            @elseif($bill->bill->statusBill == 4)
                                                Your order is being delivered to you
                                            @elseif($bill->bill->statusBill == 5)
                                                Order delivered failed
                                            @elseif($bill->bill->statusBill == 6)
                                                Order delivered successfully
                                            @elseif($bill->bill->statusBill == 7)
                                                Completed order
                                            @endif
                                        </td>
                                        <td><a href="{{ route('orderDetail', $bill->idBill) }}" class="btn btn-outline-primary" style="color: #666666"><button type="button" class="btn btn-outline-primary">Detail</button></a> <a href="{{ route('confirmReceived', $bill->idBill) }}" style="color: #666666"><button type="button" class="btn btn-outline-primary" @if($bill->bill->statusBill != 6) disabled @endif @if($bill->bill->statusBill == 7) style="background-color: #e73918; color: white;" @endif>Received</button></a></td>
                                    </tr>
                                    @php
                                        $stt++;
                                    @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection