@if(count($product_2)>= '1')
<div class="item-product">
    @foreach ($hoz_2 as $item)
        <div class="typing">
            <h1 class="custom-h1"> {{ $item->namemenu }}</h1>
        </div>
    @endforeach
    <div class="content-product owl-carousel">
        @foreach ($product_7 as $item)
            <div class="img-product ">
                <div class="over-lay">
                    <p>{{ $item->titleproduct }}</p>
                </div>
                <img src="/uploads/{{ $item->imgproduct }}" alt="" class="product-home">
            </div>
        @endforeach
    </div>
</div>
@endif