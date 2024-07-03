<section class="post-new container">
    <div class=" ">
        <h2 class="text-center">BÀI VIẾT MỚI</h2>
        <div class="post-wrapper" >
            <i id="btnPost-left" class="fa-solid fa-angle-left"></i>
            <div class="post-carousel " >
                @foreach ($post_new as $post_item)
                    <div class= "post-item ">
                        <div class="post-item-image">
                        <a href="{{ asset('bai-viet/'.$post_item->slug) }}"> <img class="rounded img-fluid " src="{{ asset('image/posts/'.$post_item->image) }}" alt="{{ $post_item->image }}"> </a>
                        </div>
                        <div class="post-item-title">
                            <h6><a href="{{ asset('bai-viet/'.$post_item->slug) }}">{{ $post_item->title }}</a></h6>
                        </div>
                        <div class="post-item-description">
                            <p class="d-none d-sm-block ">{{ Str::limit($post_item->description, 180) }}</p>
                            <p class="d-sm-none ">{{ Str::limit($post_item->description, 120) }}</p>
                        </div>
                    </div>
                @endforeach

            </div>
            <i id="btnPost-right" class="fa-solid fa-angle-right"></i>
        </div>
    </div>
</section>