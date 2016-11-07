@if($carousels)
    <!-- Slider main container -->
    <div class="swiper-container">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            @foreach($carousels as $carousel)
                @if(count($carousel->files()->where('zone', 'background_image')->get()))

                    <div class="swiper-slide"
                         style="background-image:url({{$carousel->files()->where('zone', 'background_image')->get()[0]->path }}">
                        <div class="text-content">
                            <!-- Each slide has parallax title -->
                            <div class="title">{{ $carousel->title }}</div>
                            <!-- And parallax text with custom transition duration -->
                            <div class="text">
                                <p>{!! $carousel->description !!}</p>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination"></div>

        <!-- If we need scrollbar -->
        <div class="swiper-scrollbar"></div>
    </div>
@endif