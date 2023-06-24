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
                        <th>Date Bill</th>
                        <th>Status</th>
                        <th>Total</th>
                        <th>Mã vận đơn</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>STT</th>
                        <th>ID Bill</th>
                        <th>Date Bill</th>
                        <th>Status</th>
                        <th>Total</th>
                        <th>Mã vận đơn</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    
                    <tr>
                        <td>1</td>
                        <td>donso1</td>
                        <td>10/5/2023</td>
                        <td>Đã đặt hàng</td>
                        <td>9999</td>
                        <td>996</td>
                        <td>
                            <a class="btn btn-link text-dark px-3 mb-0" href="{{ route('admin.bill.detailBill') }}"><i class="fa-solid fa-eye" style="margin-right: 5px"></i>Chi tiết đơn hàng</a>
                            
                        </td>
                    </tr>
                    
                    
                </tbody>
            </table>
        </div>
        
    </div>
</div>
@endsection