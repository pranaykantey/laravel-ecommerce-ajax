
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
    @foreach ($brands as $key => $brand)
    <tr>
        <td>{{ $key + 1 }}</td>
        <td class="pname">
            <div class="image">
                <img src="{{asset($brand->image)}}" alt="" class="image">
            </div>
            <div class="name">
                <a href="#" class="body-title-2">{{$brand->name}}</a>
            </div>
        </td>
        <td>{{$brand->slug}}</td>
        <td><a href="#" target="_blank">{{$brand->products_count}}</a></td>
        <td>
            <div class="list-icon-function">
                <a class="edit-brand edit_post_button" href="javascript:"
                    data-url="{{ route('admin.brands.edit', $brand->id) }}">
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
                    Are you sure? You want to delete. <span class="text-danger">{{$brand->name}}</span>
                    <form class="main_post_delete_form" action="javascript:" method="POST" id="delete_brand" data-url="{{route('admin.brands.destroy', $brand->id)}}">
                        @csrf
                        @method('DELETE')
                        <div class="item text-danger delete">
                            <span class="btn btn-primary btn-large no">No</span>
                            <button class="delete-button btn btn-danger btn-large yes" type="submit">Yes</button>
                        </div>
                    </form>
                </div>
            </div>
        </td>
    </tr>
    @endforeach

</tbody>
