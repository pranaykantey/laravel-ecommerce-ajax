<div class="another-main-content">
    <div class="main-content-inner">
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>Edit <small class="text-warning">- {{$category->name}}</small></h3>
            </div>
            {{-- {{ $category->name }} --}}
            <!-- new-category -->
            <div class="wg-box">
                <div class="success-message"></div>
                <form id="update_cateogry" data-url="{{route('admin.category.update', $category->id)}}" class="form-new-product main_post_update_form form-style-1" method="POST" enctype="multipart/form-data">
                    @csrf
                    <fieldset class="name">
                        <div class="body-title">Category Name <span class="tf-color-1">*</span></div>
                        <input class="flex-grow" type="text" placeholder="Brand name" name="name"
                            tabindex="0" value="{{$category->name}}"  >
                    </fieldset>
                    <fieldset class="name">
                        <div class="body-title">Category Slug <span class="tf-color-1">*</span></div>
                        <input class="flex-grow" type="text" placeholder="Brand Slug" name="slug"
                            tabindex="0" value="{{$category->slug}}"  >
                    </fieldset>
                    <fieldset>
                        <div class="body-title">Cateogry Image<span class="tf-color-1">*</span>
                        </div>
                        <div class="upload-image flex-grow">
                            <div class="item" id="imgpreview">
                                <img src="{{asset($category->image)}}" class="effect8" alt="">
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
                        <button id="update_category_submit" class="tf-button w208 update_post_button" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
