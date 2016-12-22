@if($title)
    <section class="page-title">
        @if(isset($image))
            <div class="page-title-inner parallax-window"
                 data-parallax="scroll"
                 data-position-y="top"
                 data-speed="0.2"
                 data-image-src="{{$image}}">
        @endif
                <div class="page-title-inner bg-primary">
                    <div class="page-title-bump"></div>
                </div>
            </div>
            <div style="padding-bottom:20px; margin: 15px auto;">
                <h3 class="text-center">{{ $title }}</h3>
                <div style="position:relative;">
                    <span class="under-bump">‿</span>
                </div>
            </div>

    </section>
@endif