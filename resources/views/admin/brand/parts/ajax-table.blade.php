
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
        <td><a href="#" target="_blank">1</a></td>
        <td>
            <div class="list-icon-function">
                <a class="edit-brand" href="javascript:" data-url="{{route('admin.brands.edit', $brand->id)}}">
                    <div class="item edit">
                        <i class="icon-edit-3"></i>
                    </div>
                </a>
                <form action="#" method="POST">
                    <div class="item text-danger delete">
                        <i class="icon-trash-2"></i>
                    </div>
                </form>
            </div>
        </td>
    </tr>
    @endforeach

</tbody>
