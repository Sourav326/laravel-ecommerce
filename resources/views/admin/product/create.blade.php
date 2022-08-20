@extends('admin.layouts.app')
@section('content')
    <!-- Content -->
    <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Product Details</h5>
                      <small class="text-muted float-end">All fields with * are mandatory</small>
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                          {{ session('success') }}
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif
                    <div class="card-body">
                      <form method="post" action="{{route('admin.product.store')}}" enctype="multipart/formdata">
                        @csrf
                        <div class="row">
                          <div class="col-xl mb-3">
                            <label class="form-label" for="title">Title*</label>
                            <div class="input-group input-group-merge">
                              <span id="title2" class="input-group-text @error('title') input-error @enderror"
                                ><i class="bx bx-user"></i
                              ></span>
                              <input
                                type="text"
                                name="title"
                                class="form-control @error('title') input-error @enderror"
                                id="basic-icon-default-fullname"
                              />
                            </div>
                          </div>
                          <div class="col-xl mb-3">
                            <label class="form-label" for="product_unique_code">Product Unique Code*</label>
                            <div class="input-group input-group-merge">
                              <span class="input-group-text @error('product_unique_code') input-error @enderror"><i class="bx bx-envelope"></i></span>
                              <input
                                type="text"
                                name="product_unique_code"
                                id="product_unique_code"
                                class="form-control @error('product_unique_code') input-error @enderror"
                                
                              />
                              <span id="product_unique_code2" class="input-group-text @error('product_unique_code') input-error @enderror">phone_8_128</span>
                            </div>
                            <div class="form-text">You can use letters, numbers & special charactors and it must be unique</div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-xl mb-3">
                            <label class="form-label" for="price_per_unit">Price Per Unit*</label>
                            <div class="input-group input-group-merge">
                              <span id="price_per_unit2" class="input-group-text @error('price_per_unit') input-error @enderror"
                                ><i class="bx bx-buildings"></i
                              ></span>
                              <input
                                type="text"
                                name="price_per_unit"
                                id="price_per_unit"
                                class="form-control @error('price_per_unit') input-error @enderror"
                              />
                            </div>
                          </div>
                          <div class="col-xl mb-3">
                            <label class="form-label" for="sale_price_per_unit">Sale Price Per Unit</label>
                            <div class="input-group input-group-merge">
                              <span id="sale_price_per_unit2" class="input-group-text"
                              ><i class="bx bx-phone"></i
                              ></span>
                              <input
                              type="text"
                              id="sale_price_per_unit"
                              name="sale_price_per_unit"
                              class="form-control phone-mask"
                              />
                            </div>
                          </div>
                          <div class="col-xl mb-3">
                            <label class="form-label" for="status">Product Status</label>
                            <select id="defaultSelect" name="status" class="form-select">
                              <option value=0>Active</option>
                              <option value=1>Out of stock</option>
                              <option value=2>Diactive</option>
                            </select>
                          </div>
                          <div class="col-xl mb-3">
                            <label class="form-label" for="stock_quantity">Stock Quantity*</label>
                            <div class="input-group input-group-merge">
                              <span id="stock_quantity2" class="input-group-text @error('stock_quantity') input-error @enderror"
                                ><i class="bx bx-buildings"></i
                              ></span>
                              <input
                                type="text"
                                name="stock_quantity"
                                id="stock_quantity"
                                class="form-control @error('stock_quantity') input-error @enderror"
                              />
                            </div>
                          </div>
                          <div class="col-xl mb-3">
                            <label class="form-label" for="stock_quantity_to_order">Qty. Available to order</label>
                            <div class="input-group input-group-merge">
                              <span id="stock_quantity_to_order2" class="input-group-text"
                                ><i class="bx bx-buildings"></i
                              ></span>
                              <input
                                type="text"
                                name="stock_quantity_to_order"
                                id="stock_quantity_to_order"
                                class="form-control"
                              />
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-xl mb-3">
                            <label class="form-label" for="tax_percentage">Tax Percentage</label>
                            <div class="input-group input-group-merge">
                              <span id="tax_percentage2" class="input-group-text"
                                ><i class="bx bx-buildings"></i
                              ></span>
                              <input
                                type="text"
                                name="tax_percentage"
                                id="tax_percentage"
                                class="form-control"
                              />
                            </div>
                          </div>
                          <div class="col-xl mb-3">
                            <label class="form-label" for="estimated_shipping_days">Estimated Shipping Days</label>
                            <div class="input-group input-group-merge">
                              <span id="estimated_shipping_days2" class="input-group-text"
                              ><i class="bx bx-phone"></i
                              ></span>
                              <input
                              type="text"
                              id="estimated_shipping_days"
                              name="estimated_shipping_days"
                              class="form-control phone-mask"
                              />
                            </div>
                          </div>
                          <div class="col-xl mb-3">
                            <label class="form-label" for="delivery_charges">Delivery charges</label>
                            <div class="input-group input-group-merge">
                              <span id="delivery_charges2" class="input-group-text"
                                ><i class="bx bx-buildings"></i
                              ></span>
                              <input
                                type="text"
                                name="delivery_charges"
                                id="delivery_charges"
                                class="form-control"
                              />
                            </div>
                          </div>
                          <div class="col-xl mb-3">
                            <label class="form-label" for="weight">Weight</label>
                            <div class="input-group input-group-merge">
                              <span id="weight2" class="input-group-text"
                                ><i class="bx bx-buildings"></i
                              ></span>
                              <input
                                type="text"
                                name="weight"
                                id="weight"
                                class="form-control"
                              />
                            </div>
                          </div>
                          <div class="col-xl mb-3">
                            <label class="form-label" for="color">Color</label>
                            <div class="input-group input-group-merge">
                              <span id="color2" class="input-group-text"
                                ><i class="bx bx-buildings"></i
                              ></span>
                              <input
                                type="text"
                                name="color"
                                id="color"
                                class="form-control"
                              />
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-xl mb-3">
                            <label class="form-label" for="description">Description*</label>
                            <div class="input-group input-group-merge">
                              <span id="description2" class="input-group-text @error('description') input-error @enderror"
                                ><i class="bx bx-comment"></i
                              ></span>
                              <textarea
                                id="description"
                                name="description"
                                class="form-control @error('description') input-error @enderror"
                                rows="5"
                              ></textarea>
                            </div>
                          </div>
                          <div class="col-xl">
                              <div class="mb-3">
                                <label for="images" name="product_main_image" class="form-label">Product Main Image</label>
                                <input class="form-control @error('product_main_image') input-error @enderror" type="file" id="product_main_image" name="product_main_image" multiple="">
                              </div>
                              <div class="mb-3">
                                <label for="images" name="product_other_images" class="form-label">Product Other Images</label>
                                <input class="form-control" type="file" id="product_other_images" name="product_other_images" multiple="">
                              </div>
                          </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                    </div>
                  </div>
                </div>

@endsection