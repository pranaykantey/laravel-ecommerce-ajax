
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
        @if (count($categories) > 0 )
        @foreach ($categories as $key => $value)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td class="pname">
                <div class="image">
                    <img src="{{asset($value->image)}}" alt="" class="{{$value->slug}}">
                </div>
                <div class="name">
                    <a href="#" class="body-title-2">{{$value->name}}</a>
                </div>
            </td>
            <td>{{$value->slug}}</td>
            <td><a href="#" target="_blank">{{$value->products_count}}</a></td>
            <td>
                <div class="list-icon-function">
                    <a class="edit_post_button" data-url="{{ route('admin.category.edit', $value->id)}}" href="javascript:">
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
                        Are you sure? You want to delete. <span class="text-danger">{{$value->name}}</span>
                        <form class="main_post_delete_form" id="delete_form" data-url="{{route('admin.category.delete',$value->id)}}" action="javascript:" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="item text-danger delete">
                                <span class="btn btn-primary no">No</span>
                                <button class="delete-button btn btn-danger yes" id="delete_button" type="submit">Yes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
