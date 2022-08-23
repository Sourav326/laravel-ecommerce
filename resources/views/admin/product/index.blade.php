@extends('admin.layouts.app')
@section('content')
<div class="card">
    <div class="d-flex justify-content-between card-header">
        <div class="btn-group">
            <h5>Products</h5>
        </div>
        <div class="btn-group">
            <a href="{{route('admin.product.create')}}">
                <button type="button" class="btn btn-success">
                    <i class='bx bxs-add-to-queue'></i>
                    Add Product
                </button>
            </a>
        </div>
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Sale Price</th>
                    <th>Stock</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @forelse($products as $product)
                <tr>
                    <td>
                        <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                class="avatar avatar-xs pull-up">
                                <img src="{{ asset($product->product_main_image) }}"
                                    alt="{{$product->product_main_image}}" class="rounded-circle" />
                            </li>
                        </ul>
                    </td>
                    <td><strong>{{$product->title}}</strong></td>
                    <td>Rs {{$product->price_per_unit}}</td>
                    <td>Rs {{$product->sale_price_per_unit}}</td>
                    <td>{{$product->stock_quantity}}</td>
                    <td>
                        @if($product->status == 0)
                        <span class="badge bg-label-primary me-1">Active</span>
                        @elseif($product->status == 1)
                        <span class="badge bg-label-warning me-1">Out of stock</span>
                        @elseif($product->status == 2)
                        <span class="badge bg-label-danger me-1">Deactive</span>
                        @endif
                    </td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{route('admin.product.edit',[$product->id])}}"><i
                                        class="bx bx-edit-alt me-1"></i> Edit</a>
                                <div class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalCenter_{{$product->id}}"><i
                                        class="bx bx-edit-alt me-1"></i> Delete</div>
                            </div>
                            <!-- Model -->
                            <div class="modal fade" id="modalCenter_{{$product->id}}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h1 class="">Are you sure? <br>You want to delete it.</h1>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary"
                                                data-bs-dismiss="modal">
                                                Close
                                            </button>
                                            <form method="post" action="{{route('admin.product.update',$product->id)}}"
                                                enctype="multipart/form-data">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-primary">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @empty
                  <p class="no-data-found">No Products found</p>
                @endforelse
            </tbody>
        </table>
        <nav aria-label="Page navigation" style="padding:1.3rem">
            <ul class="pagination">
                <li class="page-item first">
                    <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevrons-left"></i></a>
                </li>
                <li class="page-item prev">
                    <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevron-left"></i></a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="javascript:void(0);">1</a>
                </li>
                </li>
                <li class="page-item next">
                    <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevron-right"></i></a>
                </li>
                <li class="page-item last">
                    <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevrons-right"></i></a>
                </li>
            </ul>
        </nav>
        {{$products->links()}}
    </div>
</div>

@endsection