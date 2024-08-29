<div class="main-content-inner">
    <!-- main-content-wrap -->
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Edit {{$product->name}}</h3>
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
        <form data-url="{{route('admin.product.update', $product->id)}}" class="tf-section-2 form-add-product main_post_update_form" id="add_product" method="POST" enctype="multipart/form-data"
            action="javascript:">
            @csrf
            {{-- <input type="hidden" name="_token" value="8LNRTO4LPXHvbK2vgRcXqMeLgqtqNGjzWSNru7Xx"
                autocomplete="off"> --}}
            <div class="wg-box">
                <fieldset class="name">
                    <div class="body-title mb-10">Product name <span class="tf-color-1">*</span>
                    </div>
                    <input class="mb-10" type="text" placeholder="Enter product name"
                        name="title" tabindex="0" value="{{$product->title}}" >
                    @error('title')
                        <div class="text-tiny text-danger">{{$message}}</div>
                    @enderror
                </fieldset>

                <fieldset class="name">
                    <div class="body-title mb-10">Slug <span class="tf-color-1">*</span></div>
                    <input class="mb-10" type="text" placeholder="Enter product slug"
                        name="slug" tabindex="0" value="{{$product->slug}}" >
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
                            <ul class="form-multi-select" id="multiSelect" multiple data-coreui-search="true">
                                <li>None</li>
                                @foreach ($categories as $category)
                                <li>
                                    <label>
                                        <input @checked(in_array($category->slug, array_column($product->category->toArray(), 'slug'))) type="checkbox" name="product_category_id['{{$category->id}}']" value="{{$category->id}}'"> {{$category->name}}
                                    </label>
                                </li>
                                @foreach ($category->childs as $child)
                                <li>
                                    <label>
                                        <input @checked(in_array($child->slug, array_column($product->category->toArray(), 'slug'))) type="checkbox" name="product_category_id['{{$child->id}}']" value="{{$child->id}}'"> - {{$child->name}}
                                    </label>
                                </li>
                                @foreach ($child->childs as $kids)
                                <li>
                                    <label>
                                        <input @checked(in_array($kids->slug, array_column($product->category->toArray(), 'slug'))) type="checkbox" name="product_category_id['{{$kids->id}}']" value="{{$kids->id}}'"> - - {{$kids->name}}
                                    </label>
                                </li>
                                @foreach ($kids->childs as $kid)
                                <li>
                                    <label>
                                        <input @checked(in_array($kid->slug, array_column($product->category->toArray(), 'slug'))) type="checkbox" name="product_category_id['{{$kid->id}}']" value="{{$kid->id}}'"> - - - {{$kid->name}}
                                    </label>
                                </li>
                                @endforeach
                                @endforeach
                                @endforeach
                                @endforeach
                            </ul>
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
                                <option @selected( $product->brand->id == $brand->id ) value="{{$brand->id}}">{{$brand->name}}</option>
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
                        placeholder="Short Description" tabindex="0" >{{ $product->short_description }}</textarea>
                        @error('short_description')
                            <div class="text-tiny text-danger">{{$message}}</div>
                        @enderror
                </fieldset>

                <fieldset class="description">
                    <div class="body-title mb-10">Description <span class="tf-color-1">*</span>
                    </div>
                    <textarea class="mb-10" name="description" placeholder="Description"
                        tabindex="0" >{{ $product->description }}</textarea>
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
                        <div class="item" id="imgpreview" >
                            <img src="{{ asset($product->image)}}"
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
                            name="regular_price" tabindex="0" value="{{$product->regular_price}}"
                            >
                            @error('regular_price')
                                <div class="text-tiny text-danger">{{$message}}</div>
                            @enderror
                    </fieldset>
                    <fieldset class="name">
                        <div class="body-title mb-10">Sale Price </div>
                        <input class="mb-10" type="text" placeholder="Enter sale price"
                            name="sale_price" tabindex="0" value="{{$product->sale_price}}"
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
                            tabindex="0" value="{{$product->SKU}}" >
                            @error('SKU')
                                <div class="text-tiny text-danger">{{$message}}</div>
                            @enderror
                    </fieldset>
                    <fieldset class="name">
                        <div class="body-title mb-10">Quantity </div>
                        <input class="mb-10" type="text" placeholder="Enter quantity"
                            name="quantity" tabindex="0" value="{{$product->quantity}}"
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
                                <option @selected($product->stock_status == 'instock') value="instock">InStock</option>
                                <option @selected($product->stock_status == 'outofstock') value="outofstock">Out of Stock</option>
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
                                <option @selected($product->featured == 'No') value="No">No</option>
                                <option @selected($product->featured == 'Yes') value="Yes">Yes</option>
                            </select>
                            @error('featured')
                                <div class="text-tiny text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </fieldset>
                </div>
                <div class="cols gap10">
                    <button id="add_product_submit" class="tf-button w-full update_post_button" type="submit">Update Product</button>

                </div>
                {{-- <div class="success-message"></div> --}}
            </div>
        </form>
        <!-- /form-add-product -->
    </div>
    <!-- /main-content-wrap -->
</div>
