<x-admin-layout>

    <div class="another-main-content">
        <div class="main-content-inner">
            <div class="main-content-wrap">
                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                    <h3>Brand infomation</h3>
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
                                <div class="text-tiny">Brands</div>
                            </a>
                        </li>
                        <li>
                            <i class="icon-chevron-right"></i>
                        </li>
                        <li>
                            <div class="text-tiny">New Brand</div>
                        </li>
                    </ul>
                </div>
                <!-- new-category -->
                <div class="wg-box">
                    <div class="success-message"></div>
                    <form id="add_brand" class="form-new-product form-style-1" action="{{route('admin.brands.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <fieldset class="name">
                            <div class="body-title">Brand Name <span class="tf-color-1">*</span></div>
                            <input class="flex-grow" type="text" placeholder="Brand name" name="name"
                                tabindex="0" value=""  >
                        </fieldset>
                        <fieldset class="name">
                            <div class="body-title">Brand Slug <span class="tf-color-1">*</span></div>
                            <input class="flex-grow" type="text" placeholder="Brand Slug" name="slug"
                                tabindex="0" value=""  >
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
                                                class="tf-color">click to browse</span></span>
                                        <input type="file" id="myFile" name="image" accept="image/*">
                                    </label>
                                </div>
                            </div>
                        </fieldset>

                        <div class="bot">
                            <div></div>
                            <button id="add_brand_submit" class="tf-button w208" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


<script>
    (function($){
        $(document).ready(function(){
            $('#add_brand').on('submit',function(e){
                e.preventDefault();

                form = $('#add_brand')[0];
                data = new FormData(form);

                $('.success-message').html(' ');

                $('#add_brand_submit').attr('disabled', 'disabled');

                $.ajax({
                    type: 'POST',
                    url: "{{ route('admin.brands.store') }}",
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function(e){
                        $('.success-message').html('<h4 class="alert alert-success">'+e.message+' !!!</h4>');
                        $('#add_brand_submit').removeAttr('disabled');

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

                        $('#add_brand_submit').removeAttr('disabled');
                    }
                });
            });
        });
    }(jQuery));
</script>

</x-admin-layout>
