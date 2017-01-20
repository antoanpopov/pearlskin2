<div class="widget">
    <h4 class="widget-title">{{ trans('pearlskin::common.labels.gallery') }}</h4>
    <ul class="image-gallery">
        @foreach($images as $image)
            <li>
                <a href="{{$image->path->getUrl()}}" data-lightbox="gallery">
                    <img src="{{$image->path->getUrl()}}"/>
                </a>
            </li>
        @endforeach
    </ul>
</div>
