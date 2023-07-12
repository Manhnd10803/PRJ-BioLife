@extends('layouts.appAdmin')
@section('content')
<div class="container-fluid px-4">
    <div class="card mb-4 mt-4">
        <div class="card-header">
            <div>
                <i class="fas fa-table me-1"></i>
                DataTable Bill
            </div>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Date</th>
                        <th>ID Bill</th>
                        <th>Fullname</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Total Bill</th>
                        <th>Payment Method</th>
                        <th>Status Bill</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 1;
                    @endphp
                    @foreach($bill as $bil)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{  $bil->dateBill  }}</td>
                        <td>{{  $bil->idBill  }}</td>
                        <td>{{  $bil->fullnameBill  }}</td>
                        <td>{{  $bil->phoneBill  }}</td>
                        <td>{{  $bil->addressBill  }}</td>
                        <td>{{  $bil->totalBill  }}</td>
                        @if($bil->paymentMethodBill == 1)
                            <td>Payment on delivery</td>
                            @elseif($bil->paymentMethodBill == 2)
                            <td>Online payment</td>
                        @endif
                        <td>
                                @if ($bil->statusBill==1) New orders @endif 
                                @if ($bil->statusBill==2) Orders are being prepared @endif 
                                @if ($bil->statusBill==3) The order has been handed over to the shipping unit @endif 
                                @if ($bil->statusBill==4) Your order is being delivered to you @endif 
                                @if ($bil->statusBill==5) Order delivered failed @endif
                                @if ($bil->statusBill==6) Order delivered successfully @endif
                                @if ($bil->statusBill==7) Completed order @endif
                        </td>
                        <td>
                            <a class="btn btn-link text-dark px-3 mb-0" href="{{ route('admin.bill.detailBill',$bil->idBill) }}"><i class="fa-solid fa-eye" style="margin-right: 5px"></i>Detail</a>      
                        </td>
                    </tr>
                    @php 
                    $i++;
                    @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection