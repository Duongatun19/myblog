@foreach ($list_item_menu as $item)
<div class="content-product">
    <div class="title-product">{{$item->id
    }}</div>
    <div class="seemore">SeeMore</div>
</div>

    @foreach ($product as $items)
 
  @if($items->category_id == $item->id)

<div class="owl-carousel owl-theme mt-5 ">
</div>
@endif
@endforeach





@endforeach