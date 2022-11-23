@extends('Layout/AdminLayout')
@section('content')
    <div class="row px-3">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('HomeAdmin') }}"><i
                            class="bi bi-house-door-fill"></i>&nbsp;Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('ListHorizontal') }}"> List
                        Horizontal
                        Menu
                    </a></li>
                <li class="breadcrumb-item active" aria-current="page"> ADD Horizontal menu </li>
            </ol>
        </nav>

    </div>
    <div class="row ml mt-3">
        <div>
            <h4 class=" mb-0  ml-3 blod">ADD Horizontal Menu</h4>
        </div>
    </div>
    <div class="container mt-5 input-add">
        <form action="{{ route('addhorizontalmenu') }}" method="POST">
            @csrf
            <input type="text" name="namemenu" placeholder="Enter-Name" class="mt-5" id="slug"
                onkeyup="ChangeToSlug()">
            <br>
            @error('namemenu')
                <p class="validation-thongbao">{{ $message }}</p>
            @enderror
            <input type="text" name="slugmenu" placeholder="Enter-Slug" class="mt-5" id="convert_slug">
            <br>
            @error('slugmenu')
                <p class="validation-thongbao">{{ $message }}</p>
            @enderror
            <input type="text" name="idelement" placeholder="Enter-Id-Element" class="mt-5">
            <br>
            @error('idelement')
                <p class="validation-thongbao">{{ $message }}</p>
            @enderror
            <label for="">Status</label>
            <select name="status" id="">
                <option value="0">OFF</option>
                <option value="1">ON</option>
            </select>
            <label for="Animation">Animation &nbsp; &nbsp;</label>
            <select name="animation_id" id="">
                @foreach ($animations as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
            <label for="delay">Delay &nbsp;&nbsp;</label>
            <select name="delay_id" id="">
                @endphp
                @foreach ($delays as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
            <button value="submit" class="mt-5">Submit</button>
        </form>
    </div>
    <script src="{{ asset('js/slug.min.js') }}"></script>
@endsection
