@if($title)
    <section class="page-title">
        @if(isset($image))
            <div class="page-title-inner parallax-window"
                 data-parallax="scroll"
                 data-image-src="{{$image}}">
        @else
            <div class="page-title-inner bg-primary">
        @endif
                <div class="container">
                    <div class="page-title-body">

                        <h1 class="page-title-title">{{ $title }}</h1>
                    </div>
                </div>
                <div class="page-title-bump"></div>
            </div>
    </section>
@endif