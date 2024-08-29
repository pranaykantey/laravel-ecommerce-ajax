<x-admin-layout>

    <!-- main-content-wrap -->
    <div class="main-content-inner">
        <!-- main-content-wrap -->
        <div class="main-content-inner">
            <div class="main-content-wrap">
                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                    <h3>All Products</h3>
                    <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                        <li>
                            <a href="index.html">
                                <div class="text-tiny">Dashboard</div>
                            </a>
                        </li>
                        <li>
                            <i class="icon-chevron-right"></i>
                        </li>
                        <li>
                            <div class="text-tiny">All Products</div>
                        </li>
                    </ul>
                </div>

                <div class="wg-box">
                    <div class="flex items-center justify-between gap10 flex-wrap">
                        <div class="wg-filter flex-grow">
                            <form class="form-search">
                                <fieldset class="name">
                                    <input type="text" placeholder="Search here..." class="" name="name"
                                        tabindex="2" value="" aria-required="true" required="">
                                </fieldset>
                                <div class="button-submit">
                                    <button class="" type="submit"><i class="icon-search"></i></button>
                                </div>
                            </form>
                        </div>
                        <a class="tf-button style-1 w208" href="{{ route('admin.product.add') }}"><i
                                class="icon-plus"></i>Add new</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered main-data-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>SKU</th>
                                    <th>Category</th>
                                    <th>Brand</th>
                                    <th>Featured</th>
                                    <th>Stock</th>
                                    <th>Quantity</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $key => $product)
                                <td>{{$key+1}}</td>
                                    <td class="">
                                        <div class="pname">
                                            <div class="image">
                                                <img src="{{asset($product->image)}}" alt="" class="{{$product->slug}}">
                                            </div>
                                            <div class="name">
                                                <a href="#" class="body-title-2">{{$product->title}}</a>
                                                <div class="text-tiny mt-3">{{$product->slug}}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Regular: {{$product->regular_price}} Sale: {{$product->sale_price}}</td>
                                    <td>{{$product->SKU}}</td>
                                    <td><ul class="category-list d-flex list-unstyled flex-wrap">@foreach ($product->category as $category)
                                        <li>{{$category->name}}</li>
                                    @endforeach</ul></td>
                                    <td>@if ($product->brand)
                                        {{ $product->brand->name }}
                                    @endif</td>
                                    <td>{{$product->featured}}</td>
                                    <td>{{$product->stock_status}}</td>
                                    <td>{{$product->quantity}}</td>
                                    <td>
                                        <div class="list-icon-function">
                                            <a href="#" target="_blank">
                                                <div class="item eye">
                                                    <i class="icon-eye"></i>
                                                </div>
                                            </a>
                                            <a class="edit_post_button" data-url="{{ route('admin.product.edit', $product->id)}}" href="javascript:">
                                                <div class="item edit">
                                                    <i class="icon-edit-3"></i>
                                                </div>
                                            </a>
                                            <a class="delete-brand delete-open" href="javascript:">
                                                <div class="item edit">
                                                    <i class="icon-trash-2"></i>
                                                </div>
                                            </a>
                                            <div class="show-hide">
                                                Are you sure? You want to delete. <span class="text-danger">{{$product->name}}</span>
                                                <form class="main_post_delete_form" id="delete_form" data-url="{{route('admin.product.delete',$product->id)}}" action="javascript:" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="item text-danger delete">
                                                        <span class="btn btn-primary no">No</span>
                                                        <button class="delete-button btn btn-danger yes" id="delete_button" type="submit">Yes</button>
                                                    </div>
                                                </form>
                                            </div>
                                            {{-- <form class="main_post_delete_form" id="delete_form" data-url="{{route('admin.product.delete',$product->id)}}" action="javascript:" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="item text-danger delete">
                                                    <button class="delete-button" id="delete_button" type="submit"><i class="icon-trash-2"></i></button>
                                                </div>
                                            </form> --}}
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                    <div class="divider"></div>
                    <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">

                    </div>
                </div>
            </div>
        </div>
        <!-- /main-content-wrap -->
    </div>
    <!-- /main-content-wrap -->

</x-admin-layout>


























