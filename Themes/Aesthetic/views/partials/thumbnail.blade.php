@if($block)
<figure class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
    <div class="thumbnail">
        <div class="thumbnail-image-container">
            @if(count($block->files()->where('zone', 'image')->get()))
                <img src="{{ Imagy::getThumbnail($block->files()->where('zone', 'image')->get()[0]->path, 'mediumThumb') }}"
                     alt="{{ $block->title }}"/>
            @else
                <img src=""
                     alt="{{ $block->title }}"/>
            @endif
        </div>
        <div class="thumbnail-caption">
            <div class="thumbnail-bump"></div>
            <div class="thumbnail-icon">
                <i class="fa fa-cog"></i>
            </div>
            <h5 class="thumbnail-title">
                {{ $block->title }}
            </h5>
            <div class="thumbnail-action">
                <button class="btn">
                    {{ trans('pearlskin::common.labels.read more') }}
                </button>
            </div>
        </div>
    </div>
</figure>
@endif