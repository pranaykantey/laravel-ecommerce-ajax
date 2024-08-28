<x-admin-layout>

    <div class="main-content-inner">
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>Categories</h3>
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
                        <div class="text-tiny">Categories</div>
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
                    <a class="tf-button style-1 w208" href="add-category.html"><i
                            class="icon-plus"></i>Add new</a>
                </div>
                <div class="wg-table table-all-user">
                    <table class="table table-striped table-bordered">
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
                            @if (count($category) > 0 )
                            @foreach ($category as $key => $value)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td class="pname">
                                    <div class="image">
                                        <img src="1718066463.html" alt="" class="image">
                                    </div>
                                    <div class="name">
                                        <a href="#" class="body-title-2">{{$value->name}}</a>
                                    </div>
                                </td>
                                <td>{{$value->slug}}</td>
                                <td><a href="#" target="_blank">2</a></td>
                                <td>
                                    <div class="list-icon-function">
                                        <a href="{{ route('admin.category.edit', $value->id)}}">
                                            <div class="item edit">
                                                <i class="icon-edit-3"></i>
                                            </div>
                                        </a>
                                        <form class="delete-form" id="delete_form" action="{{route('admin.category.delete',$value->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="item text-danger delete">
                                                <button class="delete-button" data-delete-id="{{ $value->id }}" id="delete_button" type="submit"><i class="icon-trash-2"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="divider"></div>
                <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">

                </div>
            </div>
        </div>
    </div>

<script>
    (function($){
        $(document).ready(function(){
            $('.delete-button').on('click', function(e){
                e.preventDefault();

                let from = $(this).closest('form');
                let data = new FormData( $(this).closest('form')[0] );
                let action = $(this).closest('form').attr('action');
                let itIs = $(this);

                $('.success-message').html('');

                itIs.attr('disabled','disabled');

                console.log( action );

                $.ajax({
                    type: 'POST',
                    url: action,
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function(e){
                        $('.success-message').html('<h4 class="alert alert-warning">'+e.message+' !!!</h4>');
                        itIs.removeAttr('disabled');

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

                        itIs.removeAttr('disabled');
                    }
                });


            });
            // $('#add_form').on('submit',function(e){
            //     e.preventDefault();

            //     form = {!! isset( $value ) ? $value : ''; !!}
            //     // data = new FormData(form);
            //     data = form;

            //     $('.success-message').html('');

            //     $('#add_button').attr('disabled', 'disabled');

            //     $.ajax({
            //         type: 'POST',
            //         url: "{{ route('admin.category.delete', 'id') }}",
            //         data: data,
            //         processData: false,
            //         contentType: false,
            //         success: function(e){
            //             $('.success-message').html('<h4 class="alert alert-success">'+e.message+' !!!</h4>');
            //             $('#add_button').removeAttr('disabled');

            //             // categoryRearrange(e.categories);
            //             $('.category-box select').html(e.categories);
            //             // console.log(e.categories);
            //             // console.log( e );
            //         },
            //         error: function(e) {

            //             if( e.responseJSON.errors ) {
            //                 $.each(e.responseJSON.errors, function(k, v){
            //                     $('.success-message').append('<h4 class="alert alert-danger">'+v+'</h4>');
            //                 });
            //             } else if( e.responseJSON.message.length > 0 ) {
            //                 $('.success-message').append('<h4 class="alert alert-danger">'+e.responseJSON.message+'</h4>');
            //             }
            //             // console.log( e.responseJSON.message.length );

            //             $('#add_button').removeAttr('disabled');
            //         }
            //     });
            // });


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
