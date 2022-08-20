@extends('admin.layouts.app')
@section('content')
<div class="card">
                <h5 class="card-header">Products</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Price</th>
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
                            <li
                              data-bs-toggle="tooltip"
                              data-popup="tooltip-custom"
                              data-bs-placement="top"
                              class="avatar avatar-xs pull-up"
                              title="Lilian Fuller"
                            >
                              <img src="{{asset('assets/admin/img/avatars/5.png')}}" alt="Avatar" class="rounded-circle" />
                            </li>
                            <li
                              data-bs-toggle="tooltip"
                              data-popup="tooltip-custom"
                              data-bs-placement="top"
                              class="avatar avatar-xs pull-up"
                              title="Sophia Wilkerson"
                            >
                              <img src="{{asset('assets/admin/img/avatars/6.png')}}" alt="Avatar" class="rounded-circle" />
                            </li>
                            <li
                              data-bs-toggle="tooltip"
                              data-popup="tooltip-custom"
                              data-bs-placement="top"
                              class="avatar avatar-xs pull-up"
                              title="Christina Parker"
                            >
                              <img src="{{asset('assets/admin/img/avatars/7.png')}}" alt="Avatar" class="rounded-circle" />
                            </li>
                          </ul>
                        </td>
                        <td><strong>{{$product->title}}</strong></td>
                        <td>Rs {{$product->price_per_unit}}</td>
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
                              <a class="dropdown-item" href="javascript:void(0);"
                                ><i class="bx bx-edit-alt me-1"></i> Edit</a
                              >
                              <a class="dropdown-item" href="javascript:void(0);"
                                ><i class="bx bx-trash me-1"></i> Delete</a
                              >
                            </div>
                          </div>
                        </td>
                      </tr>
                      @empty
                      <p class="no-data-found">No Products found</p>
                      @endforelse
                    </tbody>
                  </table>
                  <nav aria-label="Page navigation">
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