<div class="widget">
    <h4 class="widget-title">{{ trans('pearlskin::widgets.procedures') }}</h4>
    <ul>
        @foreach($procedures as $procedure)
            <li>
                <div class="widget-thumbnail">
                    <a href="{{ route('procedure', $procedure->title) }}"
                       title="{{ $procedure->title }}">
                        @if(count($procedure->files()->where('zone', 'image')->get()))
                            <img src="{{ Imagy::getThumbnail($procedure->files()->where('zone', 'image')->get()[0]->path, 'mediumThumb') }}"
                                 alt="{{ $procedure->title }}"/>
                        @else
                            <img src=""
                                 alt="{{ $procedure->title }}"/>
                        @endif
                    </a>
                    <div class="thumbnail-bump"></div>
                    <div class="thumbnail-icon"><span class="fa fa-heartbeat"></span></div>
                </div>
                <div class="widget-caption">
                    {{ $procedure->title }}
                </div>
            </li>
        @endforeach
    </ul>
</div>