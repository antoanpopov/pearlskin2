<div class="widget">
    <h4 class="widget-title">{{ trans('pearlskin::widgets.doctors') }}</h4>
    <ul>
        @foreach($doctors as $doctor)
            <li>
                <div class="widget-thumbnail">
                    <a href="{{ route('doctor', $doctor->names) }}"
                       title="{{ $doctor->names }}">
                        @if(count($doctor->files()->where('zone', 'image')->get()))
                            <img src="{{ Imagy::getThumbnail($doctor->files()->where('zone', 'image')->get()[0]->path, 'mediumThumb') }}"
                                 alt="{{ $doctor->names }}"/>
                        @else
                            <img src=""
                                 alt="{{ $doctor->names }}"/>
                        @endif
                    </a>
                    <div class="thumbnail-bump"></div>
                    <div class="thumbnail-icon"><span class="fa fa-user-md"></span></div>
                </div>
                <div class="widget-caption">
                    {{ $doctor->names }}
                </div>
            </li>
        @endforeach
    </ul>
</div>