<x-admin-layout>

    <div class="main-content-inner">
        <!-- main-content-wrap -->
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>Category infomation</h3>
                <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                    <li>
                        <a href="#">
                            <div class="text-tiny">Dashboard</div>
                        </a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <a href="#">
                            <div class="text-tiny">Categories</div>
                        </a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <div class="text-tiny">New Category</div>
                    </li>
                </ul>
            </div>
            <!-- new-category -->
            <div class="wg-box">
                <div class="success-message"></div>
                <form id="add_form" class="form-new-product form-style-1" action="{{route('admin.category.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <fieldset class="name">
                        <div class="body-title">Category Name <span class="tf-color-1">*</span>
                        </div>
                        <input class="flex-grow" type="text" placeholder="Category name" name="name"
                            tabindex="0" value="" aria-required="true" required="">
                    </fieldset>
                    <fieldset class="name">
                        <div class="body-title">Category Slug <span class="tf-color-1">*</span>
                        </div>
                        <input class="flex-grow" type="text" placeholder="Category Slug" name="slug"
                            tabindex="0" value="" aria-required="true" required="">
                    </fieldset>
                    <fieldset class="category_area">
                        <div class="body-title">Parent</div>
                        <div class="category-box">
                            <select name="parent_id" id="parent_id">
                                <option value="">None</option>
                                {{-- @foreach ($categories as $category)
                                    @if (!$category->parent_id)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                        @foreach ($category->childs as $childs)
                                            <option value="{{$childs->id}}"> - {{$childs->name}}</option>
                                            @foreach ($childs->childs as $kids)
                                                <option value="{{$kids->id}}"> - - {{$kids->name}}</option>
                                                @foreach ($kids->childs as $gkids)
                                                    <option disabled="disabled" value="{{$gkids->id}}"> - - - {{$gkids->name}}</option>
                                                @endforeach
                                            @endforeach
                                        @endforeach
                                    @endif
                                @endforeach --}}
                                @if (isset( $categories ))
                                    {!! $categories !!}
                                @endif
                            </select>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="body-title">Upload images <span class="tf-color-1">*</span>
                        </div>
                        <div class="upload-image flex-grow">
                            <div class="item" id="imgpreview" style="display:none">
                                <img src="upload-1.html" class="effect8" alt="">
                            </div>
                            <div id="upload-file" class="item up-load">
                                <label class="uploadfile" for="myFile">
                                    <span class="icon">
                                        <i class="icon-upload-cloud"></i>
                                    </span>
                                    <span class="body-text">Drop your images here or select <span
                                            class="tf-color">click
                                            to browse</span></span>
                                    <input type="file" id="myFile" name="image" accept="image/*">
                                </label>
                            </div>
                        </div>
                    </fieldset>
                    <div class="bot">
                        <div></div>
                        <button id="add_button" class="tf-button w208" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


<script>
    (function($){
        $(document).ready(function(){
            $('#add_form').on('submit',function(e){
                e.preventDefault();

                form = $('#add_form')[0];
                data = new FormData(form);

                $('.success-message').html(' ');

                $('#add_button').attr('disabled', 'disabled');

                $.ajax({
                    type: 'POST',
                    url: "{{ route('admin.category.store') }}",
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function(e){
                        $('.success-message').html('<h4 class="alert alert-success">'+e.message+' !!!</h4>');
                        $('#add_button').removeAttr('disabled');

                        // categoryRearrange(e.categories);
                        $('.category-box select').html(e.categories);
                        // console.log(e.categories);
                        // console.log( e );
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

                        $('#add_button').removeAttr('disabled');
                    }
                });
            });


            function categoryRearrange(cats) {
                let h = '';
                h += '<select name="parent_id" id="parent_id"><option value="">None</option>';
                console.log( cats );
                h += '</select>';
            }
        });
    }(jQuery));
</script>
</x-admin-layout>
