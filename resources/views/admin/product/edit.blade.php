@extends('admin.layouts.app')
@section('content')
    <!-- Content -->
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit Product Details</h5>
                <small class="text-muted float-end">All fields with * are mandatory</small>
            </div>
            @if (session('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="card-body">

                      @include('admin/product/form')
    
            </div>
        </div>
    </div>

@endsection
