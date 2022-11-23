@extends('Layout/AdminLayout')
@section('content')
    <div class="row px-3">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('HomeAdmin') }}"><i
                            class="bi bi-house-door-fill"></i>&nbsp;Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('ListHorizontal') }}"> List
                        Horizontal Menu
                    </a></li>
                <li class="breadcrumb-item active" aria-current="page"> Edit Horizontal menu </li>
            </ol>
        </nav>

    </div>
    <div class="row ml mt-3">
        <div>
            <h4 class=" mb-0  ml-3 blod">Edit Horizontal Menu</h4>
        </div>
    </div>
    <div class="container mt-5 input-add">
        <form action="{{ route('update_horizontal_menu', $item->id) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="text" name="namemenu" placeholder="Enter-Name" class="mt-5" id="slug"
                onkeyup="ChangeToSlug()" value="{{ $item->namemenu }}">
            <br>
            @error('namemenu')
                <p class="validation-thongbao">{{ $message }}</p>
            @enderror
            <input type="text" name="slugmenu" placeholder="Enter-Slug" class="mt-5" id="convert_slug"
                value="{{ $item->slugmenu }}">
            <br>
            @error('slugmenu')
                <p class="validation-thongbao">{{ $message }}</p>
            @enderror
            <input type="text" name="idelement" placeholder="Enter-Id-Element" class="mt-5"
                value="{{ $item->idelement }}">
            <br>
            @error('idelement')
                <p class="validation-thongbao">{{ $message }}</p>
            @enderror
            <label for="">Animation</label>
            <select name="animation_id" id="">
                @foreach ($animation as $items)
                    <option {{ $items->id == $item->animation_id ? 'selected' : '' }} value="{{ $items->id }}">
                        {{ $items->name }}
                    </option>
                @endforeach
            </select>
            <label for="">Delay</label>
            <select name="delay_id" id="">
                @foreach ($delays as $items)
                    <option {{ $items->id == $item->delay_id ? 'selected' : '' }} value="{{ $items->id }}">
                        {{ $items->name }}
                    </option>
                @endforeach
            </select>
            <label for="">Status</label>
            @if ($item->status == '1')
                <select name="status" id="">
                    <option selected value="1">ON</option>
                    <option value="0">OFF</option>
                </select>
            @else
                <select name="status" id="">
                    <option value="1">ON</option>
                    <option selected value="0">OFF</option>
                </select>
            @endif
            <button value="submit" class="mt-5">Update</button>
        </form>
    </div>
    <script src="{{ asset('js/slug.min.js') }}"></script>
@endsection
