<div class="another-main-content">
    <div class="main-content-inner">
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>Edit <small class="text-warning">- {{$brand->name}}</small></h3>
            </div>
            {{-- {{ $brand->name }} --}}
            <!-- new-category -->
            <div class="wg-box">
                <div class="success-message"></div>
                <form id="update_brand" data-url="{{route('admin.brands.update', $brand->id)}}" class="form-new-product form-style-1" action="{{route('admin.brands.update', $brand->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <fieldset class="name">
                        <div class="body-title">Brand Name <span class="tf-color-1">*</span></div>
                        <input class="flex-grow" type="text" placeholder="Brand name" name="name"
                            tabindex="0" value="{{$brand->name}}"  >
                    </fieldset>
                    <fieldset class="name">
                        <div class="body-title">Brand Slug <span class="tf-color-1">*</span></div>
                        <input class="flex-grow" type="text" placeholder="Brand Slug" name="slug"
                            tabindex="0" value="{{$brand->slug}}"  >
                    </fieldset>
                    <fieldset>
                        <div class="body-title">Upload images <span class="tf-color-1">*</span>
                        </div>
                        <div class="upload-image flex-grow">
                            <div class="item" id="imgpreview">
                                <img src="{{asset($brand->image)}}" class="effect8" alt="">
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
                        <button data-url="{{route('admin.brands.update', $brand->id)}}" id="update_brand_submit" class="tf-button w208" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
