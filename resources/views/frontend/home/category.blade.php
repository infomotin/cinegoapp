@php 
    $ptype = App\Models\Admin\Backend\PropertyType::orderBy('id', 'asc')->limit(5)->get();
@endphp

<section class="category-section centred">
    <div class="auto-container">
        <div class="inner-container wow slideInLeft animated" data-wow-delay="00ms"
            data-wow-duration="1500ms">
            <ul class="category-list clearfix">
                @foreach ($ptype as $item)
                    <li>
                        <div class="category-block-one">
                            <div class="inner-box">
                                <div class="icon-box"><i class="{{ $item->icon}}"></i></div>
                                <h5><a href="{{ route('property.type', $item->id)}}">{{ $item->type_name }}</a></h5>
                                <span>{{ $item->properties->count() }}</span>
                            </div>
                        </div>
                    </li>
                @endforeach
                
                
            </ul>
            <div class="more-btn"><a href="categories.html" class="theme-btn btn-one">All Categories</a>
            </div>
        </div>
    </div>
</section>