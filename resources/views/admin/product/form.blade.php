@if(isset($product)) 
    <form method="post" action="{{route('admin.product.update',$product->id)}}" enctype="multipart/form-data">
        @method('put')
@else
    <form method="post" action="{{route('admin.product.store')}}" enctype="multipart/form-data">
@endif
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
            value="{{old('title',isset($product->title) ? $product->title : null)}}"
            />
        </div>
        @error('title')
            <div class="error">{{ $message }}</div>
        @enderror
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
                value="{{old('product_unique_code',isset($product->product_unique_code) ? $product->product_unique_code : null)}}"
                />
                <span id="product_unique_code2" class="input-group-text @error('product_unique_code') input-error @enderror">phone_8_128</span>
            </div>
            @error('product_unique_code')
                <div class="error">{{ $message }}</div>
            @else
                <div class="form-text">You can use letters, numbers & special charactors and it must be unique</div>
            @enderror
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
                value="{{old('price_per_unit',isset($product->price_per_unit) ? $product->price_per_unit : null)}}"
                />
            </div>
            @error('price_per_unit')
                <div class="error">{{ $message }}</div>
            @enderror
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
                value="{{old('sale_price_per_unit',isset($product->sale_price_per_unit) ? $product->sale_price_per_unit : null)}}"
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
                value="{{old('stock_quantity',isset($product->stock_quantity) ? $product->stock_quantity : null)}}"
                />
            </div>
            @error('stock_quantity')
                <div class="error">{{ $message }}</div>
            @enderror
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
                value="{{old('stock_quantity_to_order',isset($product->stock_quantity_to_order) ? $product->stock_quantity_to_order : null)}}"
                />
            </div>
            @error('stock_quantity_to_order')
                <div class="error">{{ $message }}</div>
            @enderror
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
                value="{{old('tax_percentage',isset($product->tax_percentage) ? $product->tax_percentage : null)}}"
                />
            </div>
            @error('tax_percentage')
                <div class="error">{{ $message }}</div>
            @enderror
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
                value="{{old('estimated_shipping_days',isset($product->estimated_shipping_days) ? $product->estimated_shipping_days : null)}}"
                />
            </div>
            @error('estimated_shipping_days')
                <div class="error">{{ $message }}</div>
            @enderror
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
                value="{{old('delivery_charges',isset($product->delivery_charges) ? $product->delivery_charges : null)}}"
                />
            </div>
            @error('delivery_charges')
                <div class="error">{{ $message }}</div>
            @enderror
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
                value="{{old('weight',isset($product->weight) ? $product->weight : null)}}"
                />
            </div>
            @error('weight')
                <div class="error">{{ $message }}</div>
            @enderror
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
                value="{{old('color',isset($product->color) ? $product->color : null)}}"
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
                value="{{old('description',isset($product->description) ? $product->description : null)}}"
                ></textarea>
            </div>
            @error('description')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-xl">
            <div class="mb-3">
                <label for="images" name="product_main_image" class="form-label">Product Main Image</label>
                <input class="form-control @error('product_main_image') input-error @enderror" type="file" id="product_main_image" name="product_main_image" multiple="">
                @error('product_main_image')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="images" name="product_other_images" class="form-label">Product Other Images</label>
                <input class="form-control" type="file" id="product_other_images" name="product_other_images[]" multiple="">
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>