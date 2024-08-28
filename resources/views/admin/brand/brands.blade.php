<x-admin-layout>

    <div class="main-content-inner">
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>Brands</h3>
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
                        <div class="text-tiny">Brands</div>
                    </li>
                </ul>
            </div>

            <div class="wg-box">
                <div class="success-message"></div>
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
                    <a class="tf-button style-1 w208" href="{{route('admin.brands.add')}}"><i class="icon-plus"></i>Add new</a>
                </div>
                <div class="wg-table table-all-user">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered brand-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Products</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @php
                                dd($brands);
                            @endphp --}}
                                @foreach ($brands as $key => $brand)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td class="pname">
                                            <div class="image">
                                                <img src="{{asset($brand->image)}}" alt="{{$brand->slug}}" class="image">
                                            </div>
                                            <div class="name">
                                                <a href="#" class="body-title-2">{{ $brand->name }}</a>
                                            </div>
                                        </td>
                                        <td>{{ $brand->slug }}</td>
                                        <td><a href="#" target="_blank">1</a></td>
                                        <td style="position: relative">
                                            <div class="list-icon-function">
                                                <a class="edit-brand" href="javascript:"
                                                    data-url="{{ route('admin.brands.edit', $brand->id) }}">
                                                    <div class="item edit">
                                                        <i class="icon-edit-3"></i>
                                                    </div>
                                                </a>
                                                <a class="delete-brand" href="javascript:">
                                                    <div class="item edit">
                                                        <i class="icon-trash-2"></i>
                                                    </div>
                                                </a>
                                                <div class="show-hide">
                                                    Are you sure? You want to delete. <span class="text-danger">{{$brand->name}}</span>
                                                    <form action="{{ route('admin.brands.destroy', $brand->id) }}" method="POST" id="delete_brand" data-url="{{route('admin.brands.destroy', $brand->id)}}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="item text-danger delete">
                                                            <span class="text-primary no small">No</span><button class="text-danger" type="submit">Yes</button>
                                                        </div>
                                                    </form>
                                                </div>
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
    </div>
    <!-- Button to Open the Modal -->

    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                <!-- Modal Header -->
                {{-- <div class="modal-header">
          <h4 class="modal-title">Edit Post</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div> --}}

                <!-- Modal body -->
                <div class="modal-body" id="modal-content">
                    Modal body..
                </div>

                <!-- Modal footer -->
                {{-- <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div> --}}

            </div>
        </div>
    </div>

    <script>
        // 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        (function($) {
            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                });

                $(document).on('click', '.edit-brand', function(e) {
                    e.preventDefault();

                    let url = $(this).data('url');

                    $.ajax({
                        url,
                        type: 'GET',
                        contentType: false,
                        processData: false,
                        success: function(res) {
                            // $('.modal').addClass('show').css('display','block');
                            // $('.modal-body').html(e);
                            if (res.status == 200) {
                                $('#modal-content').html(res.html);
                                $('#myModal').modal('show');
                            }
                            // console.log(res);
                        },
                        error: function(e) {
                            // console.log(e);
                        }
                    })
                });

                $('.btn-close').on('click', function() {
                    // $(this).closest('.modal').removeClass('show').css('display','none');
                    $('#myModal').modal('hide');
                });


                $(document).on('submit','#update_brand',function(e) {
                    e.preventDefault();

                    var data = new FormData( $('#update_brand')[0] );

                    // console.log( data );

                    $.ajax({
                        url: $(this).data('url'),
                        type: 'POST',
                        contentType: false,
                        processData: false,
                        data: data,
                        success: function(res) {
                            if( res.status === 200 ) {
                                $('.brand-table').html(res.html);
                                // console.log(res.html);
                                $('#myModal').modal('hide');
                            }
                        },
                        error: function(res){
                            console.log(res);
                        }
                    });
                });

                $(document).on('submit','#delete_brand', function(e){
                    e.preventDefault();

                    var data = new FormData( $('#delete_brand')[0] );

                    $.ajax({
                        type: 'POST',
                        url: $(this).data('url'),
                        data: data,
                        processData: false,
                        contentType: false,
                        success: function(res){
                            if( res.status === 200 ) {
                                $('.brand-table').html(res.html);
                                $('.success-message').html('<h4 class="alert alert-danger">'+res.message+'</h4>');
                            }
                        },
                        error: function(res) {
                            console.log(res);
                        }
                    });
                });
            });
        }(jQuery));
    </script>
</x-admin-layout>
