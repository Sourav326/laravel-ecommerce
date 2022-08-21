@extends('admin.layouts.app')
@section('content')
    <!-- Content -->
  <div class="col-xl">
        <div class="card mb-4">
              <div class="card-header d-flex justify-content-between align-items-center">
                  <h5 class="mb-0">Product Details</h5>
                  <small class="text-muted float-end">All fields with * are mandatory</small>
              </div>
              <div class="card-body">
                
                    @include('admin/product/form')
                
              </div>
        </div>
  </div>

@endsection
