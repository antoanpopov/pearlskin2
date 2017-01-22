<div class="row">
    @foreach($priceListCategories as $priceListCategory)
        <div class="col-xs-12 col-md-6">
            <table class="table table-striped table-responsice table-condensed table-hover">
                <tr>
                    <th>{{$priceListCategory->title}}</th>
                    <th></th>
                </tr>
                @foreach($priceListCategory->priceLists as $priceList)
                    <tr>
                        <td>
                            @if($priceList->procedure)
                                <a href="{{ route('procedure', $priceList->procedure->title) }}"
                                   title="{{$priceList->procedure->title}}">
                                    {{ $priceList->procedure->title }}
                                </a>
                            @else
                                {{ $priceList->title }}
                            @endif
                        </td>
                        <td>{{ $priceList->price }} лв.</td>
                    </tr>
                @endforeach
            </table>
        </div>
    @endforeach
</div>
