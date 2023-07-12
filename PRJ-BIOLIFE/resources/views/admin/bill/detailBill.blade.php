@extends('layouts.appAdmin')
@section('content')
<div class="container-fluid px-4">
    <div class="card mb-4 mt-4">
        <div class="card-header">
            <div>
                <i class="fas fa-table me-1"></i>
                Detail Bill
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.bill.update',$bill->idBill) }}" method="post">
            @csrf
            @method('POST')
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>ID Bill</th>
                            <th>Fullname</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Total Bill</th>
                            <th>Payment Method</th>
                            <th>Status Bill</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{  $bill->dateBill  }}</td>
                            <td>{{  $bill->idBill  }}</td>
                            <td>{{  $bill->fullnameBill  }}</td>
                            <td>{{  $bill->phoneBill  }}</td>
                            <td>{{  $bill->addressBill  }}</td>
                            <td>{{  $bill->totalBill  }}</td>

                            @if($bill->paymentMethodBill == 1)
                            <td>Payment on delivery</td>
                            @elseif($bill->paymentMethodBill == 2)
                            <td>Online payment</td>
                            @endif
                            <td>
                                <select name="status" class="form-select">
                                        <option value="1" @if ($bill->statusBill==1) selected @elseif($bill->statusBill > 1) disabled @endif>New orders</option>
                                        
                                        <option value="2" @if ($bill->statusBill==2) selected @elseif($bill->statusBill > 2) disabled @endif>Orders are being prepared</option>
                                       
                                        <option value="3" @if ($bill->statusBill==3) selected @elseif($bill->statusBill > 3) disabled @endif>The order has been handed over to the shipping unit</option>
                                       
                                        <option value="4" @if ($bill->statusBill==4) selected @elseif($bill->statusBill > 4) disabled @endif>Your order is being delivered to you</option>

                                        <option value="5" @if ($bill->statusBill==5) selected @elseif($bill->statusBill > 5) disabled @endif>Order delivered failed</option>
                                       
                                        <option value="6" @if ($bill->statusBill==6) selected @elseif($bill->statusBill > 6) disabled @elseif($bill->statusBill == 5) disabled @endif>Order delivered successfully</option>
                                       
                                        <option value="7" @if ($bill->statusBill==7) selected @endif disabled>Completed order</option>
                                </select>
                            </td>
                        </tr>
                    </tbody>
                    <button type="submit" class="btn btn-primary btn-block mb-4">Save</button>
                </table>
                <table border="1" class="table">
                    <tr>
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                    </tr>
                @foreach($arrayProduct as $pro) 
                    <tr>
                    <td><img src="{{ asset('storage/'.$pro->srcImage) }}" alt="" width="75"></td>
                    <td>{{$pro->nameProduct }}</td>
                    <td>{{$pro->priceSaleProduct }}$  <del style="color: red">{{$pro->priceProduct }}$</del></td>
                    <td>{{$cart->quantityCart}}</td>
                    </tr>
                @endforeach
                </table>
            </form>
        </div>
    </div>
</div>
@endsection
