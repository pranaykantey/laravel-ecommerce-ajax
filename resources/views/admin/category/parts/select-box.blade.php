<select name="parent_id" id="parent_id">
    <option value="">None</option>
    @foreach ($categories as $category)
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
    @endforeach
    {{-- @if (isset( $categories ))
        {!! $categories !!}
    @endif --}}
</select>
