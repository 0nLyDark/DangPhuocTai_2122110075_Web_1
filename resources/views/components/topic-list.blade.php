<div class="topic">
    <h1 class="text-center py-4">Chủ đề</h1>
    <ul>
        @foreach ($topic_list as $item)
            <li><a href="{{ route('site.post.topic',['slug'=>$item->slug]) }}" >{{ $item->name }}</a></li>
        @endforeach
    </ul>
</div>