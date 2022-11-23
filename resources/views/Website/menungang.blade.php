@foreach ($list_item_menu as $item)

    <div class="item-menu {{$item->idelement}} {{$item->HozAnimation->name}} {{$item->HozDelay->name}}" id='{{$item->idelement}}'>{{$item->namemenu}}</div>
@endforeach
