<section class="slider">
    <div class="">
        <div id="demo" class="carousel slide" data-bs-ride="carousel">

            <!-- Indicators/dots -->
            <div class="carousel-indicators">
                @for ($i = 0; $i < count($list_slider); $i++)
                    @if ($i == 0)
                        <button type="button" data-bs-target="#demo" data-bs-slide-to="{{ $i }}" class="active"></button>
                    @else
                        <button type="button" data-bs-target="#demo" data-bs-slide-to="{{ $i }}" class=""></button>
                    @endif
                @endfor
            </div>
            
            <!-- The slideshow/carousel -->
            <div class="carousel-inner" >
                @foreach ($list_slider as $row_slider)
                    @if ($loop->first)
                        <div class="carousel-item active">
                            <img src="{{ asset('image/banners/'.$row_slider->image) }}" alt="Los Angeles" class="  slide-pig" >
                            <img src="{{ asset('image/banners/'.$row_slider->image) }}" alt="Los Angeles" class="  slide-small" >
            
                            <div class="carousel-caption">
                            <h3>Los Angeles</h3>
                            <p>We had such a great time in LA!</p>
                            </div>
                        </div>
                    @else
                        <div class="carousel-item">
                            <img src="{{ asset('image/banners/'.$row_slider->image) }}" alt="Los Angeles" class="  slide-pig" >
                            <img src="{{ asset('image/banners/'.$row_slider->image) }}" alt="Los Angeles" class="  slide-small" >
            
                            <div class="carousel-caption">
                            <h3>Los Angeles</h3>
                            <p>We had such a great time in LA!</p>
                            </div>
                        </div>
                    @endif
                    
                @endforeach

            </div>
            <!-- Left and right controls/icons -->
            <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </div>

</section>