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
                        <th>ID Bill</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Total</th>
                        <th>B/L no.</th>
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
                        <td>{{  $bil->idBill  }}</td>
                        <td>{{  $bil->dateBill  }}</td>
                        <td>{{  $bil->statusBill  }}</td>
                        <td>{{  $bil->totalBill  }}</td>
                        <td>{{  $bil->paymentMethodBill  }}</td>
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