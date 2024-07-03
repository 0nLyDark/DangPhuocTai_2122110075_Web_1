<ul>
    @foreach ($list_menu_sub as $item)
        <li><a href="{{ asset($item->link) }}">{!! $item->name !!}</a></li>
    @endforeach
</ul>