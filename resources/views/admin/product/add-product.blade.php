<x-admin-layout>

<!-- main-content-wrap -->
<div class="main-content-inner">
    <!-- main-content-wrap -->
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Add Product</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li>
                    <a href="index-2.html">
                        <div class="text-tiny">Dashboard</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <a href="all-product.html">
                        <div class="text-tiny">Products</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <div class="text-tiny">Add product</div>
                </li>
            </ul>
        </div>
        <div class="success-message"></div>
        <!-- form-add-product -->
        <form class="tf-section-2 form-add-product" id="add_product" method="POST" enctype="multipart/form-data"
            action="{{ route('admin.product.store') }}">
            @csrf
            {{-- <input type="hidden" name="_token" value="8LNRTO4LPXHvbK2vgRcXqMeLgqtqNGjzWSNru7Xx"
                autocomplete="off"> --}}
            <div class="wg-box">
                <fieldset class="name">
                    <div class="body-title mb-10">Product name <span class="tf-color-1">*</span>
                    </div>
                    <input class="mb-10" type="text" placeholder="Enter product name"
                        name="title" tabindex="0" value="" >
                    @error('title')
                        <div class="text-tiny text-danger">{{$message}}</div>
                    @enderror
                </fieldset>

                <fieldset class="name">
                    <div class="body-title mb-10">Slug <span class="tf-color-1">*</span></div>
                    <input class="mb-10" type="text" placeholder="Enter product slug"
                        name="slug" tabindex="0" value="" >
                        @error('slug')
                            <div class="text-tiny text-danger">{{$message}}</div>
                        @enderror
                </fieldset>

                <div class="gap22 cols">
                    <fieldset class="category">
                        <div class="body-title mb-10">Category <span class="tf-color-1">*</span>
                        </div>
                        <div class="chose">
                            {{-- <select id="multiSelect" class="" name="product_category_id"> --}}
                            {{-- <select class="form-multi-select" id="multiSelect" multiple data-coreui-search="true">
                                <option>Choose category</option>
                                {!! $categories !!}
                            </select> --}}
                            {!! $categories !!}
                        </div>
                        @error('product_category_id')
                            <div class="text-tiny text-danger">{{$message}}</div>
                        @enderror
                    </fieldset>
                    <fieldset class="brand">
                        <div class="body-title mb-10">Brand <span class="tf-color-1">*</span>
                        </div>
                        <div class="select">
                            <select class="" name="brand_id">
                                <option value="">Choose Brand</option>
                                @foreach ($brands as $brand)
                                <option value="{{$brand->id}}">{{$brand->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('brand_id')
                            <div class="text-tiny text-danger">{{$message}}</div>
                        @enderror
                    </fieldset>
                </div>

                <fieldset class="shortdescription">
                    <div class="body-title mb-10">Short Description <span
                            class="tf-color-1">*</span></div>
                    <textarea class="mb-10 ht-150" name="short_description"
                        placeholder="Short Description" tabindex="0" ></textarea>
                        @error('short_description')
                            <div class="text-tiny text-danger">{{$message}}</div>
                        @enderror
                </fieldset>

                <fieldset class="description">
                    <div class="body-title mb-10">Description <span class="tf-color-1">*</span>
                    </div>
                    <textarea class="mb-10" name="description" placeholder="Description"
                        tabindex="0" ></textarea>
                        @error('description')
                            <div class="text-tiny text-danger">{{$message}}</div>
                        @enderror
                </fieldset>
            </div>
            <div class="wg-box">
                <fieldset>
                    <div class="body-title">Upload images <span class="tf-color-1">*</span>
                    </div>
                    <div class="upload-image flex-grow">
                        <div class="item" id="imgpreview" style="display:none">
                            <img src="{{ asset('assets/admin/images/upload/upload-1.png')}}"
                                class="effect8" alt="">
                        </div>
                        <div id="upload-file" class="item up-load">
                            <label class="uploadfile" for="myFile">
                                <span class="icon">
                                    <i class="icon-upload-cloud"></i>
                                </span>
                                <span class="body-text">Drop your images here or select <span
                                        class="tf-color">click to browse</span></span>
                                <input type="file" id="myFile" name="image" accept="image/*">
                            </label>
                            @error('image')
                                <div class="text-tiny text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                </fieldset>

                <fieldset>
                    <div class="body-title mb-10">Upload Gallery Images</div>
                    <div class="upload-image mb-16">
                        <!-- <div class="item">
        <img src="images/upload/upload-1.png" alt="">
    </div>                                                 -->
                        <div id="galUpload" class="item up-load">
                            <label class="uploadfile" for="gFile">
                                <span class="icon">
                                    <i class="icon-upload-cloud"></i>
                                </span>
                                <span class="text-tiny">Drop your images here or select <span
                                        class="tf-color">click to browse</span></span>
                                <input type="file" id="gFile" name="images[]" accept="image/*"
                                    multiple="">
                            </label>
                            @error('images[]')
                                <div class="text-tiny text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                </fieldset>

                <div class="cols gap22">
                    <fieldset class="name">
                        <div class="body-title mb-10">Regular Price <span
                                class="tf-color-1">*</span></div>
                        <input class="mb-10" type="text" placeholder="Enter regular price"
                            name="regular_price" tabindex="0" value=""
                            >
                            @error('regular_price')
                                <div class="text-tiny text-danger">{{$message}}</div>
                            @enderror
                    </fieldset>
                    <fieldset class="name">
                        <div class="body-title mb-10">Sale Price </div>
                        <input class="mb-10" type="text" placeholder="Enter sale price"
                            name="sale_price" tabindex="0" value=""
                            >
                            @error('sale_price')
                                <div class="text-tiny text-danger">{{$message}}</div>
                            @enderror
                    </fieldset>
                </div>


                <div class="cols gap22">
                    <fieldset class="name">
                        <div class="body-title mb-10">SKU</div>
                        <input class="mb-10" type="text" placeholder="Enter SKU" name="SKU"
                            tabindex="0" value="" >
                            @error('SKU')
                                <div class="text-tiny text-danger">{{$message}}</div>
                            @enderror
                    </fieldset>
                    <fieldset class="name">
                        <div class="body-title mb-10">Quantity </div>
                        <input class="mb-10" type="text" placeholder="Enter quantity"
                            name="quantity" tabindex="0" value=""
                            >
                            @error('quantity')
                                <div class="text-tiny text-danger">{{$message}}</div>
                            @enderror
                    </fieldset>
                </div>

                <div class="cols gap22">
                    <fieldset class="name">
                        <div class="body-title mb-10">Stock</div>
                        <div class="select mb-10">
                            <select class="" name="stock_status">
                                <option value="instock">InStock</option>
                                <option value="outofstock">Out of Stock</option>
                            </select>
                            @error('stock_status')
                                <div class="text-tiny text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </fieldset>
                    <fieldset class="name">
                        <div class="body-title mb-10">Featured</div>
                        <div class="select mb-10">
                            <select class="" name="featured">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                            @error('featured')
                                <div class="text-tiny text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </fieldset>
                </div>
                <div class="cols gap10">
                    <button id="add_product_submit" class="tf-button w-full" type="submit">Add product</button>

                </div>
                <div class="success-message"></div>
            </div>
        </form>
        <!-- /form-add-product -->
    </div>
    <!-- /main-content-wrap -->
</div>
<!-- /main-content-wrap -->

<script>
    (function($){
        $(document).ready(function(){
            $('#add_product').on('submit',function(e){
                e.preventDefault();
                form = $('#add_product')[0];
                data = new FormData(form);

                $('#add_product_submit').attr('disabled', 'disabled');

                $.ajax({
                    type: 'POST',
                    url: "{{ route('admin.product.store') }}",
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function(e){
                        $('.success-message').html('<h4 class="alert alert-success">'+e.message+' !!!</h4>');
                        $('#add_product_submit').removeAttr('disabled');

                        console.log( e );
                    },
                    error: function(e) {

                        if( e.responseJSON.errors ) {
                            $.each(e.responseJSON.errors, function(k, v){
                                $('.success-message').append('<h4 class="alert alert-danger">'+v+'</h4>');
                            });
                        } else if( e.responseJSON.message.length > 0 ) {
                            $('.success-message').append('<h4 class="alert alert-danger">'+e.responseJSON.message+'</h4>');
                        }
                        // console.log( e.responseJSON.message.length );

                        $('#add_product_submit').removeAttr('disabled');
                    }
                });
            });
        });
    }(jQuery));
</script>
</x-admin-layout>
