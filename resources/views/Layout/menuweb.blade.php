<div class="menuweb">
    @foreach ($menu as $item)
       <a href="{{route('list.category',$item->id)}}"><div class="item-menu">{{ $item->namemenu }}</div></a>
    @endforeach
</div>
