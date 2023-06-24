@extends('layouts.appAdmin')
@section('content')
<div class="container-fluid px-4">
    {{-- <div class="card mb-4 mt-4">
        <div class="card-header">
            <div>
                <i class="fas fa-table me-1"></i>
                Detail Bill : (ID bill)
            </div>
            
        </div>
        <div class="card-body">
            
        </div>
        
    </div> --}}
    <div class="card">
        <div class="card-body">
          <div class="container mb-5 mt-3">
            <div class="row d-flex align-items-baseline">
              <div class="col-xl-9">
                <p style="color: #000000;font-size: 20px;">Detail Bill &gt;&gt; <strong>ID user: #123-123</strong></p>
              </div>
              <div class="col-xl-3 float-end">
                <a class="btn btn-light text-capitalize border-0" data-mdb-ripple-color="dark"><i
                    class="fas fa-print text-primary"></i> Print</a>
                <a class="btn btn-light text-capitalize" data-mdb-ripple-color="dark"><i
                    class="far fa-file-pdf text-danger"></i> Export</a>
              </div>
            </div>
            <div class="container">
              <div class="col-md-12">
                <div class="text-center">
                  <i class="far fa-building fa-4x ms-0" style="color:#8f8061 ;"></i>
                  <p class="pt-2">ID Bill</p>
                </div>
              </div>
              <div class="row">
                <div class="col-xl-8">
                  <ul class="list-unstyled">
                    <li class="text-muted">To : <span style="color:#8f8061 ;">Tên người nhận</span></li>
                    <li class="text-muted">Address : jdkfjhk</li>
                    <li class="text-muted">Email : dammebatdiet0550@gmail.com</li>
                    <li class="text-muted"><i class="fas fa-phone"></i> Phone : 123-456-789</li>
                  </ul>
                </div>
                <div class="col-xl-4">
                  <p class="text-muted">Invoice</p>
                  <ul class="list-unstyled">
                    <li class="text-muted"><i class="fas fa-circle" style="color:#000000 ;"></i> <span
                        class="fw-bold">ID bill:</span>#123-456</li>
                    <li class="text-muted"><i class="fas fa-circle" style="color:#000000 ;"></i> <span
                        class="fw-bold">Creation Date: </span>Jun 23,2021</li>
                    <li class="text-muted"><i class="fas fa-circle" style="color:#000000;"></i> <span
                        class="me-1 fw-bold">Status:</span><span class="badge bg-warning text-black fw-bold">
                        Unpaid</span></li>
                  </ul>
                </div>
              </div>
              <div class="row my-2 mx-1 justify-content-center">
                <div class="col-md-2 mb-4 mb-md-0">
                  <div class="
                              bg-image
                              ripple
                              rounded-5
                              mb-4
                              overflow-hidden
                              d-block
                              " data-ripple-color="light">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/new/img(4).webp"
                      class="w-100" height="100px" alt="Elegant shoes and shirt" />
                    <a href="#!">
                      <div class="hover-overlay">
                        <div class="mask" style="background-color: hsla(0, 0%, 98.4%, 0.2)"></div>
                      </div>
                    </a>
                  </div>
                </div>
                <div class="col-md-7 mb-4 mb-md-0">
                  <p class="fw-bold">Custom suit</p>
                  <p class="mb-1">
                    <span class="text-muted me-2">Size:</span><span>8.5</span>
                  </p>
                  <p>
                    <span class="text-muted me-2">Color:</span><span>Gray</span>
                  </p>
                </div>
                <div class="col-md-3 mb-4 mb-md-0">
                  <h5 class="mb-2">
                    <s class="text-muted me-2 small align-middle">$1500</s><span class="align-middle">$1050</span>
                  </h5>
                  <p class="text-danger"><small>You save 25%</small></p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-xl-8">
                  <p class="ms-3">Add additional notes and payment information</p>
                </div>
                <div class="col-xl-3">
                  <ul class="list-unstyled">
                    <li class="text-muted ms-3"><span class="text-black me-4">SubTotal</span>$1050</li>
                    <li class="text-muted ms-3 mt-2"><span class="text-black me-4">Shipping</span>$15</li>
                  </ul>
                  <p class="text-black float-start"><span class="text-black me-3"> Total Amount</span><span
                      style="font-size: 25px;">$1065</span></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>
@endsection