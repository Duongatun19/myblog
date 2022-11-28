@if(count($product_7)>= '1')
<div class="item-product">
    @foreach ($hoz_7 as $item)
        <div class="typing">
            <h1 class="custom-h1"> {{ $item->namemenu }}</h1>
        </div>
    @endforeach
    <div class="content-product owl-carousel">
        @foreach ($product_7 as $item)
        <a href="{{ route('info_product',$item->id)}}">
            <div class="img-product ">
                <div class="over-lay">
                    <p>{{ $item->titleproduct }}</p>
                </div>
                <img src="/uploads/{{ $item->imgproduct }}" alt="" class="product-home">
            </div>
        </a>
        @endforeach
    </div>
</div>
@endif


